@extends('layouts.master')

@section('title', 'Schedule')

@section('content')

<div class="container">
    <h2>Book an Appointment with {{ $professional->name }} for {{ $service->name }}</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf
        <input type="hidden" name="service_id" value="{{ $service->id }}">
        <input type="hidden" name="professional_id" value="{{ $professional->id }}">
        <div class="form-group">
            <label for="date_time">Choose a date and time:</label>
            <select class="form-control" id="date_time" name="date_time" required>
                <option value="">Select a time slot</option>
                @foreach($availableSlots as $slot)
                <option value="{{ $slot }}">{{ Carbon\Carbon::parse($slot)->format('M d, Y H:i') }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Book Appointment</button>
    </form>
</div>
@endsection