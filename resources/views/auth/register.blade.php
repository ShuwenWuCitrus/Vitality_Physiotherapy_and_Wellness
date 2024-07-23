@extends('layouts.master')

@section('title', 'Vitality | Login')

@section('content')
    <div class="flex flex-row">
        <div class="w-1/3 p-5 flex flex-col justify-center items-center">
            <form method="POST" action="{{ route('register') }}">
                <div class="flex flex-col justify-center items-center">
                    @csrf
                    <div class="flex flex-col justify-center">
                        <h1>Register</h1>
                    </div>
                    <!-- First Name -->
                    <div>
                        <x-input-label for="first_name" :value="__('First Name')" />
                        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                            :value="old('first_name')" required autofocus autocomplete="given-name" />
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>

                    <!-- Last Name -->
                    <div class="mt-4">
                        <x-input-label for="last_name" :value="__('Last Name')" />
                        <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                            :value="old('last_name')" required autofocus autocomplete="family-name" />
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <div class="mt-4 w-full block">
                        <button type="submit"
                            class="w-full text-white font-bold py-2 px-4 rounded hover:bg-[#69c4f9] bg-blue ease-in duration-200">
                            Register
                        </button>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-2/3 h-[45rem] bg-no-repeat bg-cover bg-center bg-[url('../../public/images/login-banner.jpg')]">

        </div>


    @endsection
