(function() {
    'use strict';
    angular
        .module('wan')
        .controller('ScheduleController', Controller);
    Controller.$inject = ['dependencies'];
    /* @ngInject */
    function Controller(dependencies) {
        var vm = this;
        vm.title = 'Controller';
        activate();
        vm.schedules = {};
        ////////////////
        function activate() {
        	vm.schedules  = Schedule.get();
        }
    }
})();