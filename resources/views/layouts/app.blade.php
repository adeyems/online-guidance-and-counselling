<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
             {{--   <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Queen Ede Secondary School') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
--}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="/"> <img src="{{ asset('images/queen_ede.png') }}" style="max-width: 200px; max-height: 100px" alt="Queen Ede Secondary School"></a>
                        </li>
                    </ul>
                    <div class="col-md-8 text-center" style="font-size: medium; font-weight: bolder">
                      SECURED GUIDANCE, COUNSELLING AND MONITORING WEB APPLICATION
                    </div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/about" style="font-size: medium; font-weight: bolder">About Us</a></li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <?php if(session()->has('user')): ?>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a> <img src="<?php echo e(asset('images/user-alt.png')); ?>" style="max-width: 32px; max-height: 32px"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('logout')); ?>"><?php echo e(__('Logout')); ?></a>
                        </li>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
