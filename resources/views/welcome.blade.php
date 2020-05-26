<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AMP</title>

        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/css/uikit.min.css" />

        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit-icons.min.js"></script>

    </head>
    <body>

    <div class="uk-position-center uk-overlay uk-overlay-default">
        <div class="uk-box-shadow-bottom uk-box-shadow-small">
            <form class="uk-form-stacked uk-background-default uk-padding-large">
                <div class="uk-margin">
                    <label class="uk-form-label uk-text-bold" for="form-stacked-text"><span class="uk-margin-small-right" uk-icon="user"></span>NOMBRE DE USUARIO O DIRECCIÓN EMAIL</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-stacked-text" type="text" placeholder="Nombre de usuario">
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label uk-text-bold" for="form-stacked-text"> <span class="uk-margin-small-right" uk-icon="lock"></span>CONTRASEÑA</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-stacked-text" type="password" placeholder="Contraseña">
                    </div>
                </div>
                <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">ACCEDER<a href="" uk-icon="icon:  sign-in"></a></button>
                <a class="uk-link-muted" href="#">Recuperar contraseña.</a>
            </form>
        <div>
    </div>
    

    <!--
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
        -->
    </body>
</html>
