'use strict';

/**
 * @ngdoc directive
 * @name izzyposWebApp.directive:adminPosHeader
 * @description
 * # adminPosHeader
 */
angular.module('ApsilonApp')
	.directive('notifications',function(){
		return {
        templateUrl:'app/scripts/directives/notifications/notifications.html',
        restrict: 'E',
        replace: true,
    	}
	});


