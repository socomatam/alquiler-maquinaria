@extends('layouts.app')

@section('content')







<h2 class="uk-heading-divider">Listado maquinas
     <span style="float:right;">
            
            <span class="uk-label uk-label-success">DISPONIBLE</span>
            <span style="background-color:lightgray;"  class="uk-label">ALQUILADA</span>
            <span class="uk-label uk-label-danger">INCIDENCIA</span>
        </span>


</h2>

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

<button id="cli_btn_nuevo_cliente" class="uk-button uk-button-primary uk-button-medium"><a href="{{url('/maquinas/create')}}">CREAR NUEVA MÁQUINA</a></button>

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
            <th>Localización</th>
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
            @elseif($maquina->maq_estado == 'Avería')
                <tr data-id="{{$maquina->id}}" id="alq_incidencia">
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
                    <td  class="centrar_celda"><a href="{{url('/maquinas')}}/{{$maquina->id}}" uk-icon="icon: location"></a></td>
                    @if($maquina->maq_estado == 'Alquilada')
                        <td  class="maq_editar centrar_celda"><a href="#" uk-icon="icon: file-edit"></a></td>
                    @elseif($maquina->maq_estado == 'Avería')
                        <td  class="maq_editar centrar_celda"><a href="#" uk-icon="icon: file-edit"></a></td>
                    @elseif($maquina->maq_estado == 'Libre')
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
            <th>Localización</th>
            <th>Editar</th>
            @if (Auth::user()->rol == 'admin')
                <th>Borrar</th>
            @endif
    
    </tfoot>
</table>



   

<div id="modal-container" class="uk-modal-container" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">Headline</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</div>




    <div id="modal_editar_estado_maquina" uk-modal="bg-close:false;">
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">Editar estado de la máquina</h2>
            <div>
                <label class="uk-form-label" for="">Estado de la máquina</label>
                <br>
                <select id="val_estado" class="uk-select" name="nombre_empresa">
                 
                    <option value="Avería">Avería</option>
                    <option value="Alquilada">Alquilada</option>
                    
                </select>
            </div>



            <br>
            <p class="uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
                <button id="btn_moda_editar_estado_maquina" class="uk-button uk-button-primary " type="button">Guardar</button>
            </p>
        </div>
    </div>










<style>
    .menu_maq{
        color: #1da1f2 !important;
    }
</style>

@endsection
