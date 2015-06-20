(function() {
    'use strict';
    angular
        .module('wan')
        .controller('SeatsController', Controller);
    Controller.$inject = ['Fligth', 'ConsumerService'];
    /* @ngInject */
    function Controller(Fligth, ConsumerService) {
        var vm = this;
        vm.title = 'Controller';
        activate();
        vm.fillSeats = fillSeats;
        vm.selectSeat = selectSeat;
        ////////////////
        function activate() {
        	vm.flight = Fligth.get();

        	vm.option_departure = vm.flight.option_departure;
        	vm.option_return = vm.flight.option_return;
            vm.departure_date = vm.flight.departure_date;
            vm.return_date = vm.flight.return_date;

            var filter_departure = {
                schedule: vm.option_departure.id,
                date: vm.departure_date
            }

        	ConsumerService.checkSeats(filter_departure).success(function(data){
                vm.seats_departure = fillSeats(data.total_quantity,data.ocupied_seats);
                console.log(vm.seats_departure);
        	});

            var filter_return = {
                schedule: vm.option_return.id,
                date: vm.return_date
            }

        	ConsumerService.checkSeats(filter_return).success(function(data){
        		vm.seats_return = fillSeats(data.total_quantity,data.ocupied_seats);
                console.log(vm.seats_return);
        	});
        }

        function selectSeat(column, row) {
            console.log(column);
            console.log(row);
        }

        function fillSeats(capacity, occupied) {
            var i = 0;
            var cont = 1;
            var j = 0;

            var seats = [];

            var hash = {};
            hash["A"] = 0;
            hash["B"] = 1;
            hash["C"] = 2;
            hash["D"] = 3;
            hash["E"] = 4;
            hash["F"] = 5;

            for( i = 1 ; i <= (capacity + 5)/6; ++i) {
                var row = {};
                for( j = 0 ; j < 6 ; ++j){
                    row[j] = {
                        row: i,
                        column: String.fromCharCode(65 + j),
                        occupied: 0
                    };
                }
                // 0 => disponible, 1 => ocupado
                seats[i] = row;
            }

            for(var key in occupied) {
                if(occupied.hasOwnProperty(key)){
                    seats[occupied[key].row][hash[occupied[key].column]].occupied = 1;
                }
            }

            return seats;
        }
    }
})();