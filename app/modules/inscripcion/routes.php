<?php

Route::filter('csrf_url', function($route, $request, $segmento) {

    if (Session::token() != Request::segment($segmento)) {
        throw new Illuminate\Session\TokenMismatchException;
    }
});


Route::get('/', ['uses' => 'App\Modules\Inscripcion\Controllers\InscripcionController@index']);
Route::get('bienvenido/{token}', ['before' => 'csrf_url:2', 'uses' => 'App\Modules\Inscripcion\Controllers\InscripcionController@getBienvenido']);
Route::get('inscripcion/{token}', array('before' => 'csrf_url:2', 'uses' => 'App\Modules\Inscripcion\Controllers\InscripcionController@getFormInscripcion'));
Route::post('registrar_usuario/{token}', array('before' => 'csrf_url:2', 'uses' => 'App\Modules\Inscripcion\Controllers\InscripcionController@registrarUsuario'));
Route::get('prueba/{tokens}', array('before' => 'csrf_url:2', 'uses' => 'App\Modules\Inscripcion\Controllers\InscripcionController@getBienvenida'));
Route::get('getSexos', function() {
    $sexos = DB::table("sexo")->get();

    return Response::json(array(
                "sexos" => $sexos
    ));
});

Route::get('getTiposIdentificacion', function() {
    $tipos_identificacion = DB::table("tipos_identificacion")->get();

    return Response::json(array(
                "tipos_identificacion" => $tipos_identificacion
    ));
});
Route::get('getServicios', function() {
    $servicios = DB::table("servicios")->get();

    return Response::json(array(
                "servicios" => $servicios
    ));
});