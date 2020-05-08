@extends('layouts.app')

@section('content')


    <div class='alq_contenedor'>
        
        <button id="alq_btn_nuevo_alquiler" class="uk-button uk-button-primary uk-button-small"><a href="{{url('/alquiler/create')}}">CREAR NUEVO ALQUILER</a></button>
        

            <table id="alq_tabla_id" class="display">
                <thead >
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE EMPRESA</th>
                        <th>Inicio</th>
                        <th>Final</th>
                        <th>Días</th>
                        <th>Empleados</th>
                        <th>Contratos</th>
                        <th>Editar</th>
                        <th>Detalles</th>
                        <th>Incidencias</th>
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
                            <th>{{$alq->dias }}</th>
                            <th>{{$alq->nombre_trabajador}} {{ $alq->apellido_trabajador_1}} {{ $alq->apellido_trabajador_2}} </th>
                            <th><a href="{{url('/alquiler')}}/{{$alq->id_alquiler}}"> ver</a> </th>
                            <td><li><a href="#" uk-icon="icon: file-edit"></a></li></td>
                            <th><span uk-icon="icon: info"></span></th>
                            <th><span uk-icon="icon: plus-circle"></span>{{$alq->incidencia}}</th>
                        </tr>  
                    @endforeach
                    
                    
                </tbody>
                
            </table> 
    <div>

    

    <a class="uk-button uk-button-default" href="#modal-center" uk-toggle>Open</a>

<div id="modal-center" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="alq_lista_maquinas"></div>

    </div>
</div>

@endsection