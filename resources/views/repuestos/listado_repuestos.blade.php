@extends('layouts.app')

@section('content')


    
        
        <button id="cli_btn_nuevo_cliente" class="uk-button uk-button-primary uk-button-small"><a href="{{url('/clientes/create')}}">CREAR NUEVO TRABAJADOR</a></button>
        
        <table id="tra_tabla_id" class="display">
            <thead >
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Tipo</th>
                    <th>Repuesto</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>

                @foreach($repuestos as $repuesto)
                    <tr data-rep_id="{{$repuesto->id}}">
                        <td>{{$repuesto->id}}</td>
                        <td>{{$repuesto->rep_categoria}}</td>
                        <td>{{$repuesto->rep_tipo}}</td>
                        <td>{{$repuesto->rep_repuesto}}</td>
                        <td>{{$repuesto->rep_estado}}</td>
                        <td>Editar</td>
                        <td>Borrar</td>
                        
                @endforeach
                
                
            </tbody>
            <tfoot></tfoot>
        </table> 
   


@endsection