@extends('layouts.master')

@section('title', 'Services')

@section('content')
    <h1>Our Services</h1>
    <ul>
        @foreach ($services as $service)
            <li> <a href="{{ route('professionals.by_service', ['serviceName' => $service['name']]) }}">
                    {{ $service['name'] }}</a></li>
        @endforeach
    </ul>
@endsection
