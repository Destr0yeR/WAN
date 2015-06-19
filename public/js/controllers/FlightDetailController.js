(function() {
    'use strict';
    angular
        .module('wan')
        .controller('FlightDetailController', Controller);
    Controller.$inject = ['Fligth', '$location'];
    /* @ngInject */
    function Controller(Fligth, $location) {
        var vm = this;
        vm.title = 'Controller';
        vm.exchange = {};
        vm.currency = [
            {},
            {text: 'USD', value: 1 },
            {text: 'EUR', value: 0.879700902},
            {text: 'PEN', value: 3.16449688},
            {text: 'ARS', value: 9.05337872},
            {text: 'CLP', value: 629.326621},
            {text: 'BRL', value: 3.06459868},
            {text: 'CAD', value: 1.22183965},
            {text: 'COP', value: 2531.64557}
        ];

        activate();
        ////////////////
        function activate() {
        	vm.flight = Fligth.get();
            vm.option_departure = vm.flight.option_departure;
            vm.option_return = vm.flight.option_return;
            vm.departure_airport = vm.flight.departure_airport;
            vm.arrival_airport = vm.flight.arrival_airport;
            vm.passengers = vm.flight.passengers

            console.log(vm.flight);

            vm.passenger_price = vm.option_departure.price + vm.option_return.price;
            vm.taxes = vm.passenger_price * 0.18;

            vm.sub_total = vm.passenger_price * vm.passengers;
            vm.total_taxes = vm.taxes * vm.passengers;
            vm.total = vm.sub_total + vm.total_taxes;
        }

        vm.changeCurrency = function() {
            if(vm.tipo_moneda == ""){
                $('#tabla_cambio_moneda').toggle();
            }
            else{
                if(!$('#tabla_cambio_moneda').is (':visible')){
                    $('#tabla_cambio_moneda').show();
                } 
                console.log(vm.currency);
                console.log(vm.tipo_moneda);
                console.log(vm.currency[vm.tipo_moneda]);
                vm.exchange.text = vm.currency[vm.tipo_moneda].text;
                vm.exchange.value = parseFloat(vm.currency[vm.tipo_moneda].value) * vm.total;
            }
        }

        vm.next = function() {
            $location.path('/seats');
        }

    }
})();