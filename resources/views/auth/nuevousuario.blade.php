<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GMP</title>
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit-icons.min.js"></script>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/css/uikit.min.css" />



    <script src="{{ asset('js/app.js') }}" defer></script>

    <!--Dependencias select 2-->
    <script src="{{ asset('js/select2.js') }}" defer></script>
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">









</head>
<body>

     <div style="background-color:black;" class="uk-background-secondary uk-light uk-padding uk-panel">
           
            <br>
            <br>
          
           
        </div>
        <div  class="uk-position-top-center">
               
                <div class="_logo">
                    <img style="width:50% ;" src="{{url('image/logo_agm.png')}}">
                </div>
        </div>



    <div class="uk-position-center uk-overlay uk-overlay-default">

        <div class="uk-box-shadow-bottom uk-box-shadow-small">

            <form class="uk-form-stacked uk-background-default uk-padding-large" method="POST" action="{{ url('guardarempleado') }}">

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

                <h2 class="uk-heading-line uk-text-center"><span>REGISTRO DE EMPLEADO</span></h2>
                @csrf


                <div uk-grid>
                    <div class="uk-width-1-4">
                        <label class="uk-form-label" for="tra_nombre_trabajador">NOMBRE</label>
                        <input class="uk-input" id="tra_nombre_trabajador" name="tra_nombre_trabajador" type="text" required value={{old('tra_nombre_trabajador')}}>
                    </div>
                    <div class="uk-width-1-4@m">
                        <label class="uk-form-label" for="tra_apellido_1">PRIMER APELLIDO</label>
                        <input class="uk-input" id="tra_apellido_1" name="tra_apellido_1" type="text" value={{old('tra_apellido_1')}}>
                    </div>
                    <div class="uk-width-1-4@m">
                        <label class="uk-form-label" for="tra_apellido_2">SEGUNDO APELLIDO</label>
                        <input class="uk-input" id="tra_apellido_2" name="tra_apellido_2" type="text" value={{old('cli_ciudad')}}>
                    </div>
                </div>
                <br>

                <div class="uk-width-1-5@m">
                    <label class="uk-form-label" for="tra_dni">Nº DNI</label>
                    <input class="uk-input " id="tra_dni" name="tra_dni" type="text" required value={{old('tra_dni')}}>
                </div>
                <br>

                <br>

                <div class="uk-width-1-5@m">
                    <label class="uk-form-label" for="tra_fecha_nacimiento">FECHA DE NACIMIENTO</label>
                    <input class="uk-input " id="tra_fecha_nacimiento" name="tra_fecha_nacimiento" type="date" required value={{old('tra_fecha_nacimiento')}}>
                </div>
                <br>

                <div uk-grid>
                    <div class="uk-width-1-5">
                        <label class="uk-form-label" for="tra_telefono">Nº TELÉFONO</label>
                        <input class="uk-input" id="tra_telefono" name="tra_telefono" type="text" required value={{old('tra_telefono')}}>
                    </div>
                    <div class="uk-width-1-3@m">
                        <label class="uk-form-label" for="tra_email">EMAIL</label>
                        <input class="uk-input" id="tra_email" name=tra_email type="text" value={{old('tra_email')}}>
                    </div>
                </div>

                <br>










                <button type="submit" class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">ENVIAR DATOS<a href="" uk-icon="icon:  sign-in"></a></button>

            </form>
            <div>
            </div>



</body>
</html>

<script>
    $(document).ready(function() {
        $('select').select2({

        });
    });

</script>
