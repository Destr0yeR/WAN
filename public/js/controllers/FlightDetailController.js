(function() {
    'use strict';
    angular
        .module('wan')
        .controller('FlightDetailController', Controller);
    Controller.$inject = ['Fligth'];
    /* @ngInject */
    function Controller(Fligth) {
        var vm = this;
        vm.title = 'Controller';
        activate();
        ////////////////
        function activate() {
        	vm.flight = Fligth.get();
        }
    }
})();