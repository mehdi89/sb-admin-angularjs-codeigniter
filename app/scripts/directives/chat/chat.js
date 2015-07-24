'use strict';

/**
 * @ngdoc directive
 * @name izzyposWebApp.directive:adminPosHeader
 * @description
 * # adminPosHeader
 */
angular.module('ApsilonApp')
	.directive('chat',function(){
		return {
        templateUrl:'app/scripts/directives/chat/chat.html',
        restrict: 'E',
        replace: true,
    	}
	});


