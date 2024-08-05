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

<body class="flex flex-col min-h-screen font-inter">
    <nav class="bg-[#222222]">
        <div class="w-full flex items-center justify-between p-4">
            <div class="w-1/3">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('logo/white_logo.png') }}" alt="Logo" class="h-8 lg:h-12">
                </a>
            </div>
            <div class="hidden lg:flex w-1/3 text-white space-x-10 justify-center">
                <a href="/#about">About</a>
                <a href="/#services">Services</a>
                <a href="/#professionals">Professionals</a>
            </div>
            <div class="w-1/3 text-white flex justify-end items-center space-x-4">
                @auth
                    <a href="{{ url('/appointments') }}">
                        {{ Auth::user()->first_name }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </a>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="">Login</a>
                    <a href="{{ route('register') }}"
                        class="py-2 px-3 text-black bg-blue rounded-full hover:bg-[#6dcaff]">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Dynamic content-->
    <main class="bg-yellow flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#222222] text-[#FFFFFF] p-4">
        <div class="flex flex-col lg:flex-row items-center justify-center lg:justify-around">
            <div class="w-full lg:w-1/4 flex flex-col justify-center items-center mb-4 lg:mb-0">
                <div class="pb-4">
                    <h3 class="font-bold text-[#4EA5D9]">Head Office</h3>
                </div>
                <div class="pb-4 text-center">
                    <p>1385 Woodroffe Avenue</p>
                    <p>Ottawa, ON, K2G 1V8</p>
                </div>
                <div>
                    <p>info@vitalitywellness.com</p>
                </div>
            </div>
            <div class="w-full lg:w-auto flex flex-col justify-center items-center mb-4 lg:mb-0">
                <div>
                    <img src="{{ asset('logo/square_white_logo.png') }}" alt="Logo" class="h-16 lg:h-[10rem]">
                </div>
            </div>
            <div class="w-full lg:w-1/4 flex flex-col justify-center items-center">
                <div class="pb-4">
                    <h3 class="font-bold text-[#4EA5D9]">Check our Socials</h3>
                </div>
                <div>
                    <ul class="flex flex-col justify-center items-center space-y-2">
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
