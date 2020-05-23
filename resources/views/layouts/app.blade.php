<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit-icons.min.js" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    

    

    <!--Dependencias JQUERY UI-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" defer></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!--Dependencias datetable-->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js" defer></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/colreorder/1.5.2/js/dataTables.colReorder.min.js" defer></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" defer>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js" defer></script>

    

    <!--Dependencias select 2-->
    <script src="{{ asset('js/select2.js') }}" defer></script>
    
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
   
    
    <!-- Scripts -->
    
    <script src="{{ asset('js/script_general.js') }}" defer></script>


    
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">

  


  

</head>
<body>
    <nav   class="uk-navbar-container " uk-navbar id="listado">
        <div class="uk-navbar-left">

            <ul class="uk-navbar-nav">
                <li class="uk-active"><a href="#">GMP</a></li>
            </ul>

        </div>
        <div class="uk-navbar-right">
        {{Auth::user()->name}}
            <ul class="uk-navbar-nav">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                       <span class="caret"></span>
                  </a>

                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            <ul>
        </div>
    </nav>
    <div class="uk-flex">
       
       <div class="layout_menu_lateral uk-width-1-6@s">
            <ul uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky" class="uk-nav-primary uk-nav-parent-icon" uk-nav>
                <li class="uk-active"><a href="#">Menú de navegación </a></li>
                <li><a href="{{url('/alquiler')}}">Alquiler</a></li>
                <li><a href="{{url('/clientes')}}">Clientes</a></li>
                @if (Auth::user()->rol == 'admin')
                    <li><a href="{{url('/trabajadores')}}">Trabajadores</a></li>
                @endif
                <li class="uk-parent">
                    <a href="#">Gestión Máquinas</a>
                    <ul class="uk-nav-sub">
                        <li><a href="{{url('/maquinas')}}">Máquinas</a></li>
                        <li><a href="{{url('/marcas')}}">Marcas</a></li>
                        <li><a href="{{url('/modelos')}}">Modelos</a></li>
                        <li><a href="{{url('/categorias')}}">Categorías</a></li>
                        <li><a href="{{url('/tipos')}}">Tipos</a></li>
                        <li><a href="{{url('/estados')}}">Estados</a></li>
                        
                       
                    </ul>
                </li>
                
                <li><a href="{{url('/complementos')}}">Complementos</a></li>
                <li><a href="{{url('/repuestos')}}">Repuestos</a></li>


              
            </ul>
        </div>



        <div class="layout_contenedor">
            @yield('content')
            <br>
          
        </div>

    </div>
    <div class="uk-section uk-section-large uk-section-muted">
    <div class="uk-container">

        <h3></h3>

        <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
            <div>
                <p></p>
            </div>
            <div>
                <p></p>
            </div>
            <div>
                <p></p>
            </div>
        </div>
    </div>
</div>

    
    

<!--uk-sticky="top: 0"
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <ul class="navbar-nav ml-auto">
                       
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
          
        </main>
    </div>
    -->
</body>
</html>
