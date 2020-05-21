@extends('layouts.app')

@section('content')


<h2 class="uk-heading-divider">Listado maquinas</h2>

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
            <td class="centrar_celda"><a href="{{url('/maquinas')}}/{{$maquina->id}}/edit" uk-icon="icon: file-edit"></a></td>
            <td class="centrar_celda"><a class="borrar_maquina" uk-icon="icon: trash"></a></td>
        </tr>
        @endforeach


    </tbody>
    <tfoot></tfoot>
</table>

<style>
    .uk-parent > a:nth-child(1) {
        color: #1da1f2 !important;
    }

    .uk-nav-sub > li:nth-child(1) > a:nth-child(1){
         color: #1da1f2 !important;
    }
    </style>


@endsection
