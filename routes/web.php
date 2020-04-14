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
Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});




//Route::get('/home', 'HomeController@index')->name('home');

Route::resource('alquiler', 'AlquilereController')->middleware('auth');
Route::get('maquinas_alquiladas/{id}', 'AlquilereController@listaMaquinas')->middleware('auth');





Route::get('/pruebas', function () {
    //$prueba = App\Alquilere::select('*')->join('clientes', 'alquileres.cliente_id', '=', 'clientes.id')->get();
    //echo "$prueba";

    //$hora = Carbon\Carbon::now();
    $date1 = new DateTime("now");
    
    var_dump($date1);
    

});
