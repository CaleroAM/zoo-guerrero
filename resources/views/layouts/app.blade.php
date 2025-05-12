<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    @yield('styles')
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/components/notifications.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="bg-light border-bottom py-2">
            </div>
            
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img 
                        src="{{ asset('images/nav-zoo.png') }}" 
                        alt="Zoológico Guerrero"
                        class="navbar-logo"
                        style="height: 55px; width: auto;"
                    >
                </a>
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
            
        </nav>
        @php
        $navRoutes = [
            'shifts.index',
            'animals.index',
            'species.index',
            'zones.index',
            'foods.index',
            'suppliers.index',
            'employees.index',
        ];
        @endphp

        {{-- Mostrar el navbar solo en las rutas definidas --}}
        @if (in_array(Route::currentRouteName(), $navRoutes))
            @include('components.navbar')
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @vite(['resources/css/custom.css'])
    @stack('scripts')

    <style>

        a {
          text-decoration: none;
        }
      </style>

        <script>
            window.laravelSuccess = "{{ session('success') }}";
            window.laravelError = "{{ session('error') }}";
            window.laravelInfo = "{{ session('info') }}";
            window.laravelWarning = "{{ session('warning') }}";
        </script>

</body>
</html>
