@extends('layouts.app')
@section('content')

    @if (count($errors) > 0)
		<div class="ui negative message">
			<i class="close icon"></i>
			<div class="header">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		</div>
    @endif
    
   



    <form class="formularios" method="POST" action="{{url('/clientes')}}" class="uk-form-stacked">
        @csrf
        <div class="uk-width-1-2@m">
            <label class="uk-form-label" for="maq_marca">MARCA</label>
            <input class="uk-input" id="maq_marca" name="maq_marca" type="text" required value={{old('maq_marca')}} >    
        </div>
        <br>

        <div class="uk-width-1-3@m">
            <label class="uk-form-label" for="cli_nif">Nº NIF</label>
            <input class="uk-input " id="cli_nif" name=cli_nif type="text" required value={{old('cli_nif')}} >
        </div>
        <br>

        <div uk-grid>
            <div class="uk-width-1-3">
                <label class="uk-form-label" for="maq_marca">MARCA</label>
                <input class="uk-input" id="maq_marca" name=maq_marca type="text" required value={{old('maq_marca')}}  >
            </div>
            <div class="uk-width-1-3">
                <label class="uk-form-label" for="maq_modelo">MODELO</label>
                <input class="uk-input" id="maq_modelo" name=maq_modelo type="text" value={{old('maq_modelo')}} >
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
       



        <button  class="uk-button uk-button-primary">CREAR MÁQUINA</button>
        <button id='btn_limpiar' class="uk-button uk-button-default">LIMPIAR FORMULARIO</button>
    </form>

    


@endsection

