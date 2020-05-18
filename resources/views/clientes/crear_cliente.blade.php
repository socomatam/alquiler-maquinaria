@extends('layouts.app')
@section('content')

    <h2 class="uk-heading-divider">Añadir nuevo cleinte</h2>


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
    
   



    <form class="formularios" method="POST" action="{{url('/clientes')}}" class="uk-form-stacked">
        @csrf
        <div class="uk-width-1-1@m">
            <label class="uk-form-label" for="cli_nombre">NOMBRE DE LA EMPRESA</label>
            <input class="uk-input" id="cli_nombre" name="cli_nombre_empresa" type="text" required value={{old('cli_nombre_empresa')}} >    
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
       



        <button  class="uk-button uk-button-primary">CREAR CLIENTE</button>
        <button id='btn_limpiar' class="uk-button uk-button-default">LIMPIAR FORMULARIO</button>
    </form>

    


@endsection

