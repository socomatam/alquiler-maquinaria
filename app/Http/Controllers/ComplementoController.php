<?php

namespace App\Http\Controllers;

use App\Complemento;
use App\Contrato;
use Illuminate\Http\Request;

class ComplementoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $complementos = Complemento::all();
        return view('complementos.listado_complementos', compact('complementos'));
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
     * @param  \App\Complemento  $complemento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contratos = Contrato::find($id);
       //$hola = $contratos->complementos;
        

        return $contratos->complementos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Complemento  $complemento
     * @return \Illuminate\Http\Response
     */
    public function edit(Complemento $complemento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Complemento  $complemento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complemento $complemento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Complemento  $complemento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complemento $complemento)
    {
        //
    }
}
