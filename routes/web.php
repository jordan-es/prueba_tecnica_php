<?php
use App\categoria;
use App\pelicula;
use App\alquiler;
use App\User;
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

// Route::get('/', function () {
//   $peliculas = pelicula::all();
//     return view('index', compact('peliculas'));
// });



Route::get('/', 'clienteController@index')->name('cliente');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('cms', 'cmsController')->middleware('auth');
Route::get('/verMovimientos', function ()
{
  $user = auth()->user()->id;
  $alquiler = alquiler::where('cod_users_fk','=',$user)->get();
  return view('movimientos.movimientos', compact('alquiler'));
})->middleware('auth');

Route::get('/verUsuarios', function ()
{
  $user = User::all();
  //dd($user);
  return view('movimientos.verUsuarios', compact('user'));
})->middleware('auth');


//Route::get('/verAlquiler', 'clienteController@verAlquiler')->name('idAlquiler');
Route::get('/pdfPeliculas', 'pdfController@generarPDF')->middleware('auth');
Route::get('/pdfUsers', 'pdfController@generarPDF2')->middleware('auth');
Route::get('/pdfTransacciones', 'pdfController@generarPDF3')->middleware('auth');

Route::get('users/export/', 'excelController@export');
Route::get('peliculas/export/', 'excelController@export2');
Route::get('compra/export/', 'excelController@export3');
Route::get('alquiler/export/', 'excelController@export4');

Route::resource('cliente', 'clienteController')->middleware('auth');

Route::get('/registroPeliculas', function ()
{
  $categorias = categoria::all();
  return view('admin.registroPeliculas', compact('categorias'));
})->middleware('auth');

Route::get('/pelicula/{id}/confirmar','cmsController@confirmar')->name('cms.confirmar');
