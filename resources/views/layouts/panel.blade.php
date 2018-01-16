<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Favorita Noivas - Gereciamento</title>

    <!-- Styles -->


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}"> Gerenciamento - Favorita Noivas</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> {{ ucfirst(Auth::user()->name) }} <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <i class="fa fa-fw fa-power-off"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{url('home')}}"><i class="fa fa-dashboard fa-fw"></i> Gerenciador </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Cadastros <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="{{ str_contains(Route::getCurrentRoute()->uri,'cadastro/produtos') ? 'active' : '' }}">
                                <a href="{{ url('/cadastro/produtos') }}"><i class="fa fa-glass "></i> Produtos</a>
                            </li>
                            <li class="{{ str_contains(Route::getCurrentRoute()->uri,'cadastro/categorias') ? 'active' : '' }}">
                                <a href="{{ url('/cadastro/categorias') }}"><i class="fa fa-book  "></i> Categorias</a>
                            </li>
                            <li class="{{ str_contains(Route::getCurrentRoute()->uri,'cadastro/modelos') ? 'active' : '' }}">
                                <a href="{{ url('/cadastro/modelos') }}"> <i class="fa fa-bookmark"></i> Modelos</a>
                            </li>
                            <li class="{{ str_contains(Route::getCurrentRoute()->uri,'cadastro/marcas') ? 'active' : '' }}">
                                <a href="{{ url('/cadastro/marcas') }}"><i class="fa fa-tags  "></i> Marcas</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li class="{{ str_contains(Route::getCurrentRoute()->uri,'empresa') ? 'active' : '' }}">
                        <a href="{{ url('/empresa') }}"><i class="fa fa-edit fa-fw"></i> Sobre a Empresa</a>
                    </li>
                    <li class="{{ str_contains(Route::getCurrentRoute()->uri,'users') ? 'active' : '' }}">
                        <a href="{{ url('/users') }}"><i class="fa fa-user"></i> Usuários</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper" >
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header" style="margin: 10px 0 5px">
                    {{$page}}
                </h3>
                @if(isset($breadcrumbs))
                    <ol class="breadcrumb" style="margin-bottom: 5px">
                        @foreach($breadcrumbs as $rows =>$value)
                            @if ($loop->last)
                                <li>
                                    {{$rows}}
                                </li>
                            @else
                                <li class="active">
                                    <a href="{{url($value)}}"> {{$rows}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ol>
                @endif
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/panel-layout.js') }}"></script>
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        @yield('content')
    </div>
    <!-- /#page-wrapper -->

</div>






</body>

</html>
