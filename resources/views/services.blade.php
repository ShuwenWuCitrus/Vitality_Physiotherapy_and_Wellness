@extends('layouts.master')

@section('title', 'Services')

@section('content')
    <div>
        <h1 class="font-bold text-[24px] px-[110px] py-[56px]">Schedule Your Appointment</h1>
    </div>
    <div class="bg-yellow flex flex-col justify-center items-center pb-[56px]">
        <div>
            <h2 class="font-bold text-[20px] py-[56px]">What are you looking for?</h2>
        </div>
        <div class="grid grid-cols-4 grid-rows-2 font-[800] gap-y-16">
            @foreach ($services as $service)
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <img src="{{ asset('icons/' . $service['name'] . '.webp') }}" class="w-[50px] h-[50px] pb-3"
                            alt="">
                    </div>
                    <div>
                        <p class="py-3"> {{ $service['name'] }} </p>
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
