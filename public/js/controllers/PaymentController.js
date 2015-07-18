(function() {
    'use strict';
    angular
        .module('wan')
        .controller('PaymentController', Controller);
    Controller.$inject = ['Payment', '$location'];
    /* @ngInject */
    function Controller(Payment, $location) {
        var vm = this;
        vm.title = 'Controller';

        vm.pay = pay;
        activate();
        ////////////////
        function activate() {
        	console.log(Payment.get());
        	vm.payment = Payment.get();

        	vm.sub_total 	= vm.payment.sub_total;
        	vm.total_taxes 	= vm.payment.total_taxes;
        	vm.total 		= vm.payment.total;
        }

        function pay() {
        	$location.path('/success');
        }
    }
})();