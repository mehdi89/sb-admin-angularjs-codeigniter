'use strict';
/**
 * @ngdoc function
 * @name ApsilonApp.controller:FormsCtrl
 * @description
 * # FormsCtrl
 * Controller of the ApsilonApp
 */
angular.module('ApsilonApp')
        .controller('FormsCtrl', function ($scope, $http, $position, $mdDialog, $timeout) {
            $scope.data = {};
            $scope.data.cb1 = true;
            $scope.data.cb2 = false;
            $scope.data.cb3 = false;
            $scope.data.cb4 = false;
            $scope.data.cb5 = false;


            $scope.toppings = [
                {name: 'Pepperoni', wanted: true},
                {name: 'Sausage', wanted: false},
                {name: 'Black Olives', wanted: true},
                {name: 'Green Peppers', wanted: false}
            ];
            $scope.settings = [
                {name: 'Wi-Fi', extraScreen: 'Wi-fi menu', icon: 'device:network-wifi', enabled: true},
                {name: 'Bluetooth', extraScreen: 'Bluetooth menu', icon: 'device:bluetooth', enabled: false},
            ];
            $scope.messages = [
                {id: 1, title: "Message A", selected: false},
                {id: 2, title: "Message B", selected: true},
                {id: 3, title: "Message C", selected: true},
            ];
            $scope.people = [
                {name: 'Janet Perkins', img: 'app/img/100-0.jpeg', newMessage: true},
                {name: 'Mary Johnson', img: 'app/img/100-1.jpeg', newMessage: false},
                {name: 'Peter Carlsson', img: 'app/img/100-2.jpeg', newMessage: false}
            ];
            $scope.goToPerson = function (person, event) {
                $mdDialog.show(
                        $mdDialog.alert()
                        .title('Navigating')
                        .content('Inspect ' + person)
                        .ariaLabel('Person inspect demo')
                        .ok('Neat!')
                        .targetEvent(event)
                        );
            };
            $scope.navigateTo = function (to, event) {
                $mdDialog.show(
                        $mdDialog.alert()
                        .title('Navigating')
                        .content('Imagine being taken to ' + to)
                        .ariaLabel('Navigation demo')
                        .ok('Neat!')
                        .targetEvent(event)
                        );
            };
            $scope.doSecondaryAction = function (event) {
                $mdDialog.show(
                        $mdDialog.alert()
                        .title('Secondary Action')
                        .content('Secondary actions can be used for one click actions')
                        .ariaLabel('Secondary click demo')
                        .ok('Neat!')
                        .targetEvent(event)
                        );
            };

            $scope.loadUsers = function () {
                // Use timeout to simulate a 650ms request.
                $scope.users = [];
                return $timeout(function () {
                    $scope.users = [
                        {id: 1, name: 'Scooby Doo'},
                        {id: 2, name: 'Shaggy Rodgers'},
                        {id: 3, name: 'Fred Jones'},
                        {id: 4, name: 'Daphne Blake'},
                        {id: 5, name: 'Velma Dinkley'},
                    ];
                }, 650);
            };

        });
