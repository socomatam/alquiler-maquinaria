@extends('layouts.app')

@section('content')


    <div class='alq_contenedor'>
        
        <button id="alq_btn_nuevo_alquiler" class="uk-button uk-button-primary uk-button-small"><a href="{{url('/alquiler/create')}}">CREAR NUEVO ALQUILER</a></button>
        

            <table id="alq_tabla_id" class="display">
                <thead >
                    <tr>
                        <th>ID</th>
                        <th class="centrar_celda">NOMBRE EMPRESA</th>
                        <th class="centrar_celda">Inicio</th>
                        <th class="centrar_celda">Final</th>
                        <th>Días</th>
                        <th class="centrar_celda">Empleados</th>
                        <th>Contratos</th>
                        <th>Editar</th>
                        <th>Detalles</th>
                        <th class="centrar_celda">Incidencias</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($alquiler as $alq)
                        @if($alq->fin <= $fechaActual)
                            <tr data-alq_id="{{$alq->id_alquiler}}" id="alq_pasados">
                        @elseif($alq->incidencia == "Con incidencias")
                            <tr data-alq_id="{{$alq->id_alquiler}}" id="alq_incidencia">
                        @elseif($alq->fin > $fechaActual)
                            <tr data-alq_id="{{$alq->id_alquiler}}" id="alq_vigente">
                        @endif
                            <td>{{$alq->id_alquiler}}</td>
                            <td>{{$alq->empresa}}</td>
                            <td>{{$alq->inicio}}</td>
                            <td>{{$alq->fin}}</td>
                            <td class="centrar_celda">{{$alq->dias }}</td>
                            <td>{{$alq->nombre_trabajador}} {{ $alq->apellido_trabajador_1}} {{ $alq->apellido_trabajador_2}} </td>
                            <td class="centrar_celda"><a href="{{url('/alquiler')}}/{{$alq->id_alquiler}}" uk-icon="icon: plus-circle"></a></a> </td>
                            <td class="centrar_celda"><a href="#" uk-icon="icon: file-edit"></a></td>
                            <td class="centrar_celda"><span uk-icon="icon: info"></span></td>
                            <td>{{$alq->incidencia}}</td>
                        </tr>  
                    @endforeach
                    
                    
                </tbody>
                
            </table> 
    <div>

@endsection