(function() {
    'use strict';
    angular
        .module('wan')
        .controller('PurchaseController', Controller);
    Controller.$inject = [];
    /* @ngInject */
    function Controller() {
        var vm = this;
        vm.title = 'Controller';
        activate();
        ////////////////
        function activate() {
        }
    }
})();