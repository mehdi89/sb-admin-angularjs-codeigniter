'use strict';
/**
 * @ngdoc function
 * @name ApsilonApp.controller:ButtonCtrl
 * @description
 * # ButtonCtrl
 * Controller of the ApsilonApp
 */
angular.module('ApsilonApp')
        .controller('ButtonCtrl', function ($scope, $http, $position) {
            $scope.title1 = 'Button';
            $scope.title4 = 'Warn';
            $scope.isDisabled = true;
            $scope.googleUrl = 'http://google.com';
        });
