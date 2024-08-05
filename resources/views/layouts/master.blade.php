<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="font-inter">
    <nav>
        <div class="flex flex-row justify-between items-center bg-[#222222] px-[50px]">
            <div>
                <a href="{{ url('/') }}">
                    <img src="{{ asset('logo/white_logo.png') }}" alt="">
                </a>
            </div>
            <div class="flex flex-row">
                <a href="/#about" class="px-2 text-white">About</a>
                <a href="/#services" class="px-2 text-white">Services</a>
                <a href="/#professionals" class="px-2 text-white">Professionals</a>
            </div>
            <div class="flex flex-row items-center">
                @auth
                <a class="text-blue font-bold" href="{{ url('/appointments') }}">
                    {{ Auth::user()->first_name }}
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <a href="{{ route('logout') }}" class="px-3 py-2 rounded border border-red-500 hover:bg-red-600 bg-red-500 text-white" onclick="event.preventDefault(); this.closest('form').submit();">
                        Logout
                    </a>
                </form>
                @else
                <a href="{{ route('login') }}" class="px-2 text-white">Login</a>
                <a href="{{ route('register') }}" class="px-3 py-3 rounded border border-blue hover:bg-[#69c4f9] bg-[#4EA5D9] text-[#222222]">Register</a>
                @endauth
            </div>
        </div>
    </nav>
    <main class="">
        @yield('content')
    </main>
    <footer class="bg-[#222222] text-[#FFFFFF]">
        <div class="flex flex-row items-center justify-center">
            <div class="w-1/4 flex flex-col justify-center items-center">
                <div class="pb-4">
                    <h3 class="font-bold text-[#4EA5D9]">Head Office</h3>
                </div>
                <div class="pb-4">
                    <p>1385 Woodroffe Avenue</p>
                    <p>Ottawa, ON, K2G 1V8</p>
                </div>
                <div>
                    <p>info@vitalitywellness.com</p>
                </div>
            </div>
            <div class="flex flex-col justify-center items-center">
                <div>
                    <img src="{{ asset('logo/square_white_logo.png') }}" alt="">
                </div>
            </div>
            <div class="w-1/4 flex flex-col justify-center items-center">
                <div class="pb-4">
                    <h3 class="font-bold text-[#4EA5D9]">Check our Socials</h3>
                </div>
                <div>
                    <ul class="flex flex-col justify-center items-center">
                        <li>Instagram</li>
                        <li>Twitter</li>
                        <li>LinkedIn</li>
                        <li>Facebook</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Add your JavaScript files here -->
    @vite('resources/js/app.js')
</body>

</html>