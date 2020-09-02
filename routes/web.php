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
    return view('welcome');
})->name('main');

/*----------------------------------NOVEDADES---------------------------------------*/
/*GALERIA DE FOTOS DE NOVEDADES*/
route::get('/index','NoveltyController@index')->name('novelty.index');

/*GALERIA DE FOTOS DE NOVEDADES*/
route::get('/indexuser','NoveltyController@index')->name('novelty.index');

/*LISTADO DE FOTOS*/
route::get('index/modify','NoveltyController@modify')->name('novelty.modify');

/*INFORMACIÓN DE FOTOS*/
route::get('index/infonovelty','NoveltyController@infonovelty')->name('novelty.infonovelty');

/*AGREGAR NUEVA FOTO*/
route::get('modify/add','NoveltyController@add')->name('novelty.add');

/*FOTO AGREGADA CORRECTAMENTE*/
route::post('add/store','NoveltyController@store')->name('novelty.store');

/*EDITAR NOVEDAD*/
route::get('modify/edith/{id}','NoveltyController@edith')->name('novelty.edith');

/*ACTUALIZAR NOVEDAD*/
route::put('modify/edith/{id}','NoveltyController@update')->name('novelty.update');

/*ELIMINAR NOVEDAD*/
route::delete('modify/delete/{id}','NoveltyController@delete')->name('novelty.delete');

/*------------------------------------DECLARACIONES JURADAS-----------------------------*/

/*DECLARACION JURADA DE CARGO*/
route::get('/F2', 'DeclaracionJurada@vista');

/*VISTA ADMINISTRACION DE DOCUMENTOS*/
route::get('/administracion-documentos', 'AdministracionDocumentos@vista');
route::post('/agregarDocumento', 'AdministracionDocumentos@agregar');

/*--------------------------------LIQUIDACIONES----------------------------------------*/
route::get('/indexliq','LiquidacionController@index')->name('liquidacion.indexliq');
route::get('indexliq/altaybaja','LiquidacionController@altaybaja')->name('liquidacion.altaybaja');
route::get('indexliq/novedades','LiquidacionController@novedades')->name('liquidacion.novedades');
route::get('indexliq/otrasnovedades','LiquidacionController@otrasnovedades')->name('liquidacion.otrasnovedades');

/*--------------------------------FORMULARIO DE NOVEDADES------------------------------*/
route::get('/indexform','LiquidacionController@indexform')->name('liquidacion.indexform');
route::get('indexform/institucionform','LiquidacionController@institucionform')->name('liquidacion.institucionform');
route::get('indexform/docenteform','LiquidacionController@docenteform')->name('liquidacion.docenteform');
route::get('indexform/altaybajaform','LiquidacionController@altaybajaform')->name('liquidacion.altaybajaform');
route::get('indexform/novedadesform','LiquidacionController@novedadesform')->name('liquidacion.novedadesform');
route::get('indexform/otrasnovedadesform','LiquidacionController@otrasnovedadesform')->name('liquidacion.otrasnovedadesform');

route::match(['put','patch'],'novelty/{novelty}','NoveltyController@update')->name('novelty.update');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*RUTA DE PLANILLA DE NOVEDADES*/

route::get('Liquidacion/formulario',function()
{
    return view('Liquidacion/formulario');
});

route::get('Liquidacion/formularioDocente',function()
{
    return view('Liquidacion/formularioDocente');
});

