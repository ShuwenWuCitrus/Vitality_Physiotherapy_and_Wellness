@extends('layouts.master')

@section('title', 'Professionals by Service')

@section('content')
<h1>Professionals for {{ $service->name }}</h1>
<div class="professionals-container">
    @forelse($professionals as $professional)
    <div class="professional-item">
        <h2>{{ $professional->name }}</h2>
        <a href="{{ route('appointments.schudule', ['service' => $service->id, 'professional' => $professional->id]) }}">Schedule Appointment</a>
    </div>
    @empty
    <p>No professionals found for this service.</p>
    @endforelse
</div>
@endsection