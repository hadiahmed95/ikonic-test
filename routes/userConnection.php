<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/send-request/{id}', [App\Http\Controllers\HomeController::class, 'send_request']);
Route::get('/accept-request/{id}', [App\Http\Controllers\HomeController::class, 'accept_request']);
Route::get('/remove-connection/{id}', [App\Http\Controllers\HomeController::class, 'remove_connection']);
