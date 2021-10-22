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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/cms', 'HomeController@cms')->name('cms');
Route::get('/home/{evento?}', 'HomeController@cms')->name('cms');
Route::get('/inicio/{ubicacion?}/{tipo?}/{modalidad?}/{mes?}', 'HomeController@index')->name('home');
// Route::get('/', 'HomeController@index')->name('home');

Route::get('/reportes', 'HomeController@reportes')->name('reportes');
Route::get('/asistencias', 'HomeController@asistencias')->name('asistencias');
Route::get('/asistencia/evento/{evento}', 'HomeController@asistenciaevento')->name('asistenciaevento');
Route::get('/reportes/exportar/{evento}', 'HomeController@reportesexportar')->name('home.reportesexportar');
Route::get('/asistencia/salvarlead/{lead}/{opcion}', 'HomeController@salvarlead')->name('home.salvarlead');




Route::resource('ciudade','CiudadeController');
Route::resource('evento','EventoController');
Route::resource('user','UserController');
Route::get('evento/eliminar/{evento}','EventoController@eliminar')->name('evento.eliminar');

Route::get('evento/formulario/{evento}','EventoController@formulario')->name('evento.formulario');

// CIUDADES EVENTOS 
Route::get('evento/ciudades/{evento}','EventoController@ciudades')->name('evento.ciudades');
Route::post('evento/ciudades/save/','EventoController@ciudadesSave')->name('evento.ciudadessave');
Route::get('evento/eliminar-ciudad/{id}','EventoController@ciudadeseliminar')->name('evento.ciudadeseliminar');



Route::post('evento-campos','EventoController@salvarcampos')->name('evento.salvarcampos');


// LOGOS 
Route::get('logo/{evento}','LogoController@index')->name('logo.index');
Route::get('logo/create/{evento}','LogoController@create')->name('logo.create');
Route::get('logo/edit/{logo}','LogoController@edit')->name('logo.edit');
Route::post('logo/store/','LogoController@store')->name('logo.store');
Route::patch('logo/{logo}','LogoController@update')->name('logo.update');
Route::get('logo/elimina/{id}','LogoController@eliminar')->name('logo.eliminar');



// grupos de interes 
Route::get('conferencia/{evento}','ConferenciaController@index')->name('conferencia.index');
Route::get('conferencia/create/{evento}','ConferenciaController@create')->name('conferencia.create');
Route::get('conferencia/edit/{conferencia}','ConferenciaController@edit')->name('conferencia.edit');
Route::post('conferencia/store/','ConferenciaController@store')->name('conferencia.store');
Route::patch('conferencia/{conferencia}','ConferenciaController@update')->name('conferencia.update');
Route::get('grupos/elimina/{id}','ConferenciaController@eliminar')->name('conferencia.eliminar');



// EXPOSITORES 
Route::get('expositore/{evento}','ExpositoreController@index')->name('expositore.index');
Route::get('expositore/create/{evento}','ExpositoreController@create')->name('expositore.create');
Route::get('expositore/edit/{expositore}','ExpositoreController@edit')->name('expositore.edit');
Route::post('expositore/store/','ExpositoreController@store')->name('expositore.store');
Route::patch('expositore/{expositore}','ExpositoreController@update')->name('expositore.update');
Route::get('expositore/elimina/{id}','ExpositoreController@eliminar')->name('expositore.eliminar');



// CATEGORIA 
Route::resource('categoria','CategoriaController')->parameters(['categoria' => 'categoria']);

// OBJETIVOS 
Route::get('objetivo/{evento}','ObjetivoController@index')->name('objetivo.index');
Route::get('objetivo/create/{evento}','ObjetivoController@create')->name('objetivo.create');
Route::get('objetivo/edit/{objetivo}','ObjetivoController@edit')->name('objetivo.edit');
Route::post('objetivo/store/','ObjetivoController@store')->name('objetivo.store');
Route::patch('objetivo/{objetivo}','ObjetivoController@update')->name('objetivo.update');
Route::get('objetivo/elimina/{id}','ObjetivoController@eliminar')->name('objetivo.eliminar');



// FRONT END
Route::get('/{nombre}','HomeController@evento')->name('home.evento');
Route::get('evento/tematica/{evento}','HomeController@tematica')->name('home.tematica');
Route::get('evento/registro/{evento}/{tk?}','HomeController@registro')->name('home.registro');
Route::post('salvar-registro','HomeController@registrar')->name('home.registrar');
Route::get('registro/eliminar/{lead}','HomeController@eliminar')->name('home.eliminar');
Route::get('evento/finalizar/{evento}/{lead?}','HomeController@finalizar')->name('home.finalizar');
Route::post('buscar/evento/','HomeController@buscar')->name('home.buscar');

Route::get('no-registro/{slug}','HomeController@RepetidoLead')->name('home.RepetidoLead');



// NUEVA ETAPA EN VIVO 
Route::resource('admin/micronoticiero','MicronoticieroController')->parameters(['micronoticiero' => 'micronoticiero']);
// Route::get('admin/micronoticiero','MicronoticieroController@index')->name('micronoticieros.index');

// CARGOS ESTANDARIZADOS 
Route::resource('admin/cargosestandarizado','CargosEstandarizadoController')->parameters(['cargosestandarizado' => 'cargosestandarizado']);


// PUBLICIDAD

Route::get('publicidad/{evento}','PublicidadController@index')->name('publicidad.index');
Route::get('publicidad/create/{evento}','PublicidadController@create')->name('publicidad.create');
Route::get('publicidad/edit/{publicidad}','PublicidadController@edit')->name('publicidad.edit');
Route::post('publicidad/store/','PublicidadController@store')->name('publicidad.store');
Route::patch('publicidad/{publicidad}','PublicidadController@update')->name('publicidad.update');
Route::get('publicidad/elimina/{id}','PublicidadController@eliminar')->name('publicidad.eliminar');

// ONLINE

Route::get('online/{evento}','OnlineController@index')->name('online.index');
Route::get('online/create/{evento}','OnlineController@create')->name('online.create');
Route::get('online/edit/{online}','OnlineController@edit')->name('online.edit');
Route::post('online/store/','OnlineController@store')->name('online.store');
Route::patch('online/{online}','OnlineController@update')->name('online.update');
Route::get('online/elimina/{id}','OnlineController@eliminar')->name('online.eliminar');

Route::resource('/admin/registro','RegistroController')->parameters(['registro' => 'registro']);

Route::get('online/ver-ingresos/{id}','OnlineController@verIngresos')->name('online.verIngresos');









