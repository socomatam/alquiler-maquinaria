@extends('layouts.app')
@section('content')
    <form method="POST" action="{{url('/clientes')}}" class="uk-form-stacked">
        @csrf
        <div class="uk-width-1-1@m">
            <label class="uk-form-label" for="cli_nombre">NOMBRE DE LA EMPRESA</label>
            <input class="uk-input" id="cli_nombre" name="cli_nombre_empresa" type="text" required value={{old('cli_nombre')}} >    
        </div>
        <br>

        <div class="uk-width-1-3@m">
            <label class="uk-form-label" for="cli_nif">Nº NIF</label>
            <input class="uk-input " id="cli_nif" name=cli_nif type="text" required value={{old('cli_nif')}} >
        </div>
        <br>

        <div uk-grid>
            <div class="uk-width-1-3">
                <label class="uk-form-label" for="cli_telefono">Nº TELÉFONO</label>
                <input class="uk-input" id="cli_telefono" name=cli_telefono type="text" required value={{old('cli_telefono')}}  >
            </div>
            <div class="uk-width-expand@m">
                <label class="uk-form-label" for="cli_email">EMAIL</label>
                <input class="uk-input" id="cli_email" name=cli_email type="text" value={{old('cli_email')}} >
            </div>
        </div>
        <br>
        <div class="uk-width-1-1@m">
            <label class="uk-form-label" for="cli_direccion">DIRECCIÓN DE LA EMPRESA</label>
            <input class="uk-input" id="cli_direccion" name="cli_direccion" type="text" value={{old("cli_direccion")}} >    
        </div>
        <br>
        <div uk-grid>
            <div class="uk-width-1-3">
                <label class="uk-form-label" for="cli_pais">PAÍS</label>
                <input class="uk-input" id="cli_pais" name=cli_pais type="text" required value={{old('cli_pais')}}  >
            </div>
            <div class="uk-width-1-3@m">
                <label class="uk-form-label" for="cli_ciudad">CIUDAD</label>
                <input class="uk-input" id="cli_email" name=cli_ciudad type="text" value={{old('cli_ciudad')}} >
            </div>
        </div>
        <br>
        <div class="uk-width-1-1@m">
            <label class="uk-form-label" for="cli_nombre_contacto">NOMBRE CONTACTO DE LA EMPRESA</label>
            <input class="uk-input" id="cli_nombre_contacto" name="cli_nombre_contacto" type="text" required value={{old('cli_nombre_contacto')}} >    
        </div>
        <br>
       



        <button id="cli_btn_crer" class="uk-button uk-button-primary">CREAR CLIENTE</button>
    </form>

    


@endsection

<div uk-grid>
    <div class="uk-width-auto@m">
        <label class="uk-form-label" for="cli_telefono">Nº TELÉFONO</label>
        <input class="uk-input uk-width-1-2@m" id="cli_telefono" name=cli_telefono type="text" >
    </div>
    <div class="uk-width-1-3@m">
        <label class="uk-form-label" for="cli_telefono">Nº TELÉFONO</label>
        <input class="uk-input uk-width-1-2@m" id="cli_telefono" name=cli_telefono type="text" >
    </div>
    <div class="uk-width-expand@m">
        <label class="uk-form-label" for="cli_telefono">Nº TELÉFONO</label>
        <input class="uk-input uk-width-1-2@m" id="cli_telefono" name=cli_telefono type="text" >
    </div>
</div>

