<?php

namespace App\Http\Controllers\Mavi;

use App\Http\Controllers\TEMPLATEController;

class MAVIController extends TEMPLATEController
{

    public function __construct()
    {
        parent::__construct();

        $this->_breadcumbADD([
            'name' => 'Inicio',
            'url' => '/',
        ]);
    }

    protected function _beforeRender()
    {
        $A_menu = [
            ['title' => 'MENU'],
            [
                'name' => 'Inicio',
                'icon' => 'uil-home-alt',
                'url' => '/',
            ],
        ];

        $this->_menuSET($A_menu);
    }
}
