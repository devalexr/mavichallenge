<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends TEMPLATEController
{
    public function __construct()
    {
        if (Auth::user()) {
            //$this->redirect('/clients');
        }
    }

    public function index()
    {
        $this->_title('Login');
        return $this->render('Login/index');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $DATA_login = $request->validate([
                'email' => ['required', 'email', 'string'],
                'password' => ['required', 'string']
            ]);

            if (Auth::attempt(['email' => $DATA_login['email'], 'password' => $DATA_login['password']], true)) {

                request()->session()->regenerate();
                return redirect('/clients');
            } else {
                $this->MSJError('Correo electrónico o contraseña incorrectos.');
                return redirect('/');
            }
        } else {
            abort(404);
        }
    }
}
