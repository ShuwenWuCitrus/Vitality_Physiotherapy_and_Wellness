@extends('layouts.master')

@section('title', 'Professionals by Service')

@section('content')
    <div>
        <h1 class="font-bold text-[24px] px-[110px] py-[56px]">Schedule Your Appointment</h1>
    </div>
    <div class="bg-yellow flex flex-col justify-center items-center pb-[56px]">
        <div>
            <h2 class="font-bold text-[20px] py-[56px]">Select the professional for your session of {{ $service->name }}</h2>
        </div>
        <div class="flex flex-row">
            @forelse($professionals as $professional)
                <div class="mx-5 flex flex-col items-center justify-center">
                    <div>
                        <h3 class="font-bold">{{ $professional->name }}</h3>
                    </div>
                    <div class="my-2">
                        <img class="w-[10rem] h-[10rem] pb-3" src="{{ asset('images/' . $professional['name'] . '.webp') }}"
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
    {{-- <div class="flex flex-row">
            @forelse($professionals as $professional)
                <div class="professional-item">
                    <h2>{{ $professional->name }}</h2>
                    <a
                        href="{{ route('appointments.schudule', ['service' => $service->id, 'professional' => $professional->id]) }}">Schedule
                        Appointment</a>
                </div>
            @empty
                <p>No professionals found for this service.</p>
            @endforelse
        </div> --}}
    </div>
@endsection
