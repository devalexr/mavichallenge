<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends TEMPLATEController
{
    public function index()
    {
        if (Auth::user()) {
            $this->redirect('/clients');
        }

        if ($this->request->isMethod('POST')) {
            $DATA_login = $this->request->validate([
                'email' => ['required', 'email', 'string'],
                'password' => ['required', 'string']
            ]);
            if (Auth::attempt(['email' => $DATA_login['email'], 'password' => $DATA_login['password']], true)) {
                $this->request->session()->regenerate();
                return redirect('/clients');
            } else {
                $this->MSJError('Correo electrónico o contraseña incorrectos.');
            }
        }

        $this->_title('Login');

        return $this->render('Login/index');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
