@extends('layouts.master')

@section('title', 'Edit Appointment')

@section('content')
<section class="max-w-2xl mx-auto p-6 bg-white rounded-lg">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Editing your appointment on
            {{ \Carbon\Carbon::parse($appointment->date_time)->format('M d, H:i') }} with
            {{ $appointment->professional->name }}
        </h1>
    </div>
    <div class="bg-yellow border border-yellow-300 rounded-xl p-5">
        <div class="text-center mb-4">
            <img src="{{ asset('icons/' . $appointment->service->name . '.webp') }}" class="mx-auto w-12 h-12 pb-3" alt="">
        </div>
        <div class="flex flex-col space-y-4">
            <form action="{{ route('appointments.update', $appointment->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="date_time" class="block text-sm font-medium text-gray-700">Date and Time</label>
                    <select name="date_time" id="date_time" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        @foreach ($availableSlots as $slot)
                        <option value="{{ $slot }}" {{ $slot == $appointment->date_time->format('Y-m-d H:i:s') ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::parse($slot)->format('M d, Y H:i') }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="px-5 py-2 rounded-full hover:bg-[#69c4f9] bg-[#4EA5D9] text-[#222222]">Update
                        Appointment</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection