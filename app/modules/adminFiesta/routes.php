<?php

Route::group(array('prefix' => 'admin'), function() {

    Route::get('/', array('uses' => 'App\Modules\AdminFiesta\Controllers\AdminController@login'));

    Route::get('getInscripcion', function () {

        $usuarios = Illuminate\Support\Facades\DB::table('usuarios_registrados')->select('id', DB::raw("primer_nombre||' '||segundo_nombre||' '||primer_apellido||' '||segundo_apellido as nombre_completo"), 'numero_identificacion', 'celular', 'sw_estado')
                ->orderBy('id', 'asc')->get();
        return $usuarios;
    });

    Route::post('updateEstado', function () {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        
        DB::table('usuarios_registrados')
            ->where('id', $request->id)
            ->update(array('sw_estado' => ($request->sw_estado==0)?2:0));
        
    });
});
