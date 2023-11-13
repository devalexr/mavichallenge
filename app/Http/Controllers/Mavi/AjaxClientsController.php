<?php

namespace App\Http\Controllers\Mavi;

use App\Models\Client;

class AjaxClientsController extends MAVIController
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->request->ajax()) {
            abort(400);
        }
    }

    public function index()
    {
        $PAGINATION_index = Client::select('*')
            ->orderBy('name', 'ASC')
            ->paginate($this->_paginationResults);
        $A_clients =  $PAGINATION_index->toArray()['data'];
        return $this->render('Mavi/Ajax/Clients/index', compact('A_clients'));
    }

    public function view($ID_client_id)
    {
        $E_client = Client::find($ID_client_id);
        if (!$E_client) {
            abort(404);
        }

        $A_client = $E_client->toArray();

        return $this->render('Mavi/Ajax/Clients/view', compact('A_client'));
    }
}
