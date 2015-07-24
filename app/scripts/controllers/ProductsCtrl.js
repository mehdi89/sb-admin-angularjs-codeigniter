'use strict';
/**
 * @ngdoc function
 * @name ApsilonApp.controller:ProductsCtrl
 * @description
 * # ProductsCtrl
 * Controller of the ApsilonApp
 */
angular.module('ApsilonApp')
        .controller('ProductsCtrl', function ($scope, $http, $position) {
            $scope.auth = getAuth();

            $scope.PrpductsGridOptions = {
                dataSource: {
                    transport: {
                        read: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "Products/operation?type=read",
                        },
                        update: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "Products/operation?type=update"
                        },
                        destroy: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "Products/operation?type=destroy"
                        },
                        create: {
                            contentType: 'application/json',
                            type: 'POST',
                            url: BASE_URL + "Products/operation?type=create"
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
                            id: "ProductID",
                            fields: {
                                ProductName: {type: "string"},
                                UnitPrice: {type: "number"},
                                UnitsInStock: {type: "number"},
                                Discontinued: {type: "boolean"}
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
                    "ProductName",
                    {field: "UnitPrice", title: "Unit Price", format: "{0:c}"},
                    {field: "UnitsInStock", title: "Units In Stock"},
                    {field: "Discontinued"},
                    {command: ($scope.auth.update === true ? ["edit"] : []), title: "&nbsp;", width: "240px"}],
                editable: "popup",
                sortable: true,
                filterable: {
                    extra: false
                },
                selectable: "row",
                resizable: true
            };
            
            //check is delete is permitted if so show delete btn else hide 
            angular.forEach($scope.PrpductsGridOptions.columns, function(value, key) {
                if (value.command) {
                    if ($scope.auth.delete === true) {
                        value.command.push("destroy"); 
                    }
                }
            }); 
            //check if user permitted for add show create btn else hide
            if ($scope.auth.insert === true) {
                $scope.PrpductsGridOptions.toolbar = [{name: "create", text: "Add New User"}];
            }

        });
