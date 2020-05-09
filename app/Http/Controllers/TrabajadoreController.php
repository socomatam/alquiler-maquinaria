<?php

namespace App\Http\Controllers;

use App\Trabajadore;
use Illuminate\Http\Request;

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
    public function edit(Trabajadore $trabajadore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trabajadore  $trabajadore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trabajadore $trabajadore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trabajadore  $trabajadore
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trabajadore $trabajadore)
    {
        //
    }
}
