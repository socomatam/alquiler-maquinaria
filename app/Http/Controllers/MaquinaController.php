<?php

namespace App\Http\Controllers;

use App\Maquina;
use App\Tipo;
use App\Marca;
use App\Modelo;
use App\Categoria;
use App\Desplazamiento;
use Illuminate\Http\Request;

class MaquinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $maquinas = Maquina::all();
        return view('maquinas.listado_maquina', compact('maquinas'));
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
    public function store(Request $request){
        
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
        $maquina->maq_estado = 'Libre';
        $maquina->maq_seguro = 'Vigente';
        $maquina->save();

        return redirect('maquinas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Maquina  $maquina
     * @return \Illuminate\Http\Response
     */
    public function show(Maquina $maquina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maquina  $maquina
     * @return \Illuminate\Http\Response
     */
    public function edit(Maquina $maquina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maquina  $maquina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maquina $maquina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maquina  $maquina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maquina $maquina)
    {
        //
    }
}
