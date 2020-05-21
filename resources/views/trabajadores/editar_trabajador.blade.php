@extends('layouts.app')
@section('content')

    <h2 class="uk-heading-divider">Añadir nuevo trabajador</h2>


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
    
   



    <form class="formularios" method="POST" action="{{url('/trabajadores')}}/{{$trabajador->id}}" class="uk-form-stacked">
        @csrf
        <input name="_method" type="hidden" value="PUT">
         <div uk-grid>
            <div class="uk-width-1-4">
                <label class="uk-form-label" for="tra_nombre_trabajador">NOMBRE</label>
                <input class="uk-input" id="tra_nombre_trabajador" name="tra_nombre_trabajador" type="text" required value={{$trabajador->tra_nombre_trabajador}}  >
            </div>
            <div class="uk-width-1-4@m">
                <label class="uk-form-label" for="tra_apellido_1">PRIMER APELLIDO</label>
                <input class="uk-input" id="tra_apellido_1" name="tra_apellido_1" type="text" required value={{$trabajador->tra_apellido_1}} >
            </div>
            <div class="uk-width-1-4@m">
                <label class="uk-form-label" for="tra_apellido_2">SEGUNDO APELLIDO</label>
                <input class="uk-input" id="tra_apellido_2" name="tra_apellido_2" type="text" required value={{$trabajador->tra_apellido_2}} >
            </div>
        </div>
        <br>

        <div class="uk-width-1-5@m">
            <label class="uk-form-label" for="tra_dni">Nº NIF</label>
            <input class="uk-input " id="tra_dni" name="tra_dni" type="text" required value={{$trabajador->tra_dni}} >
        </div>
        <br>

        <br>

        <div class="uk-width-1-5@m">
            <label class="uk-form-label" for="tra_fecha_nacimiento">FECHA DE NACIMIENTO</label>
            <input class="uk-input " id="tra_fecha_nacimiento" name="tra_fecha_nacimiento" type="date" required value={{$trabajador->tra_fecha_nacimiento}} >
        </div>
        <br>

        <div uk-grid>
            <div class="uk-width-1-5">
                <label class="uk-form-label" for="tra_telefono">Nº TELÉFONO</label>
                <input class="uk-input" id="tra_telefono" name="tra_telefono"  type="text" required value={{$trabajador->tra_telefono}}  >
            </div>
            <div class="uk-width-1-3@m">
                <label class="uk-form-label" for="tra_email">EMAIL</label>
                <input class="uk-input" id="tra_email" name=tra_email type="text" required value={{$trabajador->tra_email}} >
            </div>
        </div>
        
        <br>

        <button  class="uk-button uk-button-primary">CREAR TRABAJADOR</button>
        <button id='btn_limpiar' class="uk-button uk-button-default">LIMPIAR FORMULARIO</button>
    </form>

    
<style>
    .uk-nav-primary>li:nth-child(4)>a:nth-child(1) {
        color: #1da1f2 !important;
    }

</style>
@endsection

