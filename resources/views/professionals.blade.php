@extends('layouts.master')

@section('title', 'Professionals')

@section('content')
<h1>Our Professionals</h1>
<ul>
    @foreach ($professionals as $professional)
    <li>{{ $professional['name'] }}</li>
    @endforeach
</ul>
@endsection