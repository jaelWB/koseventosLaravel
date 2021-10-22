<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/eventos','ApiController@eventos')->name('api.eventos');
Route::get('/cargos','ApiController@cargos')->name('api.cargos');
Route::get('/ver-eventos/{slug}','ApiController@verEventos')->name('api.verEventos');

Route::post('/login','ApiController@login')->name('api.login');
Route::post('/registro','ApiController@registro')->name('api.registro');
Route::post('/registro-vista','ApiController@registroVista')->name('api.registroVista');
Route::post('/registro-ads','ApiController@registroAds')->name('api.registroAds');

Route::get('/boton','ApiController@boton')->name('api.boton');

