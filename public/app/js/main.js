/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var miApp = angular.module('miApp', ['ngRoute'])

miApp.config(function ($routeProvider) {


    $routeProvider
            .when('/', {
                templateUrl: 'bienvenido/' + _token,
                controller: 'homeController'
            })
            .when('/inscripcion', {
                templateUrl: 'inscripcion/' + _token,
                controller: 'inscripcionController'
            });


});



miApp.controller('homeController', function ($scope) {
    $scope.title = " Bienvenido, Aqui puedes registrarte a la fiesta de Fin de año"
});
miApp.controller('inscripcionController', function ($scope, $location, $http) {
    $scope.title = "Formulario  de Inscripcion"

    $scope.guardarInscripcion = function () {


        $http({
            //usaremos el metodo POST para enviar los datos
            method: 'POST',
            //seleccionamos a  que URL llegara la informacion
            url: 'registrar_usuario/'+_token,
            //codificamos el contenido
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            //esta es la informacion que vamos a mandar
            data: {
                'primer_nombre': $scope.primer_nombre,
                'segundo_nombre': $scope.segundo_nombre
            },
        }).
                // si la peticion ajax se realizo con exito se ejecuta success
                success(function (data, status) {

                    $scope.data = data;
                    if (data == 'FALSE') {
                        $scope.aviso = 'Usuario o contraseña invalidos';
                    } else {
                        $scope.aviso = 'bIENVENIDO';
                    }

                }).
                //si la peticion ajax NO fue exitosa se ejecuta error
                error(function (data, status) {
                    $scope.data = data || "FALSE";
                    $scope.status = status;
                    $scope.aviso = 'Ha pasado algo inesperado';
                });


    }
});
miApp.controller('pacientesController', function ($scope) {
    $scope.msj = "Controlador pacientesController"
});


miApp.controller('activeController', function ($scope, $location) {
    $scope.isActive = function (viewLocation) {
        return viewLocation === $location.path();
    };
});
