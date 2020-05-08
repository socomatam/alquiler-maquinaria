@extends('layouts.app')

@section('content')


<div class='con_contenedor'>
        
        <button id="cli_btn_nuevo_cliente" class="uk-button uk-button-primary uk-button-small"><a href="{{url('/clientes/create')}}">CREAR NUEVO CLIENTE</a></button>
        
        <table id="cli_tabla_id" class="display">
            <thead >
                <tr>
                    <th>ID</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de finalización</th>
                    <th>Precio por día</th>
                    <th>Descripción</th>
                    <th>Máquina</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>

                @foreach($contratos as $contrato)
                    <tr data-cli_id="{{$contrato->id}}">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th></th>
                        <th></th>
                        <th>s </th>
                        <th>s </th>
                        
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