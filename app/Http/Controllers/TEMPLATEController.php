<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TEMPLATEController extends Controller
{
    private $__GUI_NAV_BREADCRUMB = [];

    //============================== GUI ====================================

    protected function render($S_view, $VIEW_data = [])
    {
        $this->_beforeRender();
        return parent::render($S_view, $VIEW_data);
    }

    protected function _beforeRender()
    {
    }

    protected function _title($S_title)
    {
        $this->_viewTitle($S_title);
        parent::_title($S_title . ' | ' . env('APP_NAME'));
    }

    protected function _viewTitle($S_title)
    {
        $this->_VIEW_DATA['GUI_view_title'] = $S_title;
    }

    //===== breadcrumb =====
    protected function _breadcumbADD(array $A_element)
    {
        $this->__GUI_NAV_BREADCRUMB[] = $A_element;
        $this->_breadcumbSET($this->__GUI_NAV_BREADCRUMB);
    }

    protected function _breadcumbSET(array $A_breadcumb)
    {
        $this->_VIEW_DATA['GUI_breadcumb'] = $A_breadcumb;
    }

    protected function _breadcumbIndexSET($S_title)
    {
        $this->_VIEW_DATA['GUI_breadcumb_index'] = $S_title;
    }

    //===== menu =========
    protected function _menuSET($A_menu)
    {
        $this->_VIEW_DATA['GUI_menu'] = $A_menu;
    }

    //===== navpills ====
    protected function _navpillsSET(array $A_navpills)
    {
        $this->_VIEW_DATA['GUI_navpills'] = $A_navpills;
    }

    protected function _navpillsBTNSET(array $A_btn)
    {
        $this->_VIEW_DATA['GUI_navpills_btn'] = $A_btn;
    }

    //===== navbar =====
    protected function _navbarSET(array $A_navbar)
    {
        $this->_VIEW_DATA['GUI_navbar'] = $A_navbar;
    }


    //============= btn accion ==============
    protected function _btnAccionSET(array $A_btn)
    {
        $this->_VIEW_DATA['GUI_btn_accion'] = $A_btn;
    }

    //===================== MENSAJES ======================
    protected function MSJSuccess($S_message = '¡Operación exitosa!')
    {
        $this->__setMSJFlash($S_message, 'success');
    }

    protected function MSJError($S_message = 'Upss! Ha ocurrido un error inesperado')
    {
        $this->__setMSJFlash($S_message, 'danger');
    }

    protected function MSJInfo($S_message)
    {
        $this->__setMSJFlash($S_message, 'info');
    }

    private function __setMSJFlash($S_message, $S_class)
    {
        Session::flash('flash_message', $S_message);
        Session::flash('flash_message_class', $S_class);
    }
}
