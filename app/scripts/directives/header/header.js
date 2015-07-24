'use strict';

/**
 * @ngdoc directive
 * @name izzyposWebApp.directive:adminPosHeader
 * @description
 * # adminPosHeader
 */
angular.module('ApsilonApp')
	.directive('header',function(){
		return {
        templateUrl:'directives/header',
        restrict: 'E',
        replace: true,
    	}
	});
