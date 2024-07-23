<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body>
    <nav>
        <div class="flex flex-row justify-between">
            <div>
                <img src="{{ asset('logo/white_logo.png')}}" alt="">
            </div>
            <div class="flex flex-row">
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Professionals</a>
            </div>
            <div class="flex flex-row">
                @auth
                    <a href="{{ url('/appointments')}}">
                        {{ Auth::user()->first_name}}
                    </a>    
                @else
                    <a href="{{ route('login')}}">Login</a>
                    <a href="{{ route('register')}}">Register</a>
                @endauth
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer>
        <!-- Footer content -->
    </footer>
    <!-- Add your JavaScript files here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>