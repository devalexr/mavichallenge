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

    public function add()
    {
        return $this->__save();
    }

    private function __save($ID_client_id = null)
    {
        //validate form
        $DATA_client = $this->request->validate(Client::validations());

        //add
        if (!$ID_client_id) {
            $E_client = new Client();
        } else {
            $E_client = Client::find($ID_client_id);
            if (!$E_client) {
                abort(404);
            }
        }

        //set new data
        $E_client->name = $DATA_client['name'];
        $E_client->last_name = $DATA_client['last_name'];
        $E_client->address = $DATA_client['address'];
        $E_client->email = $DATA_client['email'];

        //save
        if ((bool)$E_client->save()) {
            return response()->json(['success' => true, 'message' => 'Cliente creado!', 'id' => $E_client->id]);
        } else {
            return response()->json(['success' => false, 'message' => 'Ocurrio un error al guardar los datos del cliente']);
        }
    }
}
