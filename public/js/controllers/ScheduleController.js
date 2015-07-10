(function() {
    'use strict';
    angular
        .module('wan')
        .controller('ScheduleController', Controller);
    Controller.$inject = ['Schedule', 'ConsumerService', 'Fligth', '$location'];
    /* @ngInject */
    function Controller(Schedule, ConsumerService, Fligth, $location) {
        var vm = this;
        vm.title = 'Controller';
        vm.departure_airport = {};
        vm.arrival_airport = {};
        vm.pasajeros = 1;

        vm.ida_y_vuelta = 0;

        activate();
        //vm.schedules = [];
        ////////////////
        function activate() {
        	vm.schedules  = Schedule.get();
            if(!isEmpty(vm.schedules)){
                console.log(vm.schedules);
                vm.avaible_departure = vm.schedules.avaible_departure;
                vm.available_return = vm.schedules.available_return;
                vm.departure_airport = vm.schedules.departure_airport;
                vm.arrival_airport = vm.schedules.arrival_airport;
                vm.pasajeros = vm.schedules.passengers;
                vm.departure_date = vm.schedules.departure_date;
                vm.return_date = vm.schedules.return_date;
            }

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
                return_date: vm.return_date,
                passengers: vm.pasajeros,
                type: vm.ida_y_vuelta
            }

            ConsumerService.searchFlightAvailability(filters).success(function(data){
                var schedule = {
                    avaible_departure: data.avaible_departure,
                    available_return: data.available_return,
                    departure_airport: vm.departure_airport,
                    arrival_airport: vm.arrival_airport,
                    passengers: vm.pasajeros,
                    return_date: vm.return_date,
                    departure_date: vm.departure_date
                }
                Schedule.set(schedule);
                activate();
            });
        }

        vm.next = function() {

            var flight = {
                option_departure: vm.option_departure,
                option_return: vm.option_return,
                departure_airport: vm.departure_airport,
                arrival_airport: vm.arrival_airport,
                passengers: vm.pasajeros,
                departure_date: vm.departure_date,
                return_date: vm.return_date
            }

            console.log(vm.option_departure);
            if(typeof vm.option_departure === 'undefined'){

            }
            else{
                Fligth.set(flight);
                $location.path('/details');
            }
        }

        vm.setOptionReturn = function(option) {
            vm.option_return = option;

        }

        vm.setOptionDeparture = function(option) {
            vm.option_departure = option;
        }

        function isEmpty(obj) {
            for(var key in obj){
                if(obj.hasOwnProperty(key)){
                    return false;
                }
            }
            return true;
        }
    }
})();