@extends('layouts.app')

@section('content')

<div class='alq_contenedor'>

    <div>
    <h2 class="uk-heading-divider">Añadir nueva máquina</h2>


    @if (count($errors) > 0)
    <div class="ui negative message">
        <i class="close icon"></i>
        <div class="header">
            <ul>
                @foreach ($errors->all() as $error)
                <span class="uk-label uk-label-danger">{{ $error }}</span>
                <br>

                @endforeach
            </ul>
        </div>
    </div>
    @endif

    @if(Session::has('continuar_alquiler'))
    <div class="ui success message">
        <i class="close icon"></i>
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>Contrato añadida al alquiler.</p>
            <p>Añada otro contrato o finalice el alquiler</p>
        </div>
        
    </div>
    @endif


    <form id="alq_formulario" class="formularios uk-form-stacked" method="POST" action="{{url('/alquiler')}}" class="uk-form-stacked">

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

        @if($nuevo == true)
        <input class="uk-input uk-width-1-2" name="nuevo" value="nuevo" type="hidden">
        @elseif($nuevo == false)
        <input class="uk-input uk-width-1-2" name="nuevo" value="viejo" type="hidden">
        @endif



        <div>
            <label class="uk-form-label" for="">MÁQUINA</label>
            <select class="alq_cre_letra" id="val_aquina" class="uk-select" name="id_maquina">
                @foreach($maquinas as $maquina)
                <option value="{{$maquina->id}}">
                    {{$maquina->maq_categoria}} -
                    {{$maquina->maq_tipo}} -
                    {{$maquina->maq_peso}}kg -
                    ({{$maquina->maq_dimension_largo}}cm x {{$maquina->maq_dimension_ancho}}cm x {{$maquina->maq_dimension_alto}}cm) -
                    {{$maquina->maq_marca}} -
                    {{$maquina->maq_modelo}} -
                    {{$maquina->maq_precio_dia}}
                </option>
                @endforeach
            </select>
        </div>
        <br>

        <div class="uk-grid-small uk-child-width-expand@s" uk-grid>
            <div>
                <label class="uk-form-label" for="from">DESDE</label>
                <input class="uk-input uk-width-1-2" id="from" name=from type="text" required>
            </div>
            <div>
                <label class="uk-form-label" for="to">HASTA</label>
                <input class="uk-input uk-width-1-2" id="to" name=to type="text" required>
            </div>
        </div>
        <br>
        <label class="uk-form-label" for="to">SELECCIONES COMPLEMENTOS</label>
        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid ">

            <div class="alq_caja_de_complementos">
                @foreach($complementos as $complemento)
                <div>
                    <label>
                        <input class="uk-checkbox" name="complementos[]" type="checkbox" value="{{$complemento->id}}"> {{$complemento->com_complemento}}
                    </label>
                </div>
                @endforeach
            </div>

        </div>
        <br>
        <div class="uk-margin">
            <label class="uk-form-label" for="to">DESCRIPCIÓN DEL TRABAJO</label>
            <textarea id="alq_descripcion" name="descripcion" class="uk-textarea" rows="5" placeholder="Escriba la descripción"></textarea>
        </div>



        <div class="uk-width-1-2">
            <label class="uk-form-label" for="nombre_empleado">NOMBRE DE TRABAJADOR</label>
            <input class="uk-input" id="nombre_empleado" name="nombre_empleado" type="text" value="{{$empleado->tra_nombre_trabajador}} {{$empleado->tra_apellido_1}} {{$empleado->tra_apellido_2}}" readonly>
        </div>
        <br>



        <button  class="uk-button enviar uk-button-primary">Añadir contrato a alquiler</button>

        <a class="uk-button uk-button-default" href="{{url('/alquiler')}}">FINALIZAR ALQUILER</a>
    </form>
    </div>

    <div class="btn_cancelar">
     @if($nuevo == false && isset($idalquiler))
        <form class="form_cancelar uk-form-stacked" method="POST" action="{{url('/contratos')}}/{{$idalquiler}}" class="uk-form-stacked">
        @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="uk-button uk-button-danger alq_cancelar">Cancelar alquiler</button>
        </form>
    @endif
    </div>
</div>

<style>
    .menu_alq{
        color: #1da1f2 !important;
    }

    .alq_contenedor{
        display: flex;
    }

    .btn_cancelar{
        align-self: flex-end;
    }
</style>





@endsection
