<?php

namespace App\Http\Controllers;

use App\Alquilere;
use App\Cliente;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class AlquilereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$fechaActual = Carbon::now();
        
        $alquiler = Alquilere::select(
            'clientes.id AS id_clientes',
            'alquileres.id AS id_alquiler',
            'clientes.cli_nombre_empresa AS empresa',
            'alquileres.alq_fecha_inicio AS inicio',
            'alquileres.alq_fecha_fin AS fin',

        )->join('clientes', 'alquileres.cliente_id', '=', 'clientes.id')->get();

            $fechaActual = new DateTime('now');
            $fechaActual =  $fechaActual->format('Y-m-d');
           

            //dd( $fechaActual);

        return view('alquiler.listado', compact('alquiler', 'fechaActual'));
    }//fin index

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
     * @param  \App\Alquilere  $alquilere
     * @return \Illuminate\Http\Response
     */
    public function show(Alquilere $alquilere)
    {
        //
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
    public function update(Request $request, Alquilere $alquilere)
    {
        //
    }

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
