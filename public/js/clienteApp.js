(function () {

    var app = angular.module('clienteApp', []);

    app.constant('SERVER', {
        //'url': '/konecta'
         'url': 'http://sdkpalestra.com/code7/tepresto'
    });

	app.controller('clienteController',function($scope, $http, $window, $sce, SERVER){

    $scope.tipoPrestamo = "";
    $scope.descripcion = "";
    $scope.tipoMoneda = "";
    $scope.montoPrestado = "";
    $scope.pagoMensual = "";
    $scope.descripcionFormaPago = "";
    $scope.pagoMensual = "";

		$scope.registrarUsuario = function(){
      $scope.montoPrestado;

var data= {"clienteid":1,
          "tipoPrestamo":$scope.tipoPrestamo,
          "descripPrestamo":$scope.descripcion,
          "monedaid":$scope.tipoMoneda,
          "monto":$scope.montoPrestado,
          "descripPago":$scope.descripcionFormaPago,
          "coutaSugerida":$scope.pagoMensual
        };

 var dataJson = JSON.stringify(data);

      $http.post(SERVER.url + '/api/registrarPrestamo', dataJson)
                      .then(function (response) {
                          console.log(response);
                      });

		}

	});


}());
