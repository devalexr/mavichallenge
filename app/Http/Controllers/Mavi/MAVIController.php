<?php

namespace App\Http\Controllers\Mavi;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TEMPLATEController;

class MAVIController extends TEMPLATEController
{
    public function __construct()
    {
        parent::__construct();

        //check session user
        $USER_user = Auth::user();

        //is not in session, redirect to login
        if (!$USER_user) {
            $this->redirect('/');
        }

        $this->_breadcumbADD([
            'name' => 'Clientes',
            'url' => '/clients',
        ]);
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
