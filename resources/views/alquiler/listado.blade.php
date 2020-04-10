@extends('layouts.app')

@section('content')

    <div class='alq_contenedor'>
        <table id="alq_tabla_id" class="display">
            <thead >
                <tr>
                    <th>ID</th>
                    <th>EMPRESA</th>
                    <th>INICIO ALQUILER</th>
                    <th>FIN ALQUILER</th>
                    <th>EMPLEADO</th>
                    <th>EDITAR</th>
                    <th>EDITAR</th>
                </tr>
            </thead>
            <tbody>

                @foreach($alquiler as $alq)
                    @if($alq->fin <= $fechaActual)
                        <tr id="alq_pasados">
                            <td>{{$alq->id_alquiler}}</td>
                            <td>{{$alq->empresa}}</td>
                            <td>{{$alq->inicio}}</td>
                            <td>{{$alq->fin}}</td>
                            <th>{{$alq->nombre_trabajador}} {{ $alq->apellido_trabajador_1}} {{ $alq->apellido_trabajador_2}} </th>
                            <td><li><a href="#" uk-icon="icon: file-edit"></a></li></td>
                            <td>HOLS</td>
                        </tr>
                    @else
                        <tr id="alq_vigente">
                            <td>{{$alq->id_alquiler}}</td>
                            <td>{{$alq->empresa}}</td>
                            <td>{{$alq->inicio}}</td>
                            <td>{{$alq->fin}}</td>
                            <th>{{$alq->nombre_trabajador}} {{ $alq->apellido_trabajador_1}} {{ $alq->apellido_trabajador_2}}</th>
                            <td><li><a href="#" uk-icon="icon: file-edit"></a></li></td>
                            <td>HOLS</td>
                        </tr>
                    @endif
                @endforeach
                
                
            </tbody>
        </table> 
    <div>

@endsection