(function() {
    'use strict';

    angular
        .module('wan')
        .controller('SearchController')
        .directive('autocompletearrivalairport', ['AutoCompleteService', autoComplete]);

    /* @ngInject */
    function autoComplete (AutoCompleteService) {
        // Usage:
        //
        // Creates:
        //
        var directive = {
            restrict: 'A',
            link: link
        };
        return directive;

        function link(scope, element, attrs, ctrl) {
            scope.place = '';
        	element.autocomplete({
        		source: function(searchTerm, response){
        			AutoCompleteService.getPlaces(searchTerm.term).then(function(autocompleteResults){
        				response($.map(autocompleteResults, function(autocompleteResult){
        					return {
        						label: 	  autocompleteResult.name,
        						value: 	  autocompleteResult.name,
                                name:    autocompleteResult.name,
        						id:       autocompleteResult.id,
                                city:     autocompleteResult.city,
                                country:  autocompleteResult.country
        					}
        				}))
        			});
        		},
        		minLength: 0,
        		select: function(event, selectedItem) {
        			var airport = {
        				id:  	selectedItem.item.id,
        				name: selectedItem.item.name,
        				city: selectedItem.item.city,
                        country:  selectedItem.item.country
        			}
                    scope.airport = selectedItem.item.value;
        			scope.vm.setArrivalAirport(airport);
        			scope.$apply();

        			event.preventDefault();
        		}
        	});
        }
    }

})();
