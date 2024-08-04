@extends('layouts.master')

@section('title', 'Vitality | Login')

@section('content')

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="flex flex-row">
        <div class="w-1/3 p-5 flex flex-col justify-center items-center">
            <form method="POST" action="{{ route('login') }}">
                <div class="flex flex-col justify-center items-center">
                    @csrf
                    <div class="flex flex-col justify-center">
                        <h1>Login</h1>
                    </div>
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                            required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Button -->
                    <div class="mt-4 w-full block">
                        <button type="submit"
                            class="w-full text-white font-bold py-2 px-4 rounded hover:bg-[#69c4f9] bg-blue ease-in duration-200">
                            Log in
                        </button>
                    </div>

                    <div class="flex flex-col items-center justify-end mt-4 w-full">
                        @if (Route::has('password.request'))
                            <a class="underline text-xs text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            <hr class="h-px w-full my-4 bg-gray-200 border-1 dark:bg-gray-700">
                        @endif
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('register') }}"
                            class="w-full text-xs text-white font-bold py-2 px-4 rounded hover:bg-[#e0b636] bg-yellow ease-in duration-200">
                            Register
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-2/3 h-[45rem] bg-no-repeat bg-cover bg-center bg-[url('../../public/images/login-banner.webp')]">
        </div>
    </div>
@endsection
