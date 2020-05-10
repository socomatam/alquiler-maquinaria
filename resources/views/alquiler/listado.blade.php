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
                        <th>Precio total</th>
                        <th class="centrar_celda">Empleados</th>
                        <th>Contratos</th>
                        <th>Editar</th>
                        <th>Borrar</th>
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
                            <td class="centrar_celda">{{$alq->alq_precio }}</td>
                            <td>{{$alq->nombre_trabajador}} {{ $alq->apellido_trabajador_1}} {{ $alq->apellido_trabajador_2}} </td>
                            <td class="centrar_celda"><a href="{{url('/alquiler')}}/{{$alq->id_alquiler}}" uk-icon="icon: plus-circle"></a></a> </td>
                            <td class="centrar_celda"><a href="#" uk-icon="icon: file-edit" uk-toggle="target: #modal_editar_nombre_empresa"></a></td>
                            <td class="centrar_celda"><a uk-icon="icon: trash"></a></td>
                            <td>{{$alq->incidencia}}</td>
                        </tr>  
                    @endforeach
                    
                    
                </tbody>
                
            </table> 
    <div>

    <div id="modal_editar_nombre_empresa"  uk-modal="bg-close:false;">
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Editar nombre de empresa</h2>
        <div>    
            <label class="uk-form-label" for="">NOMBRE DE LA EMPRESA</label>
            <select id="cli_select" class="uk-select" name="nombre_empresa">
                @foreach($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->cli_nombre_empresa}}</option>
                @endforeach
            </select>
        </div>

        <br>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
            <button id="btn_moda_edit_cliente" class="uk-button uk-button-primary uk-modal-close" type="button">Guardar</button>
        </p>
    </div>
</div>

@endsection