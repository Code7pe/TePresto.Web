(function () {

    var app = angular.module('prestamistaApp', []);


	app.controller('prestamistaController',function($scope, $http){
        debugger;

        $http({
            method: 'GET',
            url: 'http://sdkpalestra.com/code7/tepresto/inversionistaApi/listarPrestamosAbiertos'
          }).then(function (response) {
            $scope.listaPrestamista = response.data;
    
          }, function error(response) {
          });

		// $scope.probar = function(){
		// 	$http.get(SERVER.url + '/api/casos')
        //     .then(function (response) {
        //         console.log(response);
        //         $scope.listaTest = response.data;
        //     })
		// }

	});


}());