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
            resetSeats();
        }

        function selectSeat(column, row, type) {
            console.log(column);
            console.log(row);
            var key;
            if(type == 0){
                key = findSeat(column, row, vm.departure_seats);
                if(key == -1){
                    vm.departure_seats.push({column: column, row: row});
                }
                else{
                    removeSeat(key, vm.departure_seats);
                }
            }
            else{
                key = findSeat(column, row, vm.arrival_seats);
                if(key == -1){
                    vm.arrival_seats.push({column: column, row: row});
                }
                else{
                    removeSeat(key, vm.arrival_seats);
                }
            }
            console.log(vm.departure_seats);
            console.log(vm.arrival_seats);
        }

        function resetSeats(){
            vm.departure_seats = [];
            vm.arrival_seats = [];
        }

        function findSeat(column, row, arr){
            for(var key in arr){
                var item = arr[key];
                if(item.column == column && item.row == row)return key;
            }

            return -1;
        }

        function removeSeat(index, arr){
            arr.splice(index, 1);
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

            var iter = 1;

            var max_seats = 6;

            if(capacity >= 250) {
                max_seats = 9;
            }

            for( i = 1 ; i <= (capacity + (max_seats-1))/max_seats; ++i) {
                var row = {};
                for( j = 0 ; j < max_seats ; ++j){
                    row[j] = {
                        row: i,
                        column: String.fromCharCode(65 + j),
                        occupied: 0
                    };
                    iter++;
                    if(iter == capacity)break;
                }
                // 0 => disponible, 1 => ocupado
                if(iter == capacity)break;
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