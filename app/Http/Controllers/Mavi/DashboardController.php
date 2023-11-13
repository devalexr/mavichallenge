<?php

namespace App\Http\Controllers\Mavi;

class DashboardController extends MAVIController
{
    protected function _title($S_title)
    {
        parent::_title('Dashboard: ' . $S_title);
    }

    public function index()
    {
        $this->_title('Inicio');
        return $this->render('Mavi/Dashboard/index');
    }
}
