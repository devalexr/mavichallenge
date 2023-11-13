<?php

use App\Http\Controllers\Mavi\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Mavi\AjaxClientsController;
use App\Http\Controllers\Mavi\ClientsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//login
Route::get('/', [LoginController::class, 'index']);
Route::post('/ajax/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

//clients
Route::get('/clients', [ClientsController::class, 'index']);
Route::get('/clients/add', [ClientsController::class, 'add']);
Route::get('/clients/view/{ID_client_id}', [ClientsController::class, 'view']);
Route::get('/clients/edit/{ID_client_id}', [ClientsController::class, 'edit']);

//ajax
Route::get('/ajax/clients/index', [AjaxClientsController::class, 'index']);
Route::get('/ajax/clients/view/{ID_client_id}', [AjaxClientsController::class, 'view']);
Route::get('/ajax/clients/data/{ID_client_id}', [AjaxClientsController::class, 'data']);
Route::post('/ajax/clients/add', [AjaxClientsController::class, 'add']);
Route::post('/ajax/clients/edit/{ID_client_id}', [AjaxClientsController::class, 'edit']);
Route::get('/ajax/clients/delete/{ID_client_id}', [AjaxClientsController::class, 'delete']);
