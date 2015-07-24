'use strict';
/**
 * @ngdoc function
 * @name ApsilonApp.controller:NavigViewRightCtrl
 * @description
 * # NavigViewRightCtrl
 * Controller of the ApsilonApp
 */
angular.module('ApsilonApp')
        .controller('NavigViewRightCtrl', function ($scope, $http, $position) {
            $scope.auth = getAuth();

            $scope.NavigViewRightGridOptions = {
                dataSource: {
                    transport: {
                        read: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "NavigViewRight/operation?type=read",
                        },
                        update: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "NavigViewRight/operation?type=update"
                        },
                        destroy: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "NavigViewRight/operation?type=destroy"
                        },
                        create: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "NavigViewRight/operation?type=create"
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
                            id: "NavgViewId",
                            fields: {
                                NavgViewId: {editable: false, nullable: true, type: "number"},
                                Navigations: {type: "number", validation: {required: true, validationmessage: "required"}},
                                Roles: {type: "number", validation: {required: true, validationmessage: "required"}},
                                Users: {type: "number", validation: {required: true, validationmessage: "required"}},
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
                    {field: "NavgViewId", title: "Nav View ID"},
                    {field: "Navigations", title: "Navigations", template: function (dataItem) {
                            return GetNavigation(dataItem.Navigations);
                        }, editor: NavigationEditor},
                    {field: "Roles", title: "Role", template: function (dataItem) {
                            return GetRole(dataItem.Roles);
                        }, editor: RoleEditor},
                    {field: "Users", title: "User", template: function (dataItem) {
                            return GetUsers(dataItem.Users);
                        }, editor: UsersEditor},
                    {command: ($scope.auth.update === true && $scope.auth.delete === true ? ["edit", "destroy"] : []), title: "&nbsp;", width: "250px"}],
                editable: "popup",
                sortable: true,
                filterable: {
                    extra: false
                },
                selectable: "row",
                resizable: true
            };

            if ($scope.auth.insert === true) {
                $scope.NavigViewRightGridOptions.toolbar = [{name: "create", text: "Add New Nav View Right"}];
            }
        });
