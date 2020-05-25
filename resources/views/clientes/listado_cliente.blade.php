@extends('layouts.app')

@section('content')



<h2 class="uk-heading-divider">Listado clientes</h2>

@if(Session::has('finalizar_registro'))
<div class="ui success message">
    <i class="close icon"></i>
    <div class="uk-alert-success" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>{{Session::get('finalizar_registro')}}</p>
    </div>

</div>
@endif

@if(Session::has('editar_registro'))
<div class="ui success message">
    <i class="close icon"></i>
    <div class="uk-alert-success" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>{{Session::get('editar_registro')}}</p>
    </div>

</div>
@endif


<button id="cli_btn_nuevo_cliente" class="uk-button uk-button-primary uk-button-small"><a href="{{url('/clientes/create')}}">CREAR NUEVO CLIENTE</a></button>

<table id="cli_tabla_id" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th class="centrar_celda">Nombre de la empresa</th>
            <th class="centrar_celda">NIF</th>
            <th class="centrar_celda">Contacto</th>
            <th class="centrar_celda">Teléfono</th>
            <th class="centrar_celda">E-mail</th>
            <th class="centrar_celda">Dirección</th>
            <th class="centrar_celda">Editar</th>
            @if (Auth::user()->rol == 'admin')
                <th class="centrar_celda">Borrar</th>
            @endif
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
            <td class="centrar_celda"><a href="{{url('/clientes')}}/{{$cli->id}}/edit" uk-icon="icon: file-edit"></a></td>
            @if (Auth::user()->rol == 'admin')
                <td class="centrar_celda"><a class="borrar_cliente" uk-icon="icon: trash"></a></td>
            @endif
            @endforeach


    </tbody>
    <tfoot>
         <th>ID</th>
            <th class="centrar_celda">Nombre de la empresa</th>
            <th class="centrar_celda">NIF</th>
            <th class="centrar_celda">Contacto</th>
            <th class="centrar_celda">Teléfono</th>
            <th class="centrar_celda">E-mail</th>
            <th class="centrar_celda">Dirección</th>
            <th class="centrar_celda">Editar</th>
            @if (Auth::user()->rol == 'admin')
                <th class="centrar_celda">Borrar</th>
            @endif
    
    
    </tfoot>
</table>
<style>
    .menu_cli{
        color: #1da1f2 !important;
    }
</style>

@endsection
