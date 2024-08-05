@extends('layouts.master')

@section('title', 'Vitality | Login')

@section('content')

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="bg-yellow lg:flex">
        <div class="lg:w-1/3 lg:h-auto h-screen flex flex-col justify-center items-center">
            <form method="POST" action="{{ route('login') }}">
                <div class="flex flex-col items-center space-y-5">
                    @csrf
                    <div class="">
                        <h1 class="font-[900] text-[24px] text-black">Login</h1>
                    </div>
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="" type="email" name="email" :value="old('email')" required
                            autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="" />
                    </div>

                    <!-- Password -->
                    <div class="">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="" type="password" name="password" required
                            autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="" />
                    </div>

                    <!-- Button -->
                    <div class="w-full">
                        <button type="submit"
                            class="w-full text-white shadow-xl font-bold py-2 px-4 rounded-full hover:bg-[#444444] bg-black ease-in duration-200">
                            Login
                        </button>
                    </div>

                    <div class="">
                        @if (Route::has('password.request'))
                            <a class="" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            <hr class="border border-black my-4">
                        @endif
                    </div>
                    <!-- Register -->
                    <div class="pb-5">
                        <a href="{{ route('register') }}" class="underline">
                            Register
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <div
            class="hidden lg:flex lg:w-2/3 lg:h-[45rem] lg:bg-no-repeat lg:bg-cover lg:bg-center lg:bg-[url('../../public/images/login-banner.webp')]">
        </div>
    </div>

    </div>
@endsection
