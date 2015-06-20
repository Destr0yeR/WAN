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
            searchFlightAvailability: searchFlightAvailability,
            checkSeats: checkSeats,
            createPassenger: createPassenger
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
        		+'&return_date='+filters.return_date
        		+'&passengers='+filters.passengers
        		+'&type='+filters.type;

        	return $http.get(url);
        }

        function checkSeats(filters) {
            var url = api_url + 'flights/seats?'
                    +'schedule='+filters.schedule
                    +'&date='+filters.date

            return $http.get(url);
        }

        function createPassenger(filters) {
            var url = api_url + '/flights/passengers';

            var data = new FormData();
            data.append('document_id', filters.document_id);
            data.append('document_number', filters.document_number);
            data.append('first_name', filters.first_name);
            data.append('last_name', filters.last_name);

            return $http.post(url, data, {transformRequest: angular.identity,headers: {'Content-Type': undefined}});
        }
    }
})();