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
Route::post('auth/login', [LoginController::class, 'login']);

//clients
Route::get('/clients', [ClientsController::class, 'index']);

//ajax
Route::get('/ajax/clients/index', [AjaxClientsController::class, 'index']);
Route::get('/ajax/clients/delete', [AjaxClientsController::class, 'delete']);
