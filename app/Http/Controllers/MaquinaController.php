<?php

namespace App\Http\Controllers;

use DB;
use App\Maquina;
use App\Contrato;
use App\Alquilere;
use App\Estado;
use App\Tipo;
use App\Marca;
use App\Modelo;
use App\Categoria;
use App\Desplazamiento;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\MaquinaRequest;

class MaquinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

       /*
        $maquinas = Contrato::select(
            'contratos.id AS id_contrato',
            'maquinas.maq_imagen AS maq_imagen', 
            DB::raw('COUNT(maquinas.id) as amount'),
            'contratos.con_incidencia AS incidencia',
            'contratos.con_fecha_inicio AS fecha_inicio',
            'contratos.con_fecha_fin AS fecha_final',
            'maquinas.maq_marca AS maq_marca',
            'maquinas.maq_modelo AS maq_modelo',
            'maquinas.maq_traslacion AS maq_traslacion',
            'maquinas.maq_tipo AS maq_tipo',
            'maquinas.maq_peso AS maq_peso',
            'maquinas.maq_dimension_alto AS maq_dimension_alto',
            'maquinas.maq_dimension_largo AS maq_dimension_largo',
            'maquinas.maq_dimension_ancho AS maq_dimension_ancho',
            'maquinas.maq_categoria AS maq_categoria',
            'maquinas.maq_estado AS maq_estado',
            'maquinas.maq_precio_dia AS maq_precio',
            'maquinas.id AS id',
            'maquinas.maq_estado AS maq_estado',
            'maquinas.maq_precio_dia AS maq_precio_dia',
            DB::raw("DATEDIFF(contratos.con_fecha_fin,contratos.con_fecha_inicio) AS dias")
            
        )->rightJoin(
            'maquinas', 'contratos.maquina_id', '=', 'maquinas.id'
        //)->join(
          //  'trabajadores', 'alquileres.trabajador_id', '=', 'trabajadores.id'
        )->groupBy('contratos.id','maq_imagen','con_incidencia','con_fecha_inicio',
        'con_fecha_fin',
        'maq_marca',
        'maq_modelo',
        'maq_traslacion',
        'maq_tipo',
        'maq_peso',
        'maq_dimension_alto',
        'maq_dimension_largo',
        'maq_dimension_ancho',
        'maq_categoria',
        'maq_estado',
        'maq_precio',
        'maquinas.id',
        
       
        )->get();

        
            */

        $maquinas = Maquina::all();
        $estados = Estado::all();
        return view('maquinas.listado_maquina', compact('maquinas', 'estados'));
    }

    /**
     * Muestra el formulario para la creación de máquinas.
     * Al tiempo que para 
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $maquinas = Maquina::all();
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $categorias = Categoria::all();
        $desplazamientos = Desplazamiento::all();
        $tipos = Tipo::all();

        return view('maquinas.crear_maquina', compact('desplazamientos','tipos','categorias','maquinas','marcas', 'modelos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaquinaRequest $request){
        

    
        $imagen = $request->file('file');
        $nombreImg = $request->file('file')->getClientOriginalName();
            
        $imagen->move('image', $nombreImg);

        $maquina = new Maquina;
        $maquina->maq_marca = $request->input('marca');
        $maquina->maq_modelo = $request->input('modelo');
        $maquina->maq_tipo = $request->input('tipo');
        $maquina->maq_traslacion = $request->input('desplazamiento');
        $maquina->maq_peso = $request->input('peso');
        $maquina->maq_dimension_alto = $request->input('alto');
        $maquina->maq_dimension_largo = $request->input('largo');
        $maquina->maq_dimension_ancho = $request->input('ancho');
        $maquina->maq_categoria = $request->input('categoria');
        $maquina->maq_precio_dia = $request->input('precio');
        $maquina->maq_imagen = $nombreImg;
        $maquina->maq_estado = 'Libre';
        $maquina->maq_seguro = 'Vigente';
        $maquina->save();
        Session::flash('finalizar_registro', 'La máquina se ha creado correctamente.');

        return redirect('maquinas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Maquina  $maquina
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $maquina = Maquina::find($id);
        return view('maquinas.mapa_maquina', compact('maquina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maquina  $maquina
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maquinas = Maquina::all();
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $categorias = Categoria::all();
        $desplazamientos = Desplazamiento::all();
        $tipos = Tipo::all();
        $maquina = Maquina::find($id);
        return view('maquinas.editar_maquina', compact('maquina','desplazamientos','tipos','categorias','maquinas','marcas', 'modelos'));
    }

    /**
     * Cambia el estado de una maquina
     * 
     * 
     */
    public function editarEstado(Request $request){

      
        $estado = $request->input('estado');
        $id = $request->input('id');

      

        if($estado == 'Avería'){
            //cambia el estado de la máquina 
            Maquina::where('id',$id)
            ->update(['maq_estado'=>'Avería']);

            //marca una incidencia en el contrato
            Contrato::where('maquina_id',$id)
            ->update(['con_incidencia'=>'Con incidencias']);

            //Averigua el ide 
            $contrato = DB::table('contratos')->where('maquina_id', $id)->first();

            //cambia el estado del alquiler
            Alquilere::where('id',$contrato->alquiler_id)
            ->update(['alq_incidencia'=>'Con incidencias']);

        }else if($estado == 'Alquilada'){
            Maquina::where('id',$id)
            ->update(['maq_estado'=>'Alquilada']);

             //marca una sin incidencia en el contrato
             Contrato::where('maquina_id',$id)
             ->update(['con_incidencia'=>'Sin incidencias']);

             $contrato = DB::table('contratos')->where('maquina_id', $id)->first();

             Alquilere::where('id',$contrato->alquiler_id)
            ->update(['alq_incidencia'=>'Sin incidencias']);


        }else if($estado == 'Libre'){
            Maquina::where('id',$id)
            ->update(['maq_estado'=>'Libre']);


             //marca una sin incidencia en el contrato
             Contrato::where('maquina_id',$id)
             ->update(['con_incidencia'=>'Sin incidencias']);

             $contrato = DB::table('contratos')->where('maquina_id', $id)->first();

             Alquilere::where('id',$contrato->alquiler_id)
            ->update(['alq_incidencia'=>'Sin incidencias']);


        }
    }//fin editarEstado

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maquina  $maquina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imagen = $request->file('file');
        $nombreImg = $request->file('file')->getClientOriginalName();     
        $imagen->move('image', $nombreImg);

        Maquina::where('id',$id)
        ->update(['maq_imagen'=>$nombreImg]);

        $request = request()->except('_token','_method','file');
        Maquina::where('id',$id)->update($request);
        
       


		Session::flash('editar_registro', 'La máquina se ha editado correctamente.');		
        return redirect('maquinas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maquina  $maquina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Maquina::where('id', '=', $id);
        $cliente->delete(); 
    }
}
