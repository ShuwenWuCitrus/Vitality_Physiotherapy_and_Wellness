@extends('layouts.master')

@section('title', 'Schedule')

@section('content')
    <section class="max-w-2xl mx-auto px-5 py-[5rem] rounded-lg">
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Editing your appointment on
                {{ \Carbon\Carbon::parse($appointment->date_time)->format('M d, H:i') }} with
                {{ $appointment->professional->name }}</h1>
        </div>
        <div class="bg-white rounded-xl p-5">
            <div class="text-center mb-4">
                <img src="{{ asset('icons/' . $appointment->service->name . '.webp') }}" class="mx-auto w-12 h-12 pb-3"
                    alt="">
            </div>
            <div class="flex flex-col space-y-4">
                <form action="{{ route('appointments.update', $appointment->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="date_time" class="block text-sm font-medium text-gray-700">Date and Time</label>
                        <input type="datetime-local"
                            class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            id="date_time" name="date_time"
                            value="{{ \Carbon\Carbon::parse($appointment->date_time)->format('Y-m-d\TH:i') }}" required>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit"
                            class="px-5 py-2 rounded-full hover:bg-[#444444] bg-black text-white transition ease-in">Update
                            Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
