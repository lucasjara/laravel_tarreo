<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
</head>
<body style="background-image: url({{url('img/fondo.jpg')}});background-size: cover;width: 100%;height: 100%;background-position: center center;background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;">
<div id="app">
    <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0px; background-color: #24292E;color:#24292E; border-color:#3E464F; ">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}" style="color:white;">
                    E-Students INACAP 2017
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Registro</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <div class="container">
        <br>
        <div class="row">
            <nav class="navbar navbar-default" role="navigation">
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <a class="navbar-brand" href="#">Logotipo</a>
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Mantenedores<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('usuarios') }}">Mantenedor Usuarios</a></li>
                                    <li><a href="{{ route('competencias') }}">Mantenedor Competencias</a></li>
                                    <li><a href="{{ route('universidades') }}">Mantenedor Universidades</a></li>
                                    <li><a href="{{ route('perfiles') }}">Mantenedor Perfiles</a></li>
                                    <li><a href="{{ route('categorias') }}">Mantenedor Categorias</a></li>
                                </ul>
                            </li>
                        </ul>
                    </ul>
                    <a href="" class="btn btn-success btn_agregar navbar-btn pull-right" data-toggle="modal" data-target="#modal_agregar"><span
                        class="glyphicon glyphicon-plus"></span>Agregar Competencia</a>
                </div>          
            </nav>       
        </div>
        </div>
        @yield('content')

    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/script_menu.js') }}"></script>


<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- App scripts -->
@stack('scripts')

</body>
</html>
