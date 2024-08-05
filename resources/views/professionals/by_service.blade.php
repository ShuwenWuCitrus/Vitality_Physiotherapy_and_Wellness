@extends('layouts.master')

@section('title', 'Professionals by Service')

@section('content')
    <div>
        <h1 class="bg-white font-bold text-[24px] px-[110px] py-[2rem] lg:text-left text-center">Schedule Your Appointment
        </h1>
    </div>
    <div class="bg-yellow flex flex-col justify-center items-center py-[5rem] text-center">
        <div>
            <h2 class="font-bold text-[20px] px-[1rem] pb-[3rem]">Select the professional for your session of
                {{ $service->name }}</h2>
        </div>
        <div class="flex flex-col justify-center items-center space-y-[2rem] lg:flex-row lg:space-y-0 lg:space-x-[1rem]">
            @forelse($professionals as $professional)
                <div class="flex flex-col justify-center items-center space-y-3">
                    <div>
                        <h3 class="font-bold">{{ $professional->name }}</h3>
                    </div>
                    <div class="">
                        <img class="w-[10rem] h-[10rem]" src="{{ asset('images/' . $professional['name'] . '.webp') }}"
                            alt="">
                    </div>
                    <div>
                        <div>
                            <button class="bg-blue py-2 px-5 rounded-3xl"><a
                                    href="{{ route('appointments.schudule', ['service' => $service->id, 'professional' => $professional->id]) }}">Select
                                    {{ explode(' ', $professional->name)[0] }}</a></button>
                        </div>
                    </div>
                </div>
            @empty
                <p>No professionals found for this service.</p>
            @endforelse
        </div>
    </div>
@endsection
