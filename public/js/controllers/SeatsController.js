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
        ////////////////
        function activate() {
        	vm.flight = Fligth.get();
        	console.log(vm.flight);
        	vm.option_departure = vm.flight.option_departure;
        	vm.option_return = vm.flight.option_return;

        	ConsumerService.checkSeats(vm.option_departure).success(function(data){
        		console.log(data);
        	});

        	ConsumerService.checkSeats(vm.option_return).success(function(data){
        		console.log(data);
        	});
        }
    }
})();