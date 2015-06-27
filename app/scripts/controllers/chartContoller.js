'use strict';
/**
 * @ngdoc function
 * @name ApsilonApp.controller:ChartCtrl
 * @description
 * # ChartCtrl
 * Controller of the ApsilonApp
 */
angular.module('ApsilonApp')
        .controller('ChartCtrl', ['$scope', '$timeout', function ($scope, $timeout) {


                $scope.customersDataSource = {
                    transport: {
                        read: {
                            dataType: "jsonp",
                            url: "http://demos.telerik.com/kendo-ui/service/Customers",
                        }
                    }
                };

                $scope.customOptions = {
                    dataSource: $scope.customersDataSource,
                    dataTextField: "ContactName",
                    dataValueField: "CustomerID",
                    headerTemplate: '<div class="dropdown-header k-widget k-header">' +
                            '<span>Photo</span>' +
                            '<span>Contact info</span>' +
                            '</div>',
                    // using {{angular}} templates:
                    valueTemplate: '<span class="selected-value" style="background-image: url(\'http://demos.telerik.com/kendo-ui/content/web/Customers/{{dataItem.CustomerID}}.jpg\')"></span><span>{{dataItem.ContactName}}</span>',
                    template: '<span class="k-state-default" style="background-image: url(\'http://demos.telerik.com/kendo-ui/content/web/Customers/{{dataItem.CustomerID}}.jpg\')"></span>' +
                            '<span class="k-state-default"><h3>{{dataItem.ContactName}}</h3><p>{{dataItem.CompanyName}}</p></span>',
                };
                $scope.line = {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    series: ['Series A', 'Series B'],
                    data: [
                        [65, 59, 80, 81, 56, 55, 40],
                        [28, 48, 40, 19, 86, 27, 90]
                    ],
                    onClick: function (points, evt) {
                        console.log(points, evt);
                    }
                };

                $scope.bar = {
                    labels: ['2006', '2007', '2008', '2009', '2010', '2011', '2012'],
                    series: ['Series A', 'Series B'],
                    data: [
                        [65, 59, 80, 81, 56, 55, 40],
                        [28, 48, 40, 19, 86, 27, 90]
                    ]

                };

                $scope.donut = {
                    labels: ["Download Sales", "In-Store Sales", "Mail-Order Sales"],
                    data: [300, 500, 100]
                };

                $scope.radar = {
                    labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
                    data: [
                        [65, 59, 90, 81, 56, 55, 40],
                        [28, 48, 40, 19, 96, 27, 100]
                    ]
                };

                $scope.pie = {
                    labels: ["Download Sales", "In-Store Sales", "Mail-Order Sales"],
                    data: [300, 500, 100]
                };

                $scope.polar = {
                    labels: ["Download Sales", "In-Store Sales", "Mail-Order Sales", "Tele Sales", "Corporate Sales"],
                    data: [300, 500, 100, 40, 120]
                };

                $scope.dynamic = {
                    labels: ["Download Sales", "In-Store Sales", "Mail-Order Sales", "Tele Sales", "Corporate Sales"],
                    data: [300, 500, 100, 40, 120],
                    type: 'PolarArea',
                    toggle: function ()
                    {
                        this.type = this.type === 'PolarArea' ?
                                'Pie' : 'PolarArea';
                    }
                };
            }]);