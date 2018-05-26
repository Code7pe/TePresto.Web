(function () {

    var app = angular.module('clienteApp', ['angular.filter']);

    app.constant('SERVER', {
        //'url': '/konecta'
         'url': 'http://sdkpalestra.com/code7/konecta'
    });

	app.controller('clienteController',function($scope, $http, SERVER){

		$scope.probar = function(){
			$http.get(SERVER.url + '/api/casos')
            .then(function (response) {
                console.log(response);
                $scope.listaTest = response.data;
            })
		}

	});


}());
