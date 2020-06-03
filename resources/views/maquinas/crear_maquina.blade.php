@extends('layouts.app')
@section('content')

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


<form class="formularios" method="POST" action="{{url('/maquinas')}}" enctype="multipart/form-data" class="uk-form-stacked">
    @csrf

    <div uk-grid>
        <div class="uk-width-1-3">
            <label class="uk-form-label" for="maq_marca">MARCA</label>
            <br>
            <select class="uk-select" name="marca">
                <option selected></option>
                @foreach($marcas as $marca)
                    
                    <option value="{{$marca->mar_marca}}">{{$marca->mar_marca}}</option>
                @endforeach
            </select>
        </div>
        <div class="uk-width-1-3">
            <label class="uk-form-label" for="maq_modelo">MODELO</label>
            <br>
            <select class="uk-select" name="modelo">
                <option selected></option>
                @foreach($modelos as $modelo)
                    <option value="{{$modelo->mod_modelo}}">{{$modelo->mod_modelo}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>

    <div uk-grid>
        <div class="uk-width-1-3">
            <label class="uk-form-label" for="maq_marca">CATEGORIA</label>
            <br>
            <select class="uk-select" name="categoria">
                <option selected></option>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->cat_categoria}}">{{$categoria->cat_categoria}}</option>
                @endforeach
            </select>
        </div>
        <div class="uk-width-1-3">
            <label class="uk-form-label" for="maq_modelo">TIPO</label>
            <br>
            <select class="uk-select" name="tipo">
                <option selected></option>
                @foreach($tipos as $tipo)
                    <option value="{{$tipo->tip_tipo}}">{{$tipo->tip_tipo}}</option>
                @endforeach
            </select>
        </div>
        <div class="uk-width-1-3">
            <label class="uk-form-label" for="maq_modelo">TRASLACIÓN</label>
            <br>
            <select class="uk-select" name="desplazamiento">
                <option selected></option>
                @foreach($desplazamientos as $desplazamiento)
                    <option value="{{$desplazamiento->des_desplazamiento}}">{{$desplazamiento->des_desplazamiento}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>


    <div class="uk-width-1-5@m">
        <label class="uk-form-label" for="maq_peso">PESO (kg)</label>
        <input class="uk-input" id="maq_peso" name="peso" type="number" step=".01" pattern="^[0-9]+" required value={{old("peso")}}>
    </div>
    <br>
    <div uk-grid>
        <div class="uk-width-1-4@m">
            <label class="uk-form-label" for="maq_largo">LARGO (metros)</label>
            <input class="uk-input" id="maq_largo" name="largo" type="number" step=".01" value={{old("largo")}}>
        </div>
        <div class="uk-width-1-4@m">
            <label class="uk-form-label" for="maq_ancho">ANCHO (metros)</label>
            <input class="uk-input" id="maq_ancho" name="ancho" type="number" step=".01" value={{old("ancho")}}>
        </div>
        <div class="uk-width-1-4@m">
            <label class="uk-form-label" for="maq_alto">ALTO (metros)</label>
            <input class="uk-input" id="maq_alto" name="alto" type="number" step=".01" value={{old("alto")}}>
        </div>
    </div>
    <br>

    <label class="uk-form-label" for="maq_precio">PRECIO DE ALQUILER POR DÍA</label>
    <div class="uk-width-1-5@m">
        <input class="uk-input" id="maq_peso" name="precio" type="number" step=".01" value={{old("precio")}}>
    </div>
    <br>


    <div class="uk-width-1-1@m uk-margin" uk-margin>
        <label class="uk-form-label" for="maq_imagen">IMAGEN</label>
        <div class="uk-margin" uk-margin>
            <div uk-form-custom="target: true">
                <input type="file" name="file" required>
                <input class="uk-input uk-form-width-medium" type="text" placeholder="Examinar" disabled>
            </div>

        </div>

    </div>





    <button class="uk-button uk-button-primary">CREAR MÁQUINA</button>
    <button id='btn_limpiar' class="uk-button uk-button-default">LIMPIAR FORMULARIO</button>
</form>

<style>
    .menu_maq {
        color: #1da1f2 !important;
    }

</style>


@endsection
