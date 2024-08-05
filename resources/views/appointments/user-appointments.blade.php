@extends('layouts.master')

@section('title', 'User Appointments')

@section('content')
    <section class="px-[5rem]">
        <div class="py-[5rem] text-center lg:text-left">
            <h1 class="font-bold text-[24px]">My Appointments</h1>
            <h3 class="font-bold text-[18px]">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
        </div>
        @php
            $appointmentsCollection = collect($appointments);
            $futureAppointments = $appointmentsCollection->filter(function ($appointment) {
                return \Carbon\Carbon::parse($appointment->date_time)->isFuture();
            });
            $pastAppointments = $appointmentsCollection->filter(function ($appointment) {
                return \Carbon\Carbon::parse($appointment->date_time)->isPast();
            });
        @endphp
        <h2 class="font-bold text-[20px] mb-4 text-center lg:text-left ">Upcoming Appointments</h2>
        <div class="flex flex-col lg:flex-row space-y-5 lg:space-y-0 lg:space-x-5 pb-[3rem]">
            @if ($futureAppointments->isEmpty())
                <p class="text-gray-600">You have no upcoming appointments.</p>
            @else
                @foreach ($futureAppointments as $appointment)
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
        <div>
            <h2 class="font-bold text-[20px] mb-4 lg:text-left text-center">Past Appointments</h2>
            <div class="flex flex-row flex-wrap gap-5 pb-[3rem]">
                @if ($pastAppointments->isEmpty())
                    <p class="text-gray-600 text-center">You have no past appointments.</p>
                @else
                    @foreach ($pastAppointments as $appointment)
                        <div class="bg-gray-100 border rounded-xl p-5 opacity-50">
                            <div>
                                <img src="{{ asset('icons/' . $appointment->service->name . '.webp') }}"
                                    class="mx-auto w-[50px] h-[50px] pb-3" alt="">
                            </div>
                            <div class="flex flex-col space-y-2 pb-[1rem]">
                                <p><strong>Session: </strong>{{ $appointment->service->name }}</p>
                                <p><strong>Date:
                                    </strong>{{ \Carbon\Carbon::parse($appointment->date_time)->format('M d, Y') }}
                                </p>
                                <p><strong>Time:
                                    </strong>{{ \Carbon\Carbon::parse($appointment->date_time)->format('H:i') }}
                                </p>
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
