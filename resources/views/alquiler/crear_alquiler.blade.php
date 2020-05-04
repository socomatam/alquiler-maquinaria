@extends('layouts.app')

@section('content')

    <form class="formularios uk-form-stacked" method="POST" action="{{url('/alquiler')}}" class="uk-form-stacked">
        @csrf
        <div>    
            <label class="uk-form-label" for="">NOMBRE DE LA EMPRESA</label>
            <select id="cli_select" class="js-example-basic-multiple uk-select" name="nombre_empresa" multiple="multiple">
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

        <div>    
            <label class="uk-form-label" for="form-stacked-text">MÁQUINA/S</label>
            <select id="cli_selec" class="js-example-basic-multiple uk-select" name="maquinas" multiple="multiple">
                @foreach($maquinas as $maquina)
                    <option value="{{$maquina->id}}">{{$maquina->maq_marca}}</option>
                @endforeach
            </select>
        </div>
        <br>

       

        <button  class="uk-button uk-button-primary">CREAR ALQUILER</button>
        <button id='btn_limpiar' class="uk-button uk-button-default">LIMPIAR FORMULARIO</button>

    </form>







    










@endsection