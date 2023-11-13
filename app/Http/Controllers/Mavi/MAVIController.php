<?php

namespace App\Http\Controllers\Mavi;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TEMPLATEController;

class MAVIController extends TEMPLATEController
{
    protected $SESSION_USER = null;

    public function __construct()
    {
        parent::__construct();

        dump(auth()->id()); // 

        //check session user
        $USER_user = Auth::user();

        dd($USER_user);

        //is not in session, redirect to login
        if (!$USER_user) {
            //$this->redirect('/');
        }

        //assign User data to global variable
        $this->SESSION_USER = $USER_user;
        //set User data in view
        $this->_VIEW_DATA['SESSION_user'] = $this->SESSION_USER;
    }

    protected function _beforeRender()
    {
        $A_menu = [
            ['title' => 'MENU'],
            [
                'name' => 'Clientes',
                'icon' => 'uil-users-alt',
                'url' => '/clients',
            ],
        ];

        $this->_menuSET($A_menu);
    }
}
