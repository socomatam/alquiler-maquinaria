@extends('layouts.app')
@section('content')

    <h2 class="uk-heading-divider">EDITAR CLIENTE</h2>


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
    
   



    <form class="formularios" method="POST" action="{{url('/clientes')}}/{{$cliente->id}}" class="uk-form-stacked">
        @csrf

        <input name="_method" type="hidden" value="PUT">
        <div class="uk-width-1-1@m">
            <label class="uk-form-label" for="cli_nombre">NOMBRE DE LA EMPRESA</label>
            <input class="uk-input" id="cli_nombre" name="cli_nombre_empresa" type="text" required value={{$cliente->cli_nombre_empresa}} >    
        </div>
        <br>

        <div class="uk-width-1-3@m">
            <label class="uk-form-label" for="cli_nif">Nº NIF</label>
            <input class="uk-input " id="cli_nif" name=cli_nif type="text" required value={{$cliente->cli_nif}} >
        </div>
        <br>

        <div uk-grid>
            <div class="uk-width-1-3">
                <label class="uk-form-label" for="cli_telefono">Nº TELÉFONO</label>
                <input class="uk-input" id="cli_telefono" name=cli_telefono type="text" required value={{$cliente->cli_telefono}}  >
            </div>
            <div class="uk-width-expand@m">
                <label class="uk-form-label" for="cli_email">EMAIL</label>
                <input class="uk-input" id="cli_email" name=cli_email type="text" value={{$cliente->cli_email}} >
            </div>
        </div>
        <br>
        <div class="uk-width-1-1@m">
            <label class="uk-form-label" for="cli_direccion">DIRECCIÓN DE LA EMPRESA</label>
            <input class="uk-input" id="cli_direccion" name="cli_direccion" type="text" value={{$cliente->cli_direccion}} >    
        </div>
        <br>
        <div uk-grid>
            <div class="uk-width-1-3">
                <label class="uk-form-label" for="cli_pais">PAÍS</label>
                <input class="uk-input" id="cli_pais" name=cli_pais type="text" required value={{$cliente->cli_pais}}  >
            </div>
            <div class="uk-width-1-3@m">
                <label class="uk-form-label" for="cli_ciudad">CIUDAD</label>
                <input class="uk-input" id="cli_email" name=cli_ciudad type="text" value={{$cliente->cli_ciudad}} >
            </div>
        </div>
        <br>
        <div class="uk-width-1-1@m">
            <label class="uk-form-label" for="cli_nombre_contacto">NOMBRE CONTACTO DE LA EMPRESA</label>
            <input class="uk-input" id="cli_nombre_contacto" name="cli_nombre_contacto" type="text" required value={{$cliente->cli_nombre_contacto}} >    
        </div>
        <br>
       



        <button  class="uk-button uk-button-primary">EDITAR CLIENTE</button>
        <button id='btn_limpiar' class="uk-button uk-button-default">LIMPIAR FORMULARIO</button>
    </form>

   <style>
    .menu_cli{
        color: #1da1f2 !important;
    }
</style>


@endsection

