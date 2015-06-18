(function() {
    'use strict';
    angular
        .module('wan')
        .factory('ConsumerService', factory);
    factory.$inject = ['$http', 'api_url'];
    /* @ngInject */
    function factory($http, api_url) {
        var service = {
            func: func,
            searchFlightAvailability: searchFlightAvailability
        };
        return service;
        ////////////////
        function func() {
        }

        function searchFlightAvailability(filters) {
        	
        	var url = api_url + 'flights/search?'
        		+'departure_airport='+filters.departure_airport
        		+'&departure_date='+filters.departure_date
        		+'&arrival_airport='+filters.arrival_airport
        		+'&arrival_date='+filters.return_date
        		+'&passengers='+filters.passengers
        		+'&type='+filters.type;

        	return $http.get(url);
        }
    }
})();