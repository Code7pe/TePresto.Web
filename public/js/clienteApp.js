(function () {

    var app = angular.module('clienteApp', ['angular.filter']);

    app.constant('SERVER', {
        //'url': '/konecta'
         'url': 'http://sdkpalestra.com/code7/tepresto'
    });

	app.controller('clienteController',function($scope, $http, SERVER){

    $scope.tipoPrestamo = "";
    $scope.descripcion = "";
    $scope.tipoMoneda = "";
    $scope.montoPrestado = "";
    $scope.pagoMensual = "";
    $scope.descripcionFormaPago = "";
    $scope.pagoMensual = "";

		$scope.registrarUsuario = function($scope, $http, $window, $sce, SERVER){
      $scope.montoPrestado;
      $http.post(SERVER.url + '/api/registrarPrestamo'
       + "/" + 1 + "/"+$scope.tipoPrestamo+"/"
       +$scope.descripcion
       +"/"+$scope.tipoMoneda
       +"/"+$scope.montoPrestado
       +"/"+$scope.descripcionFormaPago
       +"/"+$scope.pagoMensual)
                      .then(function (response) {
                          console.log(response);
                      });

		}

	});


}());
