(function() {
    'use strict';
    angular
        .module('wan')
        .controller('SearchController', Controller);
    Controller.$inject = ['ConsumerService', 'Schedule', '$location'];
    /* @ngInject */
    function Controller(ConsumerService, Schedule, $location) {
        var vm = this;
        vm.title = 'Controller';
        vm.departure_airport = {};
        vm.arrival_airport = {};
        vm.pasajeros = 1;

        activate();
        ////////////////
        function activate() {
        }

        vm.setDepartureAirport = function(airport) {
            vm.departure_airport = airport;
        }

        vm.setArrivalAirport = function(airport) {
            if(airport.id != vm.departure_airport.id){
                vm.arrival_airport = airport;
            }
        }

        vm.searchFlights = function () {

            var filters = {
                departure_airport: vm.departure_airport.id,
                departure_date: vm.departure_date,
                arrival_airport: vm.arrival_airport.id,
                return_date: vm.arrival_date,
                passengers: vm.pasajeros,
                type: 1
            }

            ConsumerService.searchFlightAvailability(filters).success(function(data){
                Schedule.set(data.avaible_departure);
                $location.path('/results');
            });
        }
    }
})();