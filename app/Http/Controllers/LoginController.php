<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TEMPLATEController;
use Illuminate\Support\Facades\Auth;

class LoginController extends TEMPLATEController
{
    public function __construct()
    {
        if (Auth::user()) {
            $this->redirect('/clients');
        }
    }

    public function index()
    {
        $this->_title('Login');
        return $this->render('Login/index');
    }
}
