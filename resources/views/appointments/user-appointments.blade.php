@extends('layouts.master')

@section('title', 'User Appointments')

@section('content')
<section class="px-[5rem]">
    <div class="py-[5rem]">
        <h1 class="font-bold text-[24px]">My Appointments</h1>
        <h3 class="font-bold text-[18px]">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
        @if (session('success'))
        <p class="text-green-600">{{ session('success') }}</p>
        @endif
    </div>

    @php
    $appointmentsCollection = collect($appointments);
    $futureAppointments = $appointmentsCollection->filter(function($appointment) {
    return \Carbon\Carbon::parse($appointment->date_time)->isFuture();
    });
    $pastAppointments = $appointmentsCollection->filter(function($appointment) {
    return \Carbon\Carbon::parse($appointment->date_time)->isPast();
    });
    @endphp

    <div class="mb-[3rem]">
        <h2 class="font-bold text-[20px] mb-4">Upcoming Appointments</h2>
        <div class="flex flex-row flex-wrap gap-5 pb-[3rem]">
            @if ($futureAppointments->isEmpty())
            <p class="text-gray-600">You have no upcoming appointments.</p>
            @else
            @foreach ($futureAppointments as $appointment)
            <div class="bg-yellow border rounded-xl p-5">
                <div>
                    <img src="{{ asset('icons/' . $appointment->service->name . '.webp') }}" class="mx-auto w-[50px] h-[50px] pb-3" alt="">
                </div>
                <div class="flex flex-col space-y-2 pb-[1rem]">
                    <p><strong>Session: </strong>{{ $appointment->service->name }}</p>
                    <p><strong>Date: </strong>{{ \Carbon\Carbon::parse($appointment->date_time)->format('M d, Y') }}</p>
                    <p><strong>Time: </strong>{{ \Carbon\Carbon::parse($appointment->date_time)->format('H:i') }}</p>
                    <p><strong>Location: </strong>1385 Woodroffe Ave.</p>
                    <p><strong>Professional: </strong>{{ $appointment->professional->name }}</p>
                </div>
                <div class="flex flex-row space-x-1">
                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="px-5 py-2 rounded-full hover:bg-[#69c4f9] bg-[#4EA5D9] text-[#222222]">Make changes</a>
                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="px-5 py-2 rounded-full hover:bg-[#69c4f9] bg-[#4EA5D9] text-[#222222]" type="submit" onclick="return confirm('Are you sure you want to cancel this appointment?')">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>

    <div>
        <h2 class="font-bold text-[20px] mb-4">Past Appointments</h2>
        <div class="flex flex-row flex-wrap gap-5 pb-[3rem]">
            @if ($pastAppointments->isEmpty())
            <p class="text-gray-600">You have no past appointments.</p>
            @else
            @foreach ($pastAppointments as $appointment)
            <div class="bg-gray-100 border rounded-xl p-5 opacity-50">
                <div>
                    <img src="{{ asset('icons/' . $appointment->service->name . '.webp') }}" class="mx-auto w-[50px] h-[50px] pb-3" alt="">
                </div>
                <div class="flex flex-col space-y-2 pb-[1rem]">
                    <p><strong>Session: </strong>{{ $appointment->service->name }}</p>
                    <p><strong>Date: </strong>{{ \Carbon\Carbon::parse($appointment->date_time)->format('M d, Y') }}</p>
                    <p><strong>Time: </strong>{{ \Carbon\Carbon::parse($appointment->date_time)->format('H:i') }}</p>
                    <p><strong>Location: </strong>1385 Woodroffe Ave.</p>
                    <p><strong>Professional: </strong>{{ $appointment->professional->name }}</p>
                </div>
                <p class="text-gray-600 italic">Past Appointment</p>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection