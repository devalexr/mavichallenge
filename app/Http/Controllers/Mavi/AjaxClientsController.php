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
        return $this->render('Mavi/Ajax/index', compact('A_clients'));
    }
}
