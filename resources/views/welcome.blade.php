@extends('layouts.master')

@section('title', 'Vitality | Home Page')

@section('content')

<section>
    <div class="h-[350px] bg-no-repeat bg-cover bg-[url('../../public/images/index-banner.png')]">
        <div class="flex flex-col h-full justify-center p-[190px]">
            <h1 class="font-[900] text-[40px]">
                Empower your health,<br> 
                Revitalize your life
            </h1>
            <div class="mt-[16px]">
                <button class="bg-blue rounded-[25px] p-[16px] ease-in duration-200 hover:bg-[#69c4f9]">
                    @auth
                    <a href="{{ url('/services')}}" class="text-[20px] font-semibold">Book your appointment</a>    
                    @else
                    <a href="{{ route('login')}}" class="text-[20px] font-semibold">Book your appointment</a>
                    @endauth             
                </button>
            </div>
        </div>
    </div>
</section>
<section id="section">
    <div>
        <h1>Services</h1>
    </div>
    <div>
        <div>
            <x-iconpark-sport class="w-9 h-9"/>
        </div>
    </div>
</section>

@endsection