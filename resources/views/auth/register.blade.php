@extends('layouts.master')

@section('title', 'Vitality | Login')

@section('content')
    <div class="bg-yellow lg:flex">
        <div class="lg:w-1/3 lg:h-auto h-screen flex flex-col justify-center items-center">
            <form method="POST" action="{{ route('register') }}">
                <div class="flex flex-col items-center space-y-5">
                    @csrf
                    <div class="">
                        <h1 class="font-[900] text-[24px] text-black">Register</h1>
                    </div>
                    <!-- First Name -->
                    <div>
                        <x-input-label for="first_name" :value="__('First Name')" />
                        <x-text-input id="first_name" class="" type="text" name="first_name" :value="old('first_name')"
                            required autofocus autocomplete="given-name" />
                        <x-input-error :messages="$errors->get('first_name')" class="" />
                    </div>

                    <!-- Last Name -->
                    <div class="">
                        <x-input-label for="last_name" :value="__('Last Name')" />
                        <x-text-input id="last_name" class="" type="text" name="last_name" :value="old('last_name')"
                            required autofocus autocomplete="family-name" />
                        <x-input-error :messages="$errors->get('last_name')" class="" />
                    </div>

                    <!-- Email Address -->
                    <div class="">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="" type="email" name="email" :value="old('email')" required
                            autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="" />
                    </div>

                    <!-- Password -->
                    <div class="">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="" type="password" name="password" required
                            autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="" type="password" name="password_confirmation"
                            required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="" />
                    </div>
                    <div class="w-full pb-5">
                        <button type="submit"
                            class="w-full text-white shadow-xl font-bold py-2 px-4 rounded-full hover:bg-[#444444] bg-black ease-in duration-200">
                            Register
                        </button>
                    </div>

                    <div class="pb-5">
                        <a class="underline text-blue-500 hover:text-blue-700" href="{{ route('login') }}">
                            {{ __('Already have an account?') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <div
            class="hidden lg:flex lg:w-2/3 lg:h-[45rem] lg:bg-no-repeat lg:bg-cover lg:bg-center lg:bg-[url('../../public/images/login-banner.webp')]">

        </div>


    @endsection
