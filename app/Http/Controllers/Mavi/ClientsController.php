<?php

namespace App\Http\Controllers\Mavi;

class ClientsController extends MAVIController
{

    public function __construct()
    {
        parent::__construct();

        $this->_breadcumbADD([
            'name' => 'Clientes',
            'url' => '/clients',
        ]);
    }

    protected function _title($S_title)
    {
        parent::_title('Clientes: ' . $S_title);
    }

    public function index()
    {
        $this->_title('Inicio');
        return $this->render('Mavi/Clients/index');
    }
}
