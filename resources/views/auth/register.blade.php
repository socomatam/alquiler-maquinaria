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

     <div class="uk-position-top-center">
           
            <h1 class="uk-heading-small">ALQUILER MAQUINARIA</h1>
    </div>

    <div class="uk-position-center uk-overlay uk-overlay-default">
    
        <div class="uk-box-shadow-bottom uk-box-shadow-small">
           
            <form class="uk-form-stacked uk-background-default uk-padding-large" method="POST" action="{{ route('register') }}">
                
                    <h2 class="uk-heading-line uk-text-center"><span>REGISTRO</span></h2>
                @csrf
                <div class=" uk-margin">
                <label class="uk-form-label uk-text-bold" for="form-stacked-text"><span class="uk-margin-small-right"></span>NOMBRE USUARIO</label>
                <div class="uk-form-controls">
                    <input id="name" type="text" class="uk-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
        </div>


        <div class="uk-margin">
            <label class="uk-form-label uk-text-bold" for="form-stacked-text"><span class="uk-margin-small-right"></span>E-MAIL</label>
            <div class="uk-form-controls">
                <input id="email" type="email" class="uk-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <p>{{ $message }}</p>
                </span>
                @enderror
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label uk-text-bold" for="form-stacked-text"><span class="uk-margin-small-right"></span>EMPLEADO</label>
            <div class="uk-form-controls">
            <select id="cli_select" class="uk-select" name="trabajador">
                @foreach($trabajadores as $trabajador)
                <option value="{{$trabajador->id}}">{{$trabajador->tra_nombre_trabajador}} {{$trabajador->tra_apellido_1}} {{$trabajador->tra_apellido_2}}</option>
                @endforeach
            </select>

                
            </div>
        </div>

         <div class="uk-margin">
            <label class="uk-form-label uk-text-bold" for="form-stacked-text"><span class="uk-margin-small-right"></span>ROL</label>
            <div class="uk-form-controls">
            <select id="cli_select" class="uk-select" name="rol">
                
                <option value="admin">Administrador</option>
                <option value="admin">Trabajador</option>
                
            </select>

                
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label uk-text-bold" for="form-stacked-text"><span class="uk-margin-small-right"></span>CONTRASEÑA</label>
            <div class="uk-form-controls">

                <input id="password" type="password" class="uk-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <p>{{ $message }}</p>
                </span>
                @enderror
            </div>
        </div>



        <div class="uk-margin">
            <label class="uk-form-label uk-text-bold" for="form-stacked-text"><span class="uk-margin-small-right"></span>CONFIRMAR CONTRASEÑA</label>
            <div class="uk-form-controls">



                <input id="password-confirm" type="password" class="uk-input" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>



        <button type="submit" class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">REGISTRARSE<a href="" uk-icon="icon:  sign-in"></a></button>

        </form>
        <div>
        </div>



</body>
</html>

<script>
    $( document ).ready(function() {
        $('select').select2({
        
        });
    });
</script>
