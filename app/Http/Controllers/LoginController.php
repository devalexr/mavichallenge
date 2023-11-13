<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends TEMPLATEController
{
    public function __construct()
    {
        parent::__construct();
        if (Auth::user()) {
            $this->redirect('/clients');
        }
    }

    public function index()
    {
        $this->_title('Login');
        return $this->render('Login/index');
    }

    public function login()
    {
        if ($this->request->ajax()) {
            $DATA_login = $this->request->validate([
                'email' => ['required', 'email', 'string'],
                'password' => ['required', 'string']
            ]);

            if (Auth::attempt(['email' => $DATA_login['email'], 'password' => $DATA_login['password']], true)) {
                request()->session()->regenerate();
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'No se logro inicar sesion']);
            }
        } else {
            abort(404);
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
