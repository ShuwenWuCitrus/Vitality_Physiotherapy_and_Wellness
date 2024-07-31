@extends('layouts.master')

@section('title', 'Schedule')

@section('content')
<div class="container">
    <h1>Edit Appointment</h1>
    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date_time">Date and Time</label>
            <input type="datetime-local" class="form-control" id="date_time" name="date_time" value="{{ \Carbon\Carbon::parse($appointment->date_time)->format('Y-m-d\TH:i') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Appointment</button>
    </form>
</div>
@endsection