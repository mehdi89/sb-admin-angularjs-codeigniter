'use strict';
/**
 * @ngdoc function
 * @name ApsilonApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the ApsilonApp
 */
angular.module('ApsilonApp')
        .controller('MainCtrl', function ($scope, $position) {
            $scope.bar = {
                labels: ['2006', '2007', '2008', '2009', '2010', '2011', '2012'],
                series: ['Series A', 'Series B'],
                data: [
                    [65, 59, 80, 81, 56, 55, 40],
                    [28, 48, 40, 19, 86, 27, 90]
                ]

            };

            $scope.pie = {
                labels: ["Download Sales", "In-Store Sales", "Mail-Order Sales"],
                data: [300, 500, 100]
            };

            $scope.donut = {
                labels: ["Download Sales", "In-Store Sales", "Mail-Order Sales"],
                data: [300, 500, 100]
            };

        });
