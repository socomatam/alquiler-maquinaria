@extends('layouts.app')

@section('content')
     <h2 class="uk-heading-divider">Listado trabajadores</h2>

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
        
        <button id="cli_btn_nuevo_cliente" class="uk-button uk-button-primary uk-button-medium"><a href="{{url('/trabajadores/create')}}">CREAR NUEVO TRABAJADOR</a></button>
        
        <table id="tra_tabla_id" class="display">
            <thead >
                <tr>
                    <th class="centrar_celda">ID</th>
                    <th class="centrar_celda">Nombre</th>
                    <th class="centrar_celda">DNI</th>
                    <th class="centrar_celda">Fecha de nacimiento</th>
                    <th class="centrar_celda">Fecha de alta</th>
                    <th class="centrar_celda">Nº Teléfono</th>
                    <th class="centrar_celda">E-mail</th>
                    <th class="centrar_celda">Editar</th>
                    <th class="centrar_celda">Borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trabajadores as $trabajador)
                    <tr data-id="{{$trabajador->id}}">
                        <td>{{$trabajador->id}}</td>
                        <td>{{$trabajador->tra_nombre_trabajador}} {{$trabajador->tra_apellido_1}} {{$trabajador->tra_apellido_2}}</td>
                        <td>{{$trabajador->tra_dni}}</td>
                        <td>{{$trabajador->tra_fecha_nacimiento}}</td>
                        <td>{{$trabajador->tra_fecha_alta}}</td>
                        <td>{{$trabajador->tra_telefono}}</td>
                        <td>{{$trabajador->tra_email}}</td>
                        <td class="centrar_celda"><a  href="{{url('/trabajadores')}}/{{$trabajador->id}}/edit"  uk-icon="icon: file-edit"></a></td>
                        <td class="centrar_celda"><a class="borrar_trabajador" uk-icon="icon: trash"></a></td>
                @endforeach
            </tbody>
           
        </table> 

        
<style>
    .menu_tra{
        color: #1da1f2 !important;
    }
</style>
@endsection