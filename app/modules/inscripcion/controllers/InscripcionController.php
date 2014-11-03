<?php

namespace App\Modules\Inscripcion\Controllers;

use View,
    App\Modules\Inscripcion\Models\RegistroUsuariosModel,
        Illuminate\Support\Facades\Response;

class InscripcionController extends \BaseController {

    public function index() {

        return View::make('inscripcion::index');
    }

    public function getBienvenido() {
        return View::make('inscripcion::bienvenido');
    }

    public function getFormInscripcion() {
        return View::make('inscripcion::formInscripcion');
    }

    public function registrarUsuario() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
//        print_r($request);


        $usuario = new RegistroUsuariosModel();

        $usuario->primer_nombre = $request->primer_nombre;
        $usuario->segundo_nombre = $request->segundo_nombre;
        $usuario->primer_apellido = $request->primer_apellido;
        $usuario->segundo_apellido = $request->segundo_apellido;
        $usuario->id_servicio = $request->id_servicio->id;
        $usuario->cargo = $request->cargo;
        $usuario->id_sexo = $request->id_sexo->id;
        $usuario->id_tipo_identificacion = $request->id_tipo_identificacion->id;
        $usuario->numero_identificacion = $request->numero_identificacion;
        $usuario->telefono = $request->telefono;
        $usuario->celular = $request->celular;
        $usuario->email = $request->email;

        if ($this->usuarioExiste($request->id_tipo_identificacion->id, $request->numero_identificacion)) {
            if ($usuario->save() == 1) {
                return Response::json(array('res' => 'true', 'msj' => '<strong>' . $request->primer_nombre . ' ' . $request->segundo_nombre . ' ' . $request->primer_apellido . '</strong>, registrado correctamente',
                            'type' => 'success'));
            } else {
                return Response::json(array('res' => 'false', 'msj' => '<strong>' . $request->primer_nombre . ' ' . $request->segundo_nombre . ' ' . $request->primer_apellido . '</strong>, Imposible realizar esta accion, vuelva a intentarlo mas tarde',
                            'type' => 'danger'));
            }
        } else {


            return Response::json(array('res' => 'false', 'msj' => '<strong>' . $request->primer_nombre . ' ' . $request->segundo_nombre . ' ' . $request->primer_apellido . '</strong>, El usuario que esta intentando registrar, ya existe',
                        'type' => 'warning'));
        }
    }

    public function usuarioExiste($ti, $no) {

        $count = RegistroUsuariosModel::where('id_tipo_identificacion', '=', $ti)->where('numero_identificacion', '=', $no)->count();

        if ($count > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function getContUsuarios() {
       
            return View::make('inscripcion::contarRegistrados');
    }

}
