@extends('layouts.app')

@section('content')




<button id="cli_btn_nuevo_cliente" class="uk-button uk-button-primary uk-button-small"><a href="{{url('/clientes/create')}}">AÑADIR UN CONTRATO</a></button>

<table id="con_tabla_id" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Categoria</th>
            <th class="centrar_celda">Tipo</th>
            <th class="centrar_celda">Marca</th>
            <th class="centrar_celda">Modelo</th>
            <th class="centrar_celda">Tamaño</th>
            <th class="centrar_celda">Peso</th>
            <th>Traslacion</th>
            <th class="centrar_celda">Precio</th>
            <th>Días</th>
            <th class="centrar_celda">Inicio</th>
            <th class="centrar_celda">Fin</th>
            <th>Estado</th>


            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>


            

        @foreach($contratos as $contrato)

            @if($contrato->incidencia == 'Con incidencias')
                <tr id="alq_incidencia"  data-con_id="{{$contrato->id}}" >
            @else
                 <tr data-con_id="{{$contrato->id}}">
            @endif
           
            <td >{{$contrato->id}}</td>
            <td>{{$contrato->maq_categoria}}</td>
            <td>{{$contrato->maq_tipo}}</td>
            <td>{{$contrato->maq_marca}}</td>
            <td>{{$contrato->maq_modelo}}</td>
            <td>{{$contrato->maq_largo}} x {{$contrato->maq_ancho}} x {{$contrato->maq_alto}}</td>
            <td>{{$contrato->maq_peso}}kg</td>
            <td>{{$contrato->maq_traslacion}}kg</td>
            <td>{{$contrato->dias * $contrato->maq_precio}}€</td>
            <td class="centrar_celda">{{$contrato->dias}}</td>
            <td>{{$contrato->fecha_inicio}}</td>
            <td>{{$contrato->fecha_final}}</td>
            <td>{{$contrato->maq_estado}}</td>


            <th class="centrar_celda"><a href="#" uk-icon="icon: file-edit"></a></th>
            <th class="centrar_celda">Borrar</th>

            @endforeach


    </tbody>
    <tfoot></tfoot>
</table>




<a class="uk-button uk-button-default" href="#modal-center" uk-toggle>Open</a>

<div id="modal-center" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="alq_lista_maquinas"></div>

    </div>
</div>


<style>
    .uk-nav-primary > li:nth-child(2) > a:nth-child(1){
        color: #1da1f2 !important;
    }
</style>

@endsection
