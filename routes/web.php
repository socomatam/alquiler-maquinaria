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
Route::resource('clientes', 'ClienteController')->middleware('auth');
Route::resource('maquinas', 'MaquinaController')->middleware('auth');
Route::resource('complementos', 'ComplementoController')->middleware('auth');
Route::resource('trabajadores', 'TrabajadoreController')->middleware('auth');
Route::resource('repuestos', 'RepuestoController')->middleware('auth');
Route::resource('categorias', 'CategoriaController')->middleware('auth');
Route::resource('tipos', 'TipoController')->middleware('auth');
Route::resource('modelos', 'ModeloController')->middleware('auth');
Route::resource('marcas', 'MarcaController')->middleware('auth');
Route::resource('estados', 'EstadoController')->middleware('auth');
Route::resource('desplazamientos', 'DesplazamientoController')->middleware('auth');


//Route::post('alquiler', 'AlquilereController')->middleware('auth');



//Route::post('alquilerdos', 'AlquilereController@createDos')->middleware('auth');











Route::get('/pruebas', function () {
    //$prueba = App\Alquilere::select('*')->join('clientes', 'alquileres.cliente_id', '=', 'clientes.id')->get();
    //echo "$prueba";

    //$hora = Carbon\Carbon::now();
    //$date1 = new DateTime("now");
    
    //var_dump($date1);
    //$hola = App\Alquilere_maquina::all();

    //echo "$hola";

    //realción uno a uno
    //$usuario = App\Contrato::find(1)->maquina;

    //echo  "$usuario->maq_marca";

     //$prueba = App\Contrato::select('*')->join('alquileres', 'contratos.alquiler_id', '=', 'alquileres.id')->get();
    //echo "$prueba";

    //
    //$id = Auth::id();

    //echo "$id";

    //
   // $contratos = DB::table('contratos')->where('alquiler_id', 2)->get();
    
    //foreach($contratos as $c){
      //  echo $c->con_precio;
   // }



   $contrato = App\Maquina::select('maq_precio_dia')->where('id', 1)->get()[0]->maq_precio_dia;

   echo $contrato;

});
