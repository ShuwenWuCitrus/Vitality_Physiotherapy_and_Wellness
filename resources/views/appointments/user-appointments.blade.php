@extends('layouts.master')

@section('title', 'User Appointments')

@section('content')
<div class="container">
    <h1>My Appointments</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(empty($appointments))
    <p>You have no upcoming appointments.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Date & Time</th>
                <th>Service</th>
                <th>Professional</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{ \Carbon\Carbon::parse($appointment->date_time)->format('M d, Y H:i') }}</td>
                <td>{{ $appointment->service->name }}</td>
                <td>{{ $appointment->professional->name }}</td>
                <td>
                    <a href="{{ route('appointments.edit', $appointment->id) }}">Edit</a>
                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to cancel this appointment?')">Cancel</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection