@extends('layouts.app')

@section('content')


    <div class='alq_contenedor'>
        
        <button id="cli_btn_nuevo_cliente" class="uk-button uk-button-primary uk-button-small"><a href="{{url('/alquiler/create')}}">CREAR NUEVO ALQUILER</a></button>
        
        <table id="cli_tabla_id" class="display">
            <thead >
                <tr>
                    <th>ID</th>
                    <th>NOMBRE EMPRESA</th>
                    <th>NIF</th>
                    <th>CONTACTO</th>
                    <th>TELÉFONO</th>
                    <th>EMAIL</th>
                    <th>DIRECCIÓN</th>
                    <th>EDITAR</th>
                    <th>VER</th>
                    <th>BORRAR</th>
                </tr>
            </thead>
            <tbody>

                @foreach($clientes as $cli)
                    <tr data-cli_id="{{$cli->id}}">
                        <td>{{$cli->id}}</td>
                        <td>{{$cli->cli_nombre_empresa}}</td>
                        <td>{{$cli->cli_nif}}</td>
                        <td>{{$cli->cli_nombre_contacto}}</td>
                        <td>{{$cli->cli_telefono}}</td>
                        <th>{{$cli->cli_email }}</th>
                        <th>{{$cli->cli_direccion}} </th>
                        <th>s </th>
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