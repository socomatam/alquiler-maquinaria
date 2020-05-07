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
    
        <div class="contenedor_maquinas">

        </div>
        <br>
       
        <div class="uk-width-1-2">    
        <button class="uk-button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #modal_crear_maquina">AÑADIR MÁQUINA</button>

        </div>
        <br>


        <div class="uk-width-1-2">    
            <label class="uk-form-label" for="nombre_empleado">NOMBRE DE TRABAJADOR</label>
            <input class="uk-input" id="nombre_empleado" name="nombre_empleado" type="text" value="{{$empleado->tra_nombre_trabajador}} {{$empleado->tra_apellido_1}} {{$empleado->tra_apellido_2}}" readonly >
        </div>
        <br>

       

        <button  class="uk-button uk-button-primary">CREAR ALQUILER</button>
        <button id='btn_limpiar' class="uk-button uk-button-default">LIMPIAR FORMULARIO</button>

    </form>



 
    <div id="modal_crear_maquina" id="modal-container" class="uk-modal-container" uk-modal="bg-close:false;">
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">AÑADA UNA MÁQUINA AL ALQUILER</h2>

            <div>    
                <label class="uk-form-label" for="">MÁQUINA</label>
                <br>
                <select id="val_maquina" class="uk-select" name="nombre_empresa">
                    @foreach($maquinas as $maquina)
                        <option value="{{$maquina->id}}">
                            {{$maquina->maq_categoria}} | 
                            {{$maquina->maq_tipo}} |
                            {{$maquina->maq_peso}}kg | 
                            ({{$maquina->maq_dimension_largo}}cm x {{$maquina->maq_dimension_ancho}}cm x {{$maquina->maq_dimension_alto}}cm) |
                            {{$maquina->maq_marca}} |
                            {{$maquina->maq_modelo}} |
                            {{$maquina->maq_precio_dia}} |
                        </option>
                    @endforeach
                </select>
            </div>
            <br>
            
            <div class="uk-grid-small uk-child-width-expand@s" uk-grid>
                <div>
                    <label class="uk-form-label" for="from">DESDE</label>
                    <br>
                    <input class="uk-input uk-width-1-2" id="from" name=from type="text" >
                </div>
                <div>
                    <label class="uk-form-label" for="to">HASTA</label>
                    <br>
                    <input class="uk-input uk-width-1-2" id="to" name=to type="text" >
                </div>
            </div>
            <br>

            <div class="uk-margin">
                <label class="uk-form-label" for="to">DESCRIPCIÓN DEL TRABAJO</label>
                <br>
                <textarea id="alq_descripcion" name="descripcion" class="uk-textarea" rows="5" placeholder="Escriba la descripción"></textarea>
            </div>
            <br>

            <p class="uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
                <button id="guarda_maq" class="uk-button uk-button-primary uk-modal-close" type="button">Añadir</button>
            </p>
        </div>
    </div>






<script>
    function borrarMaquina(valor){
        $(`.caja${valor}`).remove();
    }//fin borrar máquina
</script>





@endsection

