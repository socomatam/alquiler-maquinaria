<?php

namespace App\Http\Controllers;

use App\Alquilere;
use App\User;
use App\Maquina;
use App\Contrato;
use App\Cliente;
use App\Trabajadore;
use App\Cuenta;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use DB;
use App\Quotation;
use Illuminate\Support\Facades\Auth;

class AlquilereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $clientes = Cliente::all();
        $alquiler = Alquilere::select(
            'trabajadores.id AS id_trabajador',
            'clientes.id AS id_clientes',
            'alquileres.id AS id_alquiler',
            'clientes.cli_nombre_empresa AS empresa',
            'alquileres.alq_fecha_inicio AS inicio',
            'alquileres.alq_fecha_fin AS fin',
            'alquileres.alq_incidencia AS incidencia',
            'alquileres.alq_precio AS alq_precio',
            'trabajadores.tra_nombre_trabajador AS nombre_trabajador',
            'trabajadores.tra_apellido_1 AS apellido_trabajador_1',
            'trabajadores.tra_apellido_2 AS apellido_trabajador_2',
            DB::raw("DATEDIFF(alquileres.alq_fecha_fin,alquileres.alq_fecha_inicio) AS dias")
        )->join(
            'clientes', 'alquileres.cliente_id', '=', 'clientes.id'
        )->join(
            'trabajadores', 'alquileres.trabajador_id', '=', 'trabajadores.id'
        )->get();

        $fechaActual = new DateTime('now');
        $fechaActual =  $fechaActual->format('Y-m-d');

        return view('alquiler.listado', compact('alquiler', 'fechaActual', 'clientes'));
    }//fin index


    public function createDos(){
        $cuentas = Cuenta::all();
        $clientes = Cliente::all();
        $maquinas = Maquina::where('maq_estado','Libre')->get();

        //$idUsuario = Auth::id();//obtiene el id del usuario autenticado en el sistema
        $id = Auth::id();
        $empleado = User::find($id)->trabajador;//obtiene los datos del emprledo autenticado

        return view('alquiler.crear_alquiler', compact('cuentas','clientes', 'maquinas', 'empleado'));
    }//fin index


    public function listaMaquinas($id){
        $maquinas = Alquilere::find($id);

        $listaMaquinas = [];
        $i = 0;
        foreach($maquinas->maquinas as $maquina){

            $listaMaquinas[$i] = $maquina;
            $i++;

        }//fin for each

        return $listaMaquinas;
    }//fin lista máquinas

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $cuentas = Cuenta::all();
        $clientes = Cliente::all();
        $maquinas = Maquina::where('maq_estado','Libre')->get();

        //$idUsuario = Auth::id();//obtiene el id del usuario autenticado en el sistema
        $id = Auth::id();
        $empleado = User::find($id)->trabajador;//obtiene los datos del emprledo autenticado

        return view('alquiler.crear_alquiler', compact('cuentas','clientes', 'maquinas', 'empleado'));
    }//fin crear

    /**
     * Recoge el id del usario autenticado en el sistema.
     * Crea un objeto de tipo alquiler y lo guarda en la base de datos.
     * Recoje el contador de máquinas introducidas
     * Crean tanto objetos de tipo contrato como máquinas halla
     * Modifica un los objetos de tipo máquina 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $precioTotalAlquiler = 0;
        $precioMaquina = 0;
        $diasAlquiler = 0;

        $id = Auth::id();//recoge del usuario actualmente logeado en el sistema
    

        $alquiler = new Alquilere;
        $alquiler->cliente_id = $request->input('nombre_empresa');

        $fecha1 = new DateTime($request->input('from'));
        $fecha2 = new DateTime($request->input('to'));

        $dias = $fecha1->diff($fecha2);
        $precioMaquina = Maquina::select('maq_precio_dia')
                        ->where('id', $request->input('id_maquina'))
                      ->get()[0]->maq_precio_dia;

        $precioTotalAlquiler  = $precioTotalAlquiler + ($precioMaquina * $dias->format('%a'));

        $alquiler->alq_incidencia = 'Sin incidencias';
        $alquiler->alq_precio = $precioTotalAlquiler;
        $alquiler->trabajador_id = $id;
        $alquiler->save();
        
        ////////////////////////

        
     

            $contrato = new Contrato;
            $contrato->con_fecha_inicio = $request->input('from');
            $contrato->con_fecha_fin = $request->input('to');
            $contrato->maquina_id = $request->input('id_maquina');
            $contrato->con_detalle_trabajo = $request->input('descripcion');
            $contrato->con_precio = Maquina::select('maq_precio_dia')
                                      ->where('id', $request->input('id_maquina'))
                                ->get()[0]->maq_precio_dia;
            $contrato->alquiler_id = $alquiler->id;
            $contrato->save();

            Maquina::where('id',$request
                ->input('id_maquina'))
                ->update(['maq_estado'=>'Alquilada']);
        //}//fin for

        Cuenta::query()->delete();

        $cuentas = Cuenta::all();
        $clientes = Cliente::all();
        $maquinas = Maquina::where('maq_estado','Libre')->get();
        $id = Auth::id();
        $empleado = User::find($id)->trabajador;//obtiene los datos del emprledo autenticado

        return redirect('alquiler');

    }//fin store



    public function storeAlquiler2(Request $request){

        $precioTotalAlquiler = 0;
        $precioMaquina = 0;
        $diasAlquiler = 0;

        $id = Auth::id();//recoge del usuario actualmente logeado en el sistema
    

        $alquiler = new Alquilere;
        $alquiler->cliente_id = $request->input('nombre_empresa');

        $fecha1 = new DateTime($request->input('from'));
        $fecha2 = new DateTime($request->input('to'));

        $dias = $fecha1->diff($fecha2);
        $precioMaquina = Maquina::select('maq_precio_dia')
                        ->where('id', $request->input('id_maquina'))
                      ->get()[0]->maq_precio_dia;

        $precioTotalAlquiler  = $precioTotalAlquiler + ($precioMaquina * $dias->format('%a'));

        $alquiler->alq_incidencia = 'Sin incidencias';
        $alquiler->alq_precio = $precioTotalAlquiler;
        $alquiler->trabajador_id = $id;
        $alquiler->save();
        
        ////////////////////////

        
     

            $contrato = new Contrato;
            $contrato->con_fecha_inicio = $request->input('from');
            $contrato->con_fecha_fin = $request->input('to');
            $contrato->maquina_id = $request->input('id_maquina');
            $contrato->con_detalle_trabajo = $request->input('descripcion');
            $contrato->con_precio = Maquina::select('maq_precio_dia')
                                      ->where('id', $request->input('id_maquina'))
                                ->get()[0]->maq_precio_dia;
            $contrato->alquiler_id = $alquiler->id;
            $contrato->save();

            Maquina::where('id',$request
                ->input('id_maquina'))
                ->update(['maq_estado'=>'Alquilada']);
        //}//fin for

        Cuenta::query()->delete();

        $cuentas = Cuenta::all();
        $clientes = Cliente::all();
        $maquinas = Maquina::where('maq_estado','Libre')->get();
        $id = Auth::id();
        $empleado = User::find($id)->trabajador;//obtiene los datos del emprledo autenticado

        return view('alquiler.crear_alquiler', compact('cuentas','clientes', 'maquinas', 'empleado'));

    }//fin store

    /**
     * Display the specified resource.
     *
     * @param  \App\Alquilere  $alquilere
     * @return \Illuminate\Http\Response
     */
    public function show($id){

       // $contratos = Contrato::where('alquiler_id','=', $id);

        //$contratos = Contrato::all();
        //dd($contratos);


        $contratos = Contrato::select(
            'contratos.id AS id',
            'contratos.con_fecha_inicio AS fecha_inicio',
            'contratos.con_fecha_fin AS fecha_final',
            'maquinas.maq_marca AS maq_marca',
            'maquinas.maq_modelo AS maq_modelo',
            'maquinas.maq_traslacion AS maq_traslacion',
            'maquinas.maq_tipo AS maq_tipo',
            'maquinas.maq_peso AS maq_peso',
            'maquinas.maq_dimension_alto AS maq_alto',
            'maquinas.maq_dimension_largo AS maq_largo',
            'maquinas.maq_dimension_ancho AS maq_ancho',
            'maquinas.maq_categoria AS maq_categoria',
            'maquinas.maq_tipo AS maq_estado',
            'maquinas.maq_precio_dia AS maq_precio',
            DB::raw("DATEDIFF(contratos.con_fecha_fin,contratos.con_fecha_inicio) AS dias")
            
        )->join(
            'maquinas', 'contratos.maquina_id', '=', 'maquinas.id'
        //)->join(
          //  'trabajadores', 'alquileres.trabajador_id', '=', 'trabajadores.id'
        )->where('alquiler_id', $id)->get();





        //$contratos = DB::table('contratos')->where('alquiler_id', $id)->get();
        
        
        return view('alquiler.contratos', compact('contratos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alquilere  $alquilere
     * @return \Illuminate\Http\Response
     */
    public function edit(Alquilere $alquilere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alquilere  $alquilere
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){

        $request->input('empresa');
        Alquilere::where('id',$id)->update(['cliente_id'=>$request->input('empresa')]);

    }//fin update

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alquilere  $alquilere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alquilere $alquilere)
    {
        //
    }
}
