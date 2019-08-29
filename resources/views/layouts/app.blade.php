<!DOCTYPE html class="h-100">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset(mix('js/app.js')) }}" defer></script> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    
</head>
<body class="h-100">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
    </form>
    <div id="app" class="h-100">
    <b-navbar toggleable="sm" type="light" variant="info">
        <b-navbar-toggle target="nav-text-collapse"></b-navbar-toggle>

        <b-navbar-brand href="{{ url('/home') }}">
            {{ config('app.name', 'Laravel') }}
        </b-navbar-brand>
         
        <b-collapse id="nav-text-collapse" is-nav>
            <b-navbar-nav class="ml-auto">
                @guest
                    <b-nav-item href="{{ route('login') }}">{{ __('Login') }}</b-nav-item>
                    @if (Route::has('register'))
                        <b-nav-item href="{{ route('register') }}">{{ __('Register') }}</b-nav-item>
                    @endif
                @else
                    <b-img src="/users/{{ Auth::user()->image }}" rounded="circle"   slot="aside" width="45" height="45" alt="placeholder" ></b-img> 
                    <b-nav-item-dropdown text="{{ Auth::user()->name }}" right>
                        <b-dropdown-item href="#" @click="logout">
                            Cerrar sesión
                        </b-dropdown-item>
                        <b-dropdown-item href="{{ url('/profile') }}" >
                            Modificar perfil
                        </b-dropdown-item>
                    </b-nav-item-dropdown>
                @endif
            </b-navbar-nav>
        </b-collapse>
    </b-navbar>

    <main class="">
         @yield('content')
    </main>
    </div>
</body>
</html>
