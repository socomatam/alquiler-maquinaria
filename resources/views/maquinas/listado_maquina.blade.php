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
            @if (Auth::user()->rol == 'admin')
                <th>Borrar</th>
            @endif
        </tr>
    </thead>
    <tbody>

        @foreach($maquinas as $maquina)
            @if($maquina->maq_estado == 'Alquilada')
                <tr data-id="{{$maquina->id}}" id="alq_pasados">
            @elseif($maquina->maq_estado == 'Libre')
                 <tr data-id="{{$maquina->id}}" id="alq_vigente">
            @endif

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

                    @if($maquina->maq_estado == 'Alquilada')
                        <td class="centrar_celda"><a href="#"></a></td>
                    @else
                        <td class="centrar_celda"><a href="{{url('/maquinas')}}/{{$maquina->id}}/edit" uk-icon="icon: file-edit"></a></td>
                    @endif    
                    @if (Auth::user()->rol == 'admin')
                        <td class="centrar_celda"><a class="borrar_maquina" uk-icon="icon: trash"></a></td>
                    @endif    
                </tr>
        @endforeach


    </tbody>
    <tfoot>
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
            @if (Auth::user()->rol == 'admin')
                <th>Borrar</th>
            @endif
    
    </tfoot>
</table>




    <div id="modal_editar_nombre_empresa" uk-modal="bg-close:false;">
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">Editar nombre de empresa</h2>
            <div>
                <label class="uk-form-label" for="">NOMBRE DE LA EMPRESA</label>
                <br>
                <select id="val_empresa" class="uk-select" name="nombre_empresa">
                    @foreach($maquinas as $maquina)
                    <option value="{{$maquina->id}}">{{$maquina->id}}</option>
                    @endforeach
                </select>
            </div>



            <br>
            <p class="uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
                <button id="btn_moda_edit_cliente" class="uk-button uk-button-primary " type="button">Guardar</button>
            </p>
        </div>
    </div>











<style>
    .uk-parent > a:nth-child(1) {
        color: #1da1f2 !important;
    }

    .uk-nav-sub > li:nth-child(1) > a:nth-child(1){
         color: #1da1f2 !important;
    }
    </style>


@endsection
