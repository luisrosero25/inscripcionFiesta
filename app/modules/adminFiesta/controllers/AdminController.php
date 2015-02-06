<?php

namespace App\Modules\AdminFiesta\Controllers;

use View,
    Illuminate\Support\Facades\Response,
    Input;

class AdminController extends \BaseController {
    
    function login(){
       return View::make('adminFiesta::index');
        
    }
    
}