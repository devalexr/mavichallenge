<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public $request = null;

    public function __construct()
    {
        $this->request = request();
    }

    protected $_VIEW_DATA = [];

    //=============== CONTOLLER =====================
    protected function routeNAME()
    {
        return Route::current()->uri;
    }

    protected function redirect($URL_url)
    {
        Redirect::to($URL_url)->send();
    }

    //==================================== GUI =================================

    protected function render($S_view, $VIEW_data = [])
    {
        $this->_VIEW_DATA = array_merge($this->_VIEW_DATA, $VIEW_data);
        return view($S_view, $this->_VIEW_DATA);
    }

    protected function _title($S_title)
    {
        $this->_VIEW_DATA['GUI_title'] = $S_title;
    }
}
