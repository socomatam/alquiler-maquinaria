<?php

namespace App\Http\Controllers;
use DB;
use Session;
use App\Contrato;
use App\Alquilere;
use App\Maquina;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show(Contrato $contrato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contrato $contrato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contrato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy($alquiler)
    {
        $maquinaIds = DB::table('contratos')
        ->select(DB::raw("maquina_id AS id_maquina"))
        ->where('alquiler_id', $alquiler)->get();

        
        foreach($maquinaIds as $id){
            Maquina::where('id', $id->id_maquina)
            ->update(['maq_estado'=>'Libre']);
        }//fin


        $nContratos = DB::table('contratos')
        ->select(DB::raw("count(*) AS numero"))
        ->where('alquiler_id', $alquiler)->get();

        //Conseguimos el objeto
        $contrato=Contrato::where('alquiler_id', '=', $alquiler);    
        // Lo eliminamos de la base de datos
        $contrato->delete();

        $objAlquiler = Alquilere::where('id', '=', $alquiler);
        $objAlquiler->delete(); 

        Session::flash('cancelar_registro', 'El alquiler se ha cancelado son éxito.');


        return redirect('alquiler');
    }
}
