<?php

use App\Modules\Inscripcion\Models\RegistroUsuariosModel;

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
    $servicios = DB::table("servicios")->orderBy('descripcion', 'asc')->get();

    return Response::json(array(
                "servicios" => $servicios
    ));
});


Route::get('getViewContadorUsuarios', array('uses' => 'App\Modules\Inscripcion\Controllers\InscripcionController@getContUsuarios'));


Route::get('getContUsuarios', function() {
    $count = RegistroUsuariosModel::where('sw_estado','=','0')->count();
    return Response::json(array(
                "cont" => $count
    ));
});


Route::get('mail', function() {

    Mail::send('inscripcion::confirmacionRegistroMail', array('primer_nombre' => 'prueba', 'primer_apellido' => 'prueba'), function($message) {
        $message->to('luisedier.rosero@gmail.com', 'Jon Doe')->subject('Clinica Colombia ES - Inscripcion Fiesta 2014');
    });
});

Route::get('getViewCancelar',function(){
    return View::make('inscripcion::formCancelacion');
});

Route::post('solicitarCancelacion',  array('uses' => 'App\Modules\Inscripcion\Controllers\InscripcionController@solicitarCancelacion'));

Route::get('cancelar/{token}',  array('uses' => 'App\Modules\Inscripcion\Controllers\InscripcionController@cancelarInscripcion'));

Route::get('getViewUbicacion',function(){
    return View::make('inscripcion::ubicacion');
});

Route::get('inscripcion2',function(){
    return View::make('inscripcion::formInscripcion2');
});