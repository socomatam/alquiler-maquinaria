<?php

namespace App\Http\Controllers;

use Session;
use App\Trabajadore;
use Illuminate\Http\Request;
use App\Http\Requests\TrabajadorRequest;

class TrabajadoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajadores = Trabajadore::all();
        return view('trabajadores.listado_trabajadores', compact('trabajadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trabajadores.crear_trabajador');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrabajadorRequest $request)
    {
        Session::flash('finalizar_registro', 'El trabajador se ha creado correctamente.');
        Trabajadore::create($request->all());
        return redirect('trabajadores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trabajadore  $trabajadore
     * @return \Illuminate\Http\Response
     */
    public function show(Trabajadore $trabajadore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trabajadore  $trabajadore
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trabajador = Trabajadore::find($id);
        return view('trabajadores.editar_trabajador', compact('trabajador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trabajadore  $trabajadore
     * @return \Illuminate\Http\Response
     */
    public function update(TrabajadorRequest $request, $id)
    {
        $request = request()->except('_token','_method');
		
		Trabajadore::where('id',$id)->update($request);
		
		Session::flash('editar_registro', 'El trabajador se ha editado correctamente.');	
		
        return redirect('trabajadores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trabajadore  $trabajadore
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajador = Trabajadore::where('id', '=', $id);
        $trabajador->delete(); 
    }
}
