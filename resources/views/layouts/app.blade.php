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
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <style>
        .active {
            font-weight: bold;
        }
    </style>

</head>
<body>
<div id="app">
    <?php function activeMenu($url)
    {
        return request()->is($url) ? 'active' : '';
    }?>
    <nav class="navbar navbar-default">
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
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{activeMenu('/')}}"><a href="{{route('books.index')}}">Lista de Libros</a></li>
                    @auth
                        @if(auth()->user()->hasRoles('nivel1'))
                            <li class="{{activeMenu('books/create')}}"><a href="{{route('books.create')}}">Agregar
                                    Libro</a></li>
                            <li class=" {{activeMenu('admin*')}} dropdown">
                                <a href="#"
                                   class="dropdown-toggle"
                                   data-toggle="dropdown"
                                   role="button"
                                   aria-haspopup="true"
                                   aria-expanded="false">Administracion <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="{{activeMenu('admin/areas')}}"><a
                                                href="{{route('areas.index')}}">Areas</a></li>
                                    <li class="{{activeMenu('admin/users')}}"><a href="{{route('users.index')}}">Usuarios</a>
                                    </li>
                                    <li class="{{activeMenu('admin/categories')}}"><a
                                                href="{{route('categories.index')}}">Categorias</a></li>
                                </ul>
                            </li>
                        @endif
                    @endauth
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
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

    @include('layouts.partials.errors')
    @include('layouts.partials.success')

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
{{--<script src="{{ mix('js/app.js') }}"></script>--}}
@stack('scripts')
</body>
</html>
