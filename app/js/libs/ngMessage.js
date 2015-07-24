/**
 * ngMessage - andy.lv, message for angular
 * (C) 2014 - Andy.Lv
 * License: MIT
 * Source: https://github.com/microlv/ngMessage/
 * Data: 2014-2015
 */

(function (angular) {
    'use strict';

    var exceptionResource = {
        requireAngular: 'ngMessage\'s JavaScript requires angular',
        requireMsgName: 'message name is require',
        requireFunction: 'execute fn should be function'
    };

    var SLICE = Array.prototype.slice,
        FILTER = Array.prototype.filter,
        isArray = Array.isArray;

    if (typeof angular === 'undefined') {
        throw new Error('ngMessage\'s JavaScript requires angular');
    }

    angular.module('ngMessage.services', []).provider('ngMessage', [function () {

        var flatq = (function () {
            //this block is implement by other project: FlatQ
            //https://github.com/microlv/FlatQ/
            var nextTick = function (callback, delay) {
                setTimeout(callback, delay || 0);
            };

            function isFunction(fn) {
                return typeof fn === 'function';
            }

            function FlatQ(resolve) {
                if (!(this instanceof FlatQ)) {
                    return new FlatQ(resolve);
                }
                this.defer = new Defer(this);
                processQueue(this, resolve);
                //nextProcessQueue(this);
            }

            FlatQ.fn = FlatQ.prototype = {
                constructor: FlatQ,
                then: function (resolve, reject) {
                    processQueue(this, resolve, reject);
                    return this;
                },
                all: function () {

                }
            };

            function processQueue(self, resove, reject) {
                var fns = wrap(self, resove, reject);
                self.defer.queue.push(fns);
            }

            function nextProcessQueue(self, type, val) {
                var i = 0,
                    fn,
                    current = self.defer.current,
                    q = self.defer.queue;
                if (!current) {
                    current = self.defer.current = q[0];
                    current.fn(val);
                    return;
                }
                i = q.indexOf(current);
                current = self.defer.current = q[++i];
                if (!current) {
                    nextProcessQueue(self, type, val);
                    return;
                }
                fn = (type === 'resolve' ? current.fn : current.err) || function (d) {
                    d.resolve();
                };
                fn(val);
            }

            function wrap(self, resolve, reject) {
                function ex(fn) {
                    return function (val) {
                        fn = fn || function (d) {
                            d.resolve();
                        };
                        fn.call(self, self.defer, val);
                    };
                }

                return {fn: ex(resolve), err: ex(reject)};
            }

            function Defer(self) {
                this.current = undefined;
                this.queue = [];
                this.$$parent = self;
            }

            Defer.prototype = {
                resolve: function (val) {
                    nextProcessQueue(this.$$parent, 'resolve', val);
                },
                reject: function (val) {
                    nextProcessQueue(this.$$parent, 'reject', val);
                }
            };

            function extend(dst) {
                for (var i = 1, ii = arguments.length; i < ii; i++) {
                    var obj = arguments[i];
                    if (obj) {
                        var keys = Object.keys(obj);
                        for (var j = 0, jj = keys.length; j < jj; j++) {
                            var key = keys[j];
                            dst[key] = obj[key];
                        }
                    }
                }
                return dst;
            }

            function createFlatQ(self) {
                return (self instanceof FlatQ) ? self : new FlatQ();
            }

            FlatQ.series = function (fn, callback) {
                var q = createFlatQ(this);
                if (isArray(fn)) {
                    for (var i = 0; i < fn.length; i++) {
                        processQueue(q, fn[i]);
                    }
                } else {
                    processQueue(q, fn);
                }
                processQueue(q, callback);
                return q;
            };

            FlatQ.parallel = function (fn, callback) {
                var q = createFlatQ(this);
                var r = [];
                if (isArray(fn)) {
                    processQueue(q, function () {
                        for (var i = 0; i < fn.length; i++) {
                            if (isFunction(fn[i])) {
                                r.push(fn[i].call(q));
                            }
                        }
                        callback.call(q, q.defer, r);
                    });
                } else {
                    if (isFunction(fn)) {
                        callback.call(q, fn.call(q));
                    }
                }
                return q;
            };

            FlatQ.each = function (params, fn, callback) {

            };

            extend(FlatQ.fn, {
                series: FlatQ.series,
                parallel: FlatQ.parallel,
                each: FlatQ.each,
                extend: extend,
                start: nextProcessQueue
            });

            return FlatQ;
        })();

        function Message() {
            if (!(this instanceof Message)) {
                return new Message();
            }
            this.events = {};
            //this.execLimit = [];
        }

        Message.fn = Message.prototype;

        Message.fn.checkRequired = function (name, fn) {
            var result = true;
            if (!name) {
                console.log(exceptionResource.requireMsgName);
                result = false;
            }
            if (fn && !angular.isFunction(fn)) {
                console.log(exceptionResource.requireFunction);
                result = false;
            }
            return result;
        };

        Message.fn.register = Message.fn.on = function (name, fn) {
            if (!this.checkRequired(name, fn)) {
                return;
            }
            this.events[name] = this.events[name] || [];
            var fq = this.events[name] = flatq(fn);
            return fq;
        };

        Message.fn.on = Message.fn.register;
        Message.fn.bind = Message.fn.register;
        Message.fn.addLister = Message.fn.register;

        //Message.fn.one = function (name, fn) {
        //    if (!this.checkRequired(name, fn)) {
        //        return;
        //    }
        //    this.execLimit.push({name: name, callTime: 1, executed: false});
        //    this.events[name] = this.events[name] || [];
        //    if (this.events[name].length === 0) {
        //        this.events[name].push(fn);
        //    }
        //};

        Message.fn.remove = function (name, fn) {
            if (!name) {
                this.events = {};
                return;
            }
            delete this.events[name];
        };

        Message.fn.off = Message.fn.remove;
        Message.fn.unbind = Message.fn.remove;
        Message.fn.removeLister = Message.fn.remove;

        Message.fn.trigger = Message.fn.fire = function (name) {
            if (!this.checkRequired(name) || !this.events[name]) {
                return;
            }
            var fq = this.events[name];
            fq.start(fq);
            return fq;
        };

        Message.fn.fire = Message.fn.trigger;
        Message.fn.emit = Message.fn.trigger;

        Message.fn.list = function (name) {
            return !name ? this.events : this.events[name];
        };

        var configInstance = {},
            current = {};
        this.createNamespace = function (name) {
            configInstance[name] = new Message();
            this.setCurrentNamespace(name);
        };

        this.setCurrentNamespace = function (name) {
            current = configInstance[name];
        };

        this.$get = [function () {
            if (configInstance) {
                this.createNamespace('ngMessage');
            }
            return current;
        }];
    }]);

    angular.module('ngMessage.directive', []).directive('ngMessage', ['ngMessage', function (ngMessage) {
        return {
            restrict: 'A',
            scope: {
                msgName: '@',
                msgType: '@'
            },
            link: function (scope, ele) {
                //if not assign eventType, default is click.
                var eventType = scope.msgType || 'click';

                //if the element not support event, if can't work.
                //interface same with jquery.
                ele.on(eventType, function (e, args) {
                    ngMessage.trigger(scope.msgName, e, args);
                });
            }
        };
    }]);

    angular.module('ngMessage', ['ngMessage.services', 'ngMessage.directive']);

})(angular);
