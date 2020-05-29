

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/css/uikit.min.css" />

        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit-icons.min.js"></script>

    </head>
    <body>

    <div class="uk-position-top-center">
            <br>
            <br>
             <br>
            <br>
            <h1 class="uk-heading-small">ALQUILER MAQUINARIA</h1>
    </div>

    <div class="uk-position-center uk-overlay uk-overlay-default">
        <div class="uk-box-shadow-bottom uk-box-shadow-small">
            <form class="uk-form-stacked uk-background-default uk-padding-large" method="POST" action="{{ route('login') }}">
            <h2 class="uk-heading-line uk-text-center"><span>AUTENTICACIÓN</span></h2>
                @csrf
                <div class="uk-margin">
                    <label class="uk-form-label uk-text-bold" for="form-stacked-text"><span class="uk-margin-small-right" uk-icon="user"></span>DIRECCIÓN EMAIL</label>
                    <div class="uk-form-controls">
                        <input id="email" type="email" class="uk-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}<p>
                                </span>
                        @enderror
                   </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label uk-text-bold" for="form-stacked-text"> <span class="uk-margin-small-right" uk-icon="lock"></span>CONTRASEÑA</label>
                    <div class="uk-form-controls">
                        <input id="password" type="password" class="uk-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                    </div>
                </div>
                
                <button type="submit" class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">ACCEDER<a href="" uk-icon="icon:  sign-in"></a></button>
                <a class="uk-link-muted" href="{{ route('password.request') }}">Recuperar contraseña.</a>
                <br>
                <a class="uk-link-muted" href="{{url('nuevousuario')}}">Solicitar creación de cuenta.</a>
            </form>
        <div>
    </div>
    

    </body>
</html>

<style>
    
</style>


