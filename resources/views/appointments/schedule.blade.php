@extends('layouts.master')

@section('title', 'Schedule')

@section('content')
    <div>
        <h1 class="bg-white font-bold text-[24px] px-[110px] py-[2rem] text-center lg:text-left">Schedule Your Appointment
        </h1>
    </div>
    <div class="bg-yellow flex flex-col justify-center items-center py-[3rem] text-center">
        <div>
            <h2 class="font-bold text-[20px] px-[1rem]">For {{ $service->name }}, {{ $professional->name }} has the
                following
                timeslots available:</h2>
        </div>
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" class="max-w-sm mx-auto" action="{{ route('appointments.store') }}">
                @csrf
                <input type="hidden" name="service_id" value="{{ $service->id }}">
                <input type="hidden" name="professional_id" value="{{ $professional->id }}">
                <div class="py-[26px]">
                    <select class="border text-sm rounded-lg block w-full p-2.5" id="date_time" name="date_time" required>
                        <option selected>Select a timeslot</option>
                        @foreach ($availableSlots as $slot)
                            <option value="{{ $slot }}">{{ Carbon\Carbon::parse($slot)->format('M d, Y H:i') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="bg-blue py-2 px-5 rounded-3xl">Book Appointment</button>
            </form>
        </div>
    </div>
@endsection
