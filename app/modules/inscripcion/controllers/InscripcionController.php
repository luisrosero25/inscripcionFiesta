<?php

namespace App\Modules\Inscripcion\Controllers;

use View;

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
        echo 'TRUE';
    }

}
