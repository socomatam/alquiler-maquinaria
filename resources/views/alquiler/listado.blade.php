@extends('layouts.app')

@section('content')

    <div class='alq_contenedor'>
        <table id="alq_tabla_id" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>EMPRESA</th>
                    <th>INICIO ALQUILER</th>
                    <th>FIN ALQUILER</th>
                </tr>
            </thead>
            <tbody>

                @foreach($alquiler as $alq)
                    @if($alq->fin > $fechaActual)
                        <tr id="prueba">
                            <td>{{$alq->id_alquiler}}</td>
                            <td>{{$alq->empresa}}</td>
                            <td>{{$alq->inicio}}</td>
                            <td>{{$alq->fin}}</td>
                        </tr>
                    @else
                        <tr>
                            <td>{{$alq->id_alquiler}}</td>
                            <td>{{$alq->empresa}}</td>
                            <td>{{$alq->inicio}}</td>
                            <td>{{$alq->fin}}</td>
                        </tr>
                    @endif
                @endforeach
                
                
            </tbody>
        </table> 
    <div>

@endsection