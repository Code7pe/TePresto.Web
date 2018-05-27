(function () {

    var app = angular.module('prestamistaApp', []);


    app.controller('detallePrestamistaController', function ($scope, $http) {
        var objectData = {
            'prestamoId': 2
        };
        $http({
            method: 'GET',
            url: 'http://sdkpalestra.com/code7/tepresto/inversionistaApi/getPrestamo/' + objectData.prestamoId
        }).then(function (response) {
            $scope.listaDetallePrestamista = response.data;

        }, function error(response) {
        });



        $scope.verDetallePrestamista = function (){
            debugger;
            console.log('entro');
        };
    });


    
    


}());