@extends('layouts.master')

@section('title', 'Services')

@section('content')
    <div>
        <h1 class="bg-white font-bold text-[24px] px-[110px] py-[2rem] text-center lg:text-left">Schedule Your Appointment
        </h1>
    </div>
    <div class="bg-yellow flex flex-col justify-center items-center py-[5rem] text-center">
        <div>
            <h2 class="font-bold text-[20px] px-[1rem] pb-[3rem]">What are you looking for?</h2>
        </div>
        <div class="grid font-[800] grid-cols-2 gap-y-16 lg:grid-cols-4 lg:grid-rows-2 lg:gap-y-16">
            @foreach ($services as $service)
                <div class="flex flex-col justify-center items-center space-y-2">
                    <div>
                        <img src="{{ asset('icons/' . $service['name'] . '.webp') }}" class="w-[50px] h-[50px] pb-3"
                            alt="">
                    </div>
                    <div>
                        <p class="text-center"> {{ $service['name'] }} </p>
                    </div>
                    <div>
                        <button class="bg-blue py-2 px-5 rounded-3xl"><a
                                href="{{ route('professionals.by_service', ['serviceName' => $service['name']]) }}">Select</a></button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
