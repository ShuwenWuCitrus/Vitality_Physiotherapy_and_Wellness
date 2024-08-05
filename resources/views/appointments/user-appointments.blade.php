@extends('layouts.master')

@section('title', 'User Appointments')

@section('content')
    <section class="px-[5rem]">
        <div class="py-[5rem] text-center lg:text-left">
            <h1 class="font-bold text-[24px]">My Appointments</h1>
            <h3 class="font-bold text-[18px]">{{ Auth::user()->first_name }}
                {{ Auth::user()->last_name }}</h3>
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
        </div>
        <div class="flex flex-col lg:flex-row space-y-5 lg:space-y-0 lg:space-x-5 pb-[3rem]">
            @if (empty($appointments))
                <p>You have no upcoming appointments.</p>
            @else
                @foreach ($appointments as $appointment)
                    <div class="bg-yellow shadow-2xl rounded-xl p-5 transition ease-in hover:bg-[#f5cf5b]">
                        <div>
                            <img src="{{ asset('icons/' . $appointment->service->name . '.webp') }}"
                                class="mx-auto w-[50px] h-[50px] pb-3" alt="">
                        </div>
                        <div class="flex flex-col space-y-2 pb-[1rem]">
                            <p><strong>Session: </strong>{{ $appointment->service->name }}</p>
                            <p><strong>Date: </strong>{{ \Carbon\Carbon::parse($appointment->date_time)->format('M d, Y') }}
                            </p>
                            <p><strong>Time: </strong>{{ \Carbon\Carbon::parse($appointment->date_time)->format('H:i') }}
                            </p>
                            <p><strong>Location: </strong>1385 Woodroffe Ave.</p>
                            <p><strong>Professional: </strong>{{ $appointment->professional->name }}</p>
                        </div>
                        <div class="flex flex-col lg:flex-row space-y-2 lg:space-y-0 lg:space-x-1">
                            <button
                                class="transition ease-in px-5 py-2 rounded-full hover:bg-[#69c4f9] bg-[#4EA5D9] text-[#222222]"><a
                                    href="{{ route('appointments.edit', $appointment->id) }}">Make changes</a></button>
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="transition ease-in w-full px-5 py-2 rounded-full hover:bg-[#69c4f9] bg-[#4EA5D9] text-[#222222]"
                                    type="submit"
                                    onclick="return confirm('Are you sure you want to cancel this appointment?')">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
@endsection
