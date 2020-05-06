@extends('layouts.app')

@section('content')

    <form class="formularios uk-form-stacked" method="POST" action="{{url('/alquiler')}}" class="uk-form-stacked">
        @csrf

        <input id="invisible_id" name="contador" type="hidden" value="">
        <div>    
            <label class="uk-form-label" for="">NOMBRE DE LA EMPRESA</label>
            <select id="cli_select" class="uk-select" name="nombre_empresa">
                @foreach($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->cli_nombre_empresa}}</option>
                @endforeach
            </select>
        </div>
        <br>

        <div class="uk-grid-small uk-child-width-expand@s" uk-grid>
            <div>
                <label class="uk-form-label" for="from">DESDE</label>
                <input class="uk-input uk-width-1-2" id="from" name=from type="text" >
            </div>
            <div>
                <label class="uk-form-label" for="to">HASTA</label>
                <input class="uk-input uk-width-1-2" id="to" name=to type="text" >
            </div>
        </div>
        <br>

        <div class="contenedor_maquinas">

        </div>
        <br>
       
        <div class="uk-width-1-2">    
        <button class="uk-button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #modal_crear_maquina">AÑADIR MÁQUINA</button>

        </div>
        <br>


        <div class="uk-width-1-2">    
            <label class="uk-form-label" for="nombre_empleado">NOMBRE DE TRABAJADOR</label>
            <input class="uk-input" id="nombre_empleado" name="nombre_empleado" type="text" value="{{$empleado->tra_nombre_trabajador}} {{$empleado->tra_apellido_1}} {{$empleado->tra_apellido_2}}" >
        </div>
        <br>

       

        <button  class="uk-button uk-button-primary">CREAR ALQUILER</button>
        <button id='btn_limpiar' class="uk-button uk-button-default">LIMPIAR FORMULARIO</button>

    </form>



 
    <div id="modal_crear_maquina" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">Headline</h2>

            <div>    
                <label class="uk-form-label" for="">MÁQUINA</label>
                <select id="val_maquina" class="uk-select" name="nombre_empresa">
                    @foreach($maquinas as $maquina)
                        <option value="{{$maquina->id}}">{{$maquina->maq_marca}}</option>
                    @endforeach
                </select>
            </div>
            <br>

            <p class="uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
                <button id="guarda_maq" class="uk-button uk-button-primary uk-modal-close" type="button">Añadir</button>
            </p>
        </div>
    </div>












@endsection

