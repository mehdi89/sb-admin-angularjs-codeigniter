'use strict';
/**
 * @ngdoc function
 * @name ApsilonApp.controller:UsersCtrl
 * @description
 * # UsersCtrl
 * Controller of the ApsilonApp
 */
angular.module('ApsilonApp')
        .controller('UsersCtrl', function ($scope, $http, $position, GetName) {
            $scope.auth = getAuth();
//            this.init($scope);
            
            $scope.UsersGridOptions = {
                dataSource: {
                    transport: {
                        read: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "Users/operation?type=read",
                        },
                        update: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "Users/operation?type=update"
                        },
                        destroy: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "Users/operation?type=destroy"
                        },
                        create: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "Users/operation?type=create"
                        },
                        parameterMap: function (data) {
                            return kendo.stringify(data);
                        }
                    },
                    schema: {
                        errors: function (e) {
                            console.log(e);
                            if (e.status == 'error') {
                                console.log("error");
                            } else if (e.status == 'success') {
                                console.log("success");
                            }
                        },
                        model: {
                            id: "UserId",
                            fields: {
                                UserId: {editable: false, nullable: true, type: "number"},
                                UserName: {type: "string", validation: {required: true, validationmessage: "required"}},
                                Password: {type: "string", validation: {required: true, validationmessage: "required"}},
                                FirstName: {type: "string", validation: {required: true, validationmessage: "required"}},
                                LastName: {type: "string", validation: {required: true, validationmessage: "required"}},
                                Email: {type: "string", validation: {required: true, validationmessage: "required"}},
                                Role: {type: "number", validation: {required: true, validationmessage: "required"}},
//                                NavigationId: {type: "number"},
                                IsActive: {type: "number"},
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
                    refresh: true
                },
                columns: [
                    {field: "UserName", title: "User Name"},
                    {field: "Password", title: "Password", hidden: true, editor: PasswordEditor},
                    {field: "FirstName", title: "First Name"},
                    {field: "LastName", title: "Last Name"},
                    {field: "Email", title: "Email"},
                    {field: "Role", title: "Role", template: function (dataItem) { return GetRole(dataItem.Role); }, editor: RoleEditor},
//                    {field: "NavigationId", title: "Navigation ID", template: function (dataItem) { return GetNavigation(dataItem.NavigationId); }, editor: NavigationEditor},
                    {field: "IsActive", title: "Status",
                        template: "#= IsActive == '0' ? 'Inactive' : 'Active'#",
                        editor: "<label ><input class=\"rabio\" name='IsActive' type='radio' data-bind='checked:IsActive' value='0'><b> Inactive<b></label><br>" +
                                "<label><input class=\"rabio\" name='IsActive' type='radio' data-bind='checked:IsActive' value='1'> Active</label>"
                    },
                    {command: ($scope.auth.update === true ? ["edit"] : []), title: "&nbsp;", width: "120px"}],
                editable: "popup",
                sortable: true,
                filterable: {
                    extra: false
                },
                selectable: "row",
                resizable: true
            };
            
            if ($scope.auth.insert === true) {
                $scope.UsersGridOptions.toolbar = [{name: "create", text: "Add New User"}]; 
            }
//            $http.get(BASE_URL + "users/test").success(function (response) {
//                console.log(response);
//            });
        });
