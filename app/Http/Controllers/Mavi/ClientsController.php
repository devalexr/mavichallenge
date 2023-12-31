<?php

namespace App\Http\Controllers\Mavi;

use App\Models\Client;

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

        $this->_btnAccionSET([
            [
                'type' => 'add',
                'text' => 'Nuevo cliente',
                'url' => '/clients/add',
            ],
        ]);

        $PAGINATION_index = Client::select('*')
            ->orderBy('name', 'ASC')
            ->paginate($this->_paginationResults);

        return $this->render('Mavi/Clients/index', compact('PAGINATION_index'));
    }

    public function view($ID_client_id)
    {
        $this->_title('Ver cliente');

        $this->_btnAccionSET([
            [
                'type' => 'edit',
                'text' => 'Editar',
                'url' => '/clients/edit/' . $ID_client_id,
            ],
        ]);

        return $this->render('Mavi/Clients/view', compact('ID_client_id'));
    }

    public function add()
    {
        $this->_title('Nuevo cliente');

        $S_action = 'add';

        return $this->render('Mavi/Clients/form', compact('S_action'));
    }

    public function edit($ID_client_id)
    {
        $this->_title('Editar cliente');

        $S_action = 'edit';

        return $this->render('Mavi/Clients/form', compact('S_action', 'ID_client_id'));
    }
}
