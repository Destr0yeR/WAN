(function() {
    'use strict';

    angular
        .module('wan')
        .factory('Payment', factory);

    /* @ngInject */
    function factory() {

    	var savedData = {}

        var service = {
            func: func,
            set: set,
            get: get
        };
        return service;

        ////////////////

        function func() {
        }

        function set(data) {
        	savedData = clone(data);
        }

        function get() {
        	return savedData;
        }

        function clone(obj) {
            if (null == obj || "object" != typeof obj) return obj;
            var copy = obj.constructor();
            for (var attr in obj) {
                if (obj.hasOwnProperty(attr)) copy[attr] = obj[attr];
            }
            return copy;
        }
    }
})();