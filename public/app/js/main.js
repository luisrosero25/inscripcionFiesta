/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var miApp = angular.module('miApp', ['ngRoute'])

miApp.config(function($routeProvider) {


    $routeProvider
            .when('/', {
                templateUrl: 'inscripcion/' + _token,
                controller: 'inscripcionController'
            })
             .when('/inicio', {
                templateUrl: 'bienvenido/' + _token,
                controller: 'homeController'
            })
             .when('/cancelar', {
                templateUrl: 'getViewCancelar',
                controller: 'cancelarInscripcionController'
            })
            .when('/cont', {
                templateUrl: 'getViewContadorUsuarios',
                controller: 'contadorController'
            }).otherwise({
        redirectTo: '/'
      });


});



miApp.controller('homeController', function($scope) {
   
});

miApp.controller('cancelarInscripcionController', function($scope, $location, $http) {
     $scope.title = " Formulario de Cancelacion de inscripcion"
     
      $scope.cancelarInscripcion = function() {


        $http({
            //usaremos el metodo POST para enviar los datos
            method: 'POST',
            //seleccionamos a  que URL llegara la informacion
            url: 'solicitarCancelacion',
            //codificamos el contenido
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            //esta es la informacion que vamos a mandar
            data: $scope.usuario,
        }).
                // si la peticion ajax se realizo con exito se ejecuta success
                success(function(data, status) {

                    $scope.mostrarAlerta(data);
                    if (data.res == 'true') {
                        $scope.usuario.id_tipo_identificacion = null;
                        $scope.usuario.numero_identificacion = null;
             
                    }

                }).
                //si la peticion ajax NO fue exitosa se ejecuta error
                error(function(data, status) {
                    $scope.data = data || "FALSE";
                    $scope.status = status;
                    $scope.aviso = 'Ha pasado algo inesperado';
                });
            }
            
            
    $http.get('getTiposIdentificacion').success(function(data)
    {
        $scope.tipos_identificacion = data.tipos_identificacion;//así enviamos los posts a la vista
    });
     
         $scope.mostrarAlerta = function(res) {
        var titulo_alerta;
        if (res.type == 'success') {
            titulo_alerta = '<i class="glyphicon glyphicon-ok"></i>'
        } else if (res.type == 'warning') {
            titulo_alerta = '<i class="glyphicon glyphicon-warning-sign"></i>'
        } else if (res.type == 'danger') {
            titulo_alerta = '<i class="glyphicon glyphicon-remove"></i>'
        }

        $('.content').prepend(
                '<div class="alert alert-' + res.type + ' alert-dismissible fade in" role="alert">' +
                '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>' +
                ' <p class="text-center"><strong>' + titulo_alerta + '</strong> ' + res.msj +
                '</p></div>'
                );
    };

});

miApp.controller('contadorController', function($scope, $location, $http) {
    $scope.title = " Cantidad de Usuarios Registrados"

  

    $http.get('getContUsuarios').success(function(data)
    {
        $scope.cont = data.cont;//así enviamos los posts a la vista
    });

});
miApp.controller('inscripcionController', function($scope, $location, $http) {
    $scope.title = "Formulario  de Inscripcion"

    $scope.guardarInscripcion = function() {


        $http({
            //usaremos el metodo POST para enviar los datos
            method: 'POST',
            //seleccionamos a  que URL llegara la informacion
            url: 'registrar_usuario/' + _token,
            //codificamos el contenido
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            //esta es la informacion que vamos a mandar
            data: $scope.usuario,
        }).
                // si la peticion ajax se realizo con exito se ejecuta success
                success(function(data, status) {

                    $scope.mostrarAlerta(data);
                    if (data.res == 'true') {
                        $scope.usuario.primer_nombre = null;
                        $scope.usuario.segundo_nombre = null;
                        $scope.usuario.primer_apellido = null;
                        $scope.usuario.segundo_apellido = null;
                        $scope.usuario.id_sexo = null;
                        $scope.usuario.id_tipo_identificacion = null;
                        $scope.usuario.numero_identificacion = null;
                        $scope.usuario.celular = null;
                        $scope.usuario.telefono = null;
                        $scope.usuario.id_servicio = null;
                        $scope.usuario.cargo = null;
                        $scope.usuario.email = null;
                    }

                }).
                //si la peticion ajax NO fue exitosa se ejecuta error
                error(function(data, status) {
                    $scope.data = data || "FALSE";
                    $scope.status = status;
                    $scope.aviso = 'Ha pasado algo inesperado';
                });

    }
    $http.get('getSexos').success(function(data)
    {
        $scope.sexos = data.sexos;//así enviamos los posts a la vista
    });
    $http.get('getServicios').success(function(data)
    {
        $scope.servicios = data.servicios;//así enviamos los posts a la vista
    });

    $http.get('getTiposIdentificacion').success(function(data)
    {
        $scope.tipos_identificacion = data.tipos_identificacion;//así enviamos los posts a la vista
    });



    $scope.mostrarAlerta = function(res) {
        var titulo_alerta;
        if (res.type == 'success') {
            titulo_alerta = '<i class="glyphicon glyphicon-ok"></i>'
        } else if (res.type == 'warning') {
            titulo_alerta = '<i class="glyphicon glyphicon-warning-sign"></i>'
        } else if (res.type == 'danger') {
            titulo_alerta = '<i class="glyphicon glyphicon-remove"></i>'
        }

        $('.content').prepend(
                '<div class="alert alert-' + res.type + ' alert-dismissible fade in" role="alert">' +
                '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>' +
                ' <p class="text-center"><strong>' + titulo_alerta + '</strong> ' + res.msj +
                '</p></div>'
                );
    };


});
miApp.controller('pacientesController', function($scope) {
    $scope.msj = "Controlador pacientesController"
});


miApp.controller('activeController', function($scope, $location) {
    $scope.isActive = function(viewLocation) {
        return viewLocation === $location.path();
    };
});



