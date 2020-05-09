@extends('layouts.app')

@section('content')


    <div class='alq_contenedor'>
        
        <button id="tra_btn_nuevo_trabajador" class="uk-button uk-button-primary uk-button-small"><a href="{{url('/clientes/create')}}">CREAR NUEVO CLIENTE</a></button>
        
        <table id="tra_tabla_id" class="display">
            <thead >
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Fecha de nacimiento</th>
                    <th>Fecha de alta</th>
                    <th>Nº Teléfono</th>
                    <th>E-mail</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                   
                   
                </tr>
            </thead>
            <tbody>

                @foreach($trabajadores as $trabajador)
                    <tr data-tra_id="{{$trabajador->id}}">
                        <td>{{$trabajador->id}}</td>
                        <td>{{$trabajador->tra_nombre_trabajador}} {{$trabajador->tra_apellido_1}} {{$trabajador->tra_apellido_2}}</td>
                        <td>{{$trabajador->tra_dni}}</td>
                        <td>{{$trabajador->tra_fecha_nacimiento}}</td>
                        <td>{{$trabajador->tra_fecha_alta}}</td>
                        <td>{{$trabajador->tra_telefono}}</td>
                        <td>{{$trabajador->tra_email}}</td>
                        <td>Editar</td>
                        <td>Borrar</td>
                        
                @endforeach
                
                
            </tbody>
            <tfoot></tfoot>
        </table> 
    <div>


@endsection