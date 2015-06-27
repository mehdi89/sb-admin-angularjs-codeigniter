'use strict';
/**
 * @ngdoc function
 * @name ApsilonApp.controller:RolesCtrl
 * @description
 * # RolesCtrl
 * Controller of the ApsilonApp
 */
angular.module('ApsilonApp')
        .controller('RolesCtrl', function ($scope, $http, $position, GetName) {
            $scope.auth = getAuth();
            console.log($scope.auth);
//            this.init($scope);

            $scope.RolesGridOptions = {
                dataSource: {
                    transport: {
                        read: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "Roles/operation?type=read",
                        },
                        update: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "Roles/operation?type=update"
                        },
                        destroy: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "Roles/operation?type=destroy"
                        },
                        create: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "Roles/operation?type=create"
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
                            id: "RoleId",
                            fields: {
                                RoleId: {editable: false, nullable: true, type: "number"},
                                RoleName: {type: "string", validation: {required: true, validationmessage: "required"}},
                                NavigationId: {type: "number", validation: {required: true, validationmessage: "required"}},
                                IsRead: {type: "number"},
                                IsInsert: {type: "number"},
                                IsUpdate: {type: "number"},
                                IsDelete: {type: "number"},
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
                    {field: "RoleId", title: "Nav View ID"},
                    {field: "RoleName", title: "Role"},
                    {field: "NavigationId", title: "Navigations", template: function (dataItem) {
                            return GetNavigation(dataItem.NavigationId);
                        }, editor: NavigationEditor},
                    {field: "IsRead", title: "Is Read",
                        template: "#= IsRead == '0' ? 'No' : 'Yes'#",
                        editor: "<label><input class=\"rabio\" name='IsRead' type='radio' data-bind='checked:IsRead' value='1'> Yes</label><br>" +
                                "<label ><input class=\"rabio\" name='IsRead' type='radio' data-bind='checked:IsRead' value='0'><b> No<b></label>"
                    },
                    {field: "IsInsert", title: "Is Insert",
                        template: "#= IsInsert == '0' ? 'No' : 'Yes'#",
                        editor: "<label><input class=\"rabio\" name='IsInsert' type='radio' data-bind='checked:IsInsert' value='1'> Yes</label><br>" +
                                "<label ><input class=\"rabio\" name='IsInsert' type='radio' data-bind='checked:IsInsert' value='0'><b> No<b></label>"
                    },
                    {field: "IsUpdate", title: "Is Update",
                        template: "#= IsUpdate == '0' ? 'No' : 'Yes'#",
                        editor: "<label><input class=\"rabio\" name='IsUpdate' type='radio' data-bind='checked:IsUpdate' value='1'> Yes</label><br>" +
                                "<label ><input class=\"rabio\" name='IsUpdate' type='radio' data-bind='checked:IsUpdate' value='0'><b> No<b></label>"
                    },
                    {field: "IsDelete", title: "Is Delete",
                        template: "#= IsDelete == '0' ? 'No' : 'Yes'#",
                        editor: "<label><input class=\"rabio\" name='IsDelete' type='radio' data-bind='checked:IsDelete' value='1'> Yes</label><br>" +
                                "<label ><input class=\"rabio\" name='IsDelete' type='radio' data-bind='checked:IsDelete' value='0'><b> No<b></label>"
                    },
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
                $scope.RolesGridOptions.toolbar = [{name: "create", text: "Add New Role"}];
            }
        });
