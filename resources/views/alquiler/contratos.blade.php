@extends('layouts.app')

@section('content')


<div class='con_contenedor'>
        
        <button id="cli_btn_nuevo_cliente" class="uk-button uk-button-primary uk-button-small"><a href="{{url('/clientes/create')}}">CREAR NUEVO CLIENTE</a></button>
        
        <table id="cli_tabla_id" class="display">
            <thead >
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Tamaño</th>
                    <th>Peso</th>
                    <th>Traslacion</th>
                    <th>Precio contrato</th>
                    <th>Días</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    
               
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>

                @foreach($contratos as $contrato)
                    <tr data-con_id="{{$contrato->id}}">
                        <td>{{$contrato->id}}</td>
                        <td>{{$contrato->maq_categoria}}</td>
                        <td>{{$contrato->maq_tipo}}</td>
                        <td>{{$contrato->maq_marca}}</td>
                        <td>{{$contrato->maq_modelo}}</td>
                        <td>{{$contrato->maq_largo}} x {{$contrato->maq_ancho}} x {{$contrato->maq_alto}}</td>
                        <td>{{$contrato->maq_peso}}kg</td>
                        <td>{{$contrato->maq_traslacion}}kg</td>
                        <td>{{$contrato->dias * $contrato->maq_precio}}€</td>
                        <td>{{$contrato->dias}}</td>
                        <td>{{$contrato->fecha_inicio}}</td>
                        <td>{{$contrato->fecha_final}}</td>


                        <th>Editar</th>
                        <th>Borrar</th>
                        
                @endforeach
                
                
            </tbody>
            <tfoot></tfoot>
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