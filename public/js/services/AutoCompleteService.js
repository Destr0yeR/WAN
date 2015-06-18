(function() {
    'use strict';

    angular
        .module('wan')
        .factory('AutoCompleteService', ['$http','api_url', AutoCompleteService]);

    /* @ngInject */
    function AutoCompleteService($http, api_url) {

        function getPlaces(term){

	 		var sort = 0;
	 		var place_name = term;
	 		var access_token = '';
            console.log(term);
	 		var url = api_url+'airports/search?search_text='+term;

        	return $http.get(url).then(function(response){
                if(response.data.airports){
        		  return response.data.airports;
                }
                return [];
        	});
        }

        return {
        	getPlaces: getPlaces
        }
    }
})();