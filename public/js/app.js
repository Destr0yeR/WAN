
(function() {
    'use strict';

    angular
        .module('wan', ['ngRoute'],['$interpolateProvider',InitApp]);

    function InitApp($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }

    angular
    	.module('wan')
    	.config(['$routeProvider', Routes]);

    function Routes($routeProvider){

   		$routeProvider.
        when('/', {
          templateUrl: 'home'
        }).
        when('/results', {
            templateUrl: 'results'
        }).
        when('/details', {
        	templateUrl: 'details'
        }).
        when('/seats', {
            templateUrl: 'seats'
        }).
        when('/purchase', {
            templateUrl: 'purchase'
        });
   	}

})();
