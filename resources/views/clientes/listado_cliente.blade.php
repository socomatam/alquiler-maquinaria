@extends('layouts.app')

@section('content')



    <h2 class="uk-heading-divider">Listado clientes</h2>

    @if(Session::has('finalizar_registro'))
    <div class="ui success message">
        <i class="close icon"></i>
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>Cliente creado con éxito.</p>
        </div>
        <p>{{Session::get('finalizar_registro')}}</p>
    </div>
    @endif

      @if(Session::has('editar_registro'))
    <div class="ui success message">
        <i class="close icon"></i>
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>Cliente editado con éxito.</p>
        </div>
        <p>{{Session::get('editar_registro')}}</p>
    </div>
    @endif


    <button id="cli_btn_nuevo_cliente" class="uk-button uk-button-primary uk-button-small"><a href="{{url('/clientes/create')}}">CREAR NUEVO CLIENTE</a></button>

    <table id="cli_tabla_id" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th class="centrar_celda">NOMBRE EMPRESA</th>
                <th class="centrar_celda">NIF</th>
                <th class="centrar_celda">CONTACTO</th>
                <th class="centrar_celda">TELÉFONO</th>
                <th class="centrar_celda">EMAIL</th>
                <th class="centrar_celda">DIRECCIÓN</th>
                <th class="centrar_celda">EDITAR</th>
              
                <th class="centrar_celda">BORRAR</th>
            </tr>
        </thead>
        <tbody>

            @foreach($clientes as $cli)
            <tr data-id="{{$cli->id}}">
                <td>{{$cli->id}}</td>
                <td>{{$cli->cli_nombre_empresa}}</td>
                <td>{{$cli->cli_nif}}</td>
                <td>{{$cli->cli_nombre_contacto}}</td>
                <td>{{$cli->cli_telefono}}</td>
                <td>{{$cli->cli_email }}</td>
                <td>{{$cli->cli_direccion}} </td>
                <td class="centrar_celda"><a  href="{{url('/clientes')}}/{{$cli->id}}/edit"  uk-icon="icon: file-edit"></a></td>
                <td class="centrar_celda"><a class="borrar_cliente" uk-icon="icon: trash"></a></td>

                @endforeach


        </tbody>
        <tfoot></tfoot>
    </table>
    

     @endsection
