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

        $USER_user = Auth::user();

        if (!$USER_user) {
            $this->redirect('/');
        }
        $this->SESSION_USER = $USER_user;
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
