<?php

namespace App\Http\Controllers\Mavi;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TEMPLATEController;

class MAVIController extends TEMPLATEController
{
    protected $SESSION_USER = null;

    protected $_paginationResults = 5;

    public function __construct()
    {
        parent::__construct();

        //assign User data to global variable
        $this->SESSION_USER = [
            'name' => 'Alejandro Robles',
        ];
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
