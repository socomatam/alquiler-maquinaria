@extends('layouts.app')

@section('content')




<button id="cli_btn_nuevo_cliente" class="uk-button uk-button-primary uk-button-small"><a href="{{url('/maquinas/create')}}">CREAR NUEVA MÁQUINA</a></button>

<table id="maq_tabla_id" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Categoría</th>
            <th>Tipo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Traslación</th>
            <th>Peso</th>
            <th>Ancho</th>
            <th>Largo</th>
            <th>Alto</th>
            <th>Precio día</th>
            <th>Estado</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>

        @foreach($maquinas as $maquina)
        <tr data-cli_id="{{$maquina->id}}">
            <td>{{$maquina->id}}</td>
            <td>{{$maquina->maq_categoria}}</td>
            <td>{{$maquina->maq_tipo}}</td>
            <td>{{$maquina->maq_marca}}</td>
            <td>{{$maquina->maq_modelo}}</td>
            <td>{{$maquina->maq_traslacion}}</td>
            <td>{{$maquina->maq_peso}}</td>
            <td>{{$maquina->maq_dimension_ancho}}</td>
            <td>{{$maquina->maq_dimension_largo}}</td>
            <td>{{$maquina->maq_dimension_alto}}</td>
            <td>{{$maquina->maq_precio_dia}}</td>
            <td>{{$maquina->maq_estado}}</td>
            <td>Editar</td>
            <td>Borrarr</td>
        </tr>
        @endforeach


    </tbody>
    <tfoot></tfoot>
</table>




@endsection
