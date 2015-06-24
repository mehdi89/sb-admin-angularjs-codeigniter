'use strict';

/**
 * @ngdoc directive
 * @name izzyposWebApp.directive:adminPosHeader
 * @description
 * # adminPosHeader
 */
angular.module('sbAdminApp')
	.directive('header',function(){
		return {
        templateUrl:'app/scripts/directives/header/header.html',
        restrict: 'E',
        replace: true,
    	}
	});


