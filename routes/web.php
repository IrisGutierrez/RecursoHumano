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
//route::get('/descargaF2', 'DeclaracionJurada@imprimir')->name('descargaF2'); //creo que hay que cambiar por post
route::post('/verF2', 'DeclaracionJurada@ver')->name('verF2');
/*VISTA ADMINISTRACION DE DOCUMENTOS*/
route::get('/administracion-documentos', 'AdministracionDocumentos@vista');
route::post('/agregarDocumento', 'AdministracionDocumentos@agregar');

/*--------------------------------LIQUIDACIONES----------------------------------------*/
/*LISTADO DE PLANILLAS*/
route::get('/filtplanillas','FormularioLiqController@filtlistado')->name('liquidacion.filtlistado');
route::get('filtplanillas/planillas','FormularioLiqController@listado')->name('liquidacion.listado');
/*AGREGAR NUEVA PLANILLA*/
route::get('/addForm','FormularioLiqController@add')->name('liquidacion.add');

/*PLANILLA AGREGADA CORRECTAMENTE*/
route::post('planillas/addForm/store','FormularioLiqController@store')->name('liquidacion.store');

route::get('/indexliq','LiquidacionController@index')->name('liquidacion.indexliq');
route::get('/prueba','PivotController@prueba')->name('liquidacion.prueba');
route::post('prueba/pruebaform','PivotController@pruebaform')->name('liquidacion.pruebaform');
route::get('indexliq/elegirinstitucion','LiquidacionController@elegirinstitucion')->name('liquidacion.elegirinstitucion');

route::get('/altaybaja','AltaBajaController@altaybaja')->name('liquidacion.altaybaja');
route::post('/altaybaja/post','AltaBajaController@altaybajapost')->name('liquidacion.altaybajapost');
route::get('/pdfAltaBaja', 'AltaBajaController@ver')->name('liquidacion.pdfAltaBaja');
route::delete('altaybaja/delete/{id}','AltaBajaController@delete')->name('liquidacion.delete');
route::get('indexliq/novedades','LiquidacionController@novedades')->name('liquidacion.novedades');
route::get('indexliq/otrasnovedades','LiquidacionController@otrasnovedades')->name('liquidacion.otrasnovedades');

/*--------------------------------FORMULARIO DE LIQUIDACIONES------------------------------*/
route::get('/indexform','LiquidacionController@indexform')->name('liquidacion.indexform');
route::get('indexform/institucionform','LiquidacionController@institucionform')->name('liquidacion.institucionform');
route::get('indexform/docenteform','LiquidacionController@docenteform')->name('liquidacion.docenteform');
route::get('indexform/altaybajaform','LiquidacionController@altaybajaform')->name('liquidacion.altaybajaform');
route::get('indexform/novedadesform','LiquidacionController@novedadesform')->name('liquidacion.novedadesform');
route::get('indexform/otrasnovedadesform','LiquidacionController@otrasnovedadesform')->name('liquidacion.otrasnovedadesform');
route::post('institucionform/addinstitucion','LiquidacionController@addinstitucion')->name('liquidacion.addinstitucion');
route::post('institucionform/adddocente','LiquidacionController@adddocente')->name('liquidacion.adddocente');
route::post('institucionform/addaltaybaja','LiquidacionController@addaltaybaja')->name('liquidacion.addaltaybaja');
route::post('institucionform/addnovedades','LiquidacionController@addnovedades')->name('liquidacion.addnovedades');
route::post('institucionform/addotrasnovedades','LiquidacionController@addotrasnovedades')->name('liquidacion.addotrasnovedades');

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

/*********** RUTA DE DESCARGA ****************/
route::get('Descarga/index','DescargaController@index');
route::get('Descarga/descarga','DescargaController@descarga');
route::get('Descarga/downloadDos','DescargaController@downloadDos');
route::get('Descarga/downloadTres','DescargaController@downloadTres');
