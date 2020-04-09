@extends('layouts.app')

@section('content')

    <div class='alq_contenedor'>
        <table id="alq_tabla_id" class="display">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Cliente</th>
                    <th>Inicio de alquiler</th>
                    <th>Fin de alquiler</th>
                </tr>
            </thead>
            <tbody>

                @foreach($alquiler as $alq)
                    <tr>
                        <td>{{$alq->id}}</td>
                        <td>{{$alq->cliente_id}}</td>
                        <td>{{$alq->alq_fecha_inicio}}</td>
                        <td>{{$alq->alq_fecha_fin}}</td>
                    </tr>
                @endforeach
                
                
            </tbody>
        </table> 
    <div>

@endsection