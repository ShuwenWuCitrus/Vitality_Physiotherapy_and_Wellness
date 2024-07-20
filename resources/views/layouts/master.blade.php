<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/js/app.js')
</head>

<body>
    <nav class="">
        <div class="flex flex-row justify-between items-center bg-[#222222]">
            <div>
                <img src="{{ asset('logo/white_logo.png')}}" alt="">
            </div>
            <div class="flex flex-row">
                <a href="#" class="px-2 text-white">About</a>
                <a href="#" class="px-2 text-white">Services</a>
                <a href="#" class="px-2 text-white">Professionals</a>
            </div>
            <div class="flex flex-row">
                @auth
                    <a href="{{ url('/appointments')}}">
                        {{ Auth::user()->first_name}}
                    </a>    
                @else
                    <a href="{{ route('login')}}" class="px-2 text-white">Login</a>
                    <a href="{{ route('register')}}" class="px-2 rounded border border-blue bg-[#4EA5D9] text-white">Register</a>
                @endauth
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="bg- yellow bg-[#FACA3C]">
            <div>
                <div>
                    <h3>Head Office</h3>
                </div>
                <div>
                    <p>1385 Woodroffe Avenue</p>
                    <p>Ottawa, ON, K2G 1V8</p>
                </div>
                <div>
                    <p>Telephone: (343) XXX-XXXX</p>
                    <p>info@vitalitywellness.com</p>
                </div>
            </div>
            <div>
                <div>
                    <img src="{{asset ('logo/square_white_logo.png')}}" alt="">
                </div>
            </div>
            <div>
                <div>
                    <h3>Check our Socials</h3>
                </div>
                <div>
                    <ul>
                        <li>Instagram</li>
                        <li>Twitter</li>
                        <li>Linkeding</li>
                        <li>Facebook</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Add your JavaScript files here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>