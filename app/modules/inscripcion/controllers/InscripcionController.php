<?php

namespace App\Modules\Inscripcion\Controllers;

use View,
    App\Modules\Inscripcion\Models\RegistroUsuariosModel,
    Illuminate\Support\Facades\Response,
    Mail,
    Input;

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
        $usuario->segundo_nombre = (isset($request->segundo_nombre) ? $request->segundo_nombre : '');
        $usuario->primer_apellido = $request->primer_apellido;
        $usuario->segundo_apellido = (isset($request->segundo_apellido) ? $request->segundo_apellido : '');
        $usuario->id_servicio = $request->id_servicio->id;
        $usuario->cargo = $request->cargo;
        $usuario->id_sexo = $request->id_sexo->id;
        $usuario->id_tipo_identificacion = $request->id_tipo_identificacion->id;
        $usuario->numero_identificacion = $request->numero_identificacion;
        $usuario->telefono = (isset($request->telefono) ? $request->telefono : '');
        $usuario->celular = $request->celular;
        $usuario->email = $request->email;

        if ($this->usuarioExiste($request->id_tipo_identificacion->id, $request->numero_identificacion)) {
//            if ($usuario->save() == 1) {
//
//                Mail::send('inscripcion::confirmacionRegistroMail', array('primer_nombre' => $request->primer_nombre, 'primer_apellido' => $request->primer_apellido), function($message) use ($request) {
//                    $message->to($request->email, $request->primer_nombre . ' ' . $request->primer_apellido)->subject('Clinica Colombia ES - Inscripcion Fiesta 2014');
//                });
//
//                return Response::json(array('res' => 'true', 'msj' => '<strong>' . $request->primer_nombre . ' ' . $request->primer_apellido . '</strong>, registrado correctamente',
//                            'type' => 'success'));
//            } else {
//                return Response::json(array('res' => 'false', 'msj' => '<strong>' . $request->primer_nombre . ' ' . $request->primer_apellido . '</strong>, Imposible realizar esta accion, vuelva a intentarlo mas tarde',
//                            'type' => 'danger'));
//            }
             return Response::json(array('res' => 'false', 'msj' => '<strong>Advertencia</strong>, Imposible realizar esta accion, las inscripciones se han cerrado',
                            'type' => 'danger'));
        } else {


            return Response::json(array('res' => 'false', 'msj' => '<strong>' . $request->primer_nombre . ' ' . $request->primer_apellido . '</strong>, El usuario que esta intentando registrar, ya existe',
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

    public function cancelarInscripcion($token) {
        $usuario = RegistroUsuariosModel::where('token', '=', $token)->first();
        if ($usuario) {
            $usuario->sw_estado = '1';
            if ($usuario->save() == 1) {
                Mail::send('inscripcion::cancelarRegistroMail', array('token' => $token, 'primer_nombre' => $usuario->primer_nombre, 'primer_apellido' => $usuario->primer_apellido), function($message) use ($usuario) {
                    $message->to($usuario->email, $usuario->primer_nombre . ' ' . $usuario->primer_apellido)->subject('Clinica Colombia ES - Cancelacion Exitosa Inscripcion Fiesta 2014');
                });
                return View::make('inscripcion::cancelarRegistroMail', array('primer_nombre' => $usuario->primer_nombre, 'primer_apellido' => $usuario->primer_apellido));
                ;
            }
        } else {
            return View::make('inscripcion::cancelarErrorRegistroMail');
            ;
        }
    }

    public function solicitarCancelacion() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $ti = $request->id_tipo_identificacion->id;
        $no = $request->numero_identificacion;


        
         if ($this->usuarioExiste( $ti,$no)) {

            return Response::json(array('res' => 'false', 'msj' => '<strong>Este usuario no existe</strong>',
                        'type' => 'danger'));
        }
        
        if (!$this->validarEstadoUsuario($no, $ti)) {

            return Response::json(array('res' => 'false', 'msj' => '<strong>Tu Inscripcion ya há sido cancelada</strong>',
                        'type' => 'warning'));
        }

        $token = '';
        $res = true;
        while ($res == true) {
            $token = $this->tokenGenerar();
            $res = $this->tokenExiste($token);
        }
        $correo = "";
        $usuario = RegistroUsuariosModel::where('id_tipo_identificacion', '=', $ti)->where('numero_identificacion', '=', $no)->first();

        Mail::send('inscripcion::solicitudCancelacion', array('token' => $token, 'primer_nombre' => $usuario->primer_nombre, 'primer_apellido' => $usuario->primer_apellido), function($message) use ($usuario) {
            $message->to($usuario->email, $usuario->primer_nombre . ' ' . $usuario->primer_apellido)->subject('Clinica Colombia ES - Cancelacion Inscripcion Fiesta 2014');
        });
        $usuario->token = $token;
        $correo = $usuario->email;
        if ($usuario->save() == 1) {
            return Response::json(array('res' => 'true', 'msj' => '<strong>Tu solicitud de cancelacion de inscripcion se ha realizado, por favor verifica tu correo electronico para confirmar tu solicitud <br> ' . $correo . '</strong>',
                        'type' => 'success'));
        }
    }

    public function tokenExiste($token) {

        $count = RegistroUsuariosModel::where('token', '=', $token)->first();

        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function tokenGenerar() {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < 20; $i++)
            $key .= $pattern{mt_rand(0, $max)};


        return $key;
    }

    public function validarEstadoUsuario($no, $ti) {
        $usuario = RegistroUsuariosModel::where('id_tipo_identificacion', '=', $ti)->where('numero_identificacion', '=', $no)->first();
        if ($usuario) {
            if ($usuario->sw_estado == '1') {
                return false;
            } else {
                return true;
            }
        }
    }

   

}
