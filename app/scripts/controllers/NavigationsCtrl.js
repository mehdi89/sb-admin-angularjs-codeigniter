'use strict';
/**
 * @ngdoc function
 * @name ApsilonApp.controller:NavigationsCtrl
 * @description
 * # NavigationsCtrl
 * Controller of the ApsilonApp
 */
angular.module('ApsilonApp')
        .controller('NavigationsCtrl', function ($scope, $http, $position, GetName) {
            $scope.auth = getAuth();
            console.log($scope.auth);
//            this.init($scope);

            $scope.NavigationsGridOptions = {
                dataSource: {
                    transport: {
                        read: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "Navigations/operation?type=read",
                        },
                        update: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "Navigations/operation?type=update"
                        },
                        destroy: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "Navigations/operation?type=destroy"
                        },
                        create: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "Navigations/operation?type=create"
                        },
                        parameterMap: function (data) {
                            return kendo.stringify(data);
                        }
                    },
                    schema: {
                        errors: function (e) {
                            if (e.status == 'error') {
                                console.log("error");
                            } else if (e.status == 'success') {
                                console.log("success");
                            }
                        },
                        model: {
                            id: "NavigationId",
                            fields: {
                                NavigationId: {editable: false, nullable: true, type: "number"},
                                NavName: {type: "string", validation: {required: true, validationmessage: "required"}},
                                NavOrder: {type: "number", validation: {required: true, validationmessage: "required"}},
                                ActionPath: {type: "string", validation: {required: true, validationmessage: "required"}},
                                ParentNavId: {type: "number"},
                            }
                        },
                        data: function (response) {
                            return response.data;
                        },
                        total: function (response) {
                            return response.total;
                        }
                    },
                    batch: true,
                    pageSize: 10,
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true
                },
                pageable: {
                    pageSize: 10,
                    pageSizes: true,
                    refresh: true
                },
                columns: [
                    {field: "NavigationId", title: "Navigation ID"},
                    {field: "NavName", title: "Navigation Name"},
                    {field: "NavOrder", title: "Nav Order"},
                    {field: "ActionPath", title: "Action Path"},
                    {field: "ParentNavId", title: "Parent Nav ID", template: function (dataItem) { return GetNavigation(dataItem.ParentNavId);}, editor: NavigationEditor},
                    {command: ($scope.auth.update === true && $scope.auth.delete === true? ["edit", "destroy"] : []), title: "&nbsp;", width: "250px"}],
                editable: "popup",
                sortable: true,
                filterable: {
                    extra: false
                },
                selectable: "row",
                resizable: true
            };

            if ($scope.auth.insert === true) {
                $scope.NavigationsGridOptions.toolbar = [{name: "create", text: "Add New Navigation"}];
            }
        });
