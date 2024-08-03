@extends('layouts.master')

@section('title', 'Vitality | Home Page')

@section('content')

<section>
    <div class="h-[350px] bg-no-repeat bg-cover bg-center bg-[url('../../public/images/index-banner.webp')]">
        <div class="flex flex-col h-full justify-center p-[190px] text-[#222222]">
            <h1 class="font-[900] text-[40px]">
                Empower your health,<br>
                Revitalize your life
            </h1>
            <div class="mt-[16px]">
                <button class="bg-blue rounded-[25px] p-[16px] ease-in duration-200 hover:bg-[#69c4f9]">
                    @auth
                    <a href="{{ url('/services') }}" class="text-[20px] font-semibold">Book your appointment</a>
                    @else
                    <a href="{{ route('login') }}" class="text-[20px] font-semibold">Book your appointment</a>
                    @endauth
                </button>
            </div>
        </div>
    </div>
</section>


<section id="about">This is the about section.</section>
<section id="services" class="pt-[40px] pb-[100px] bg-yellow">
    <div class="flex flex-col items-center justify-center text-[#222222]">
        <div class="pb-8">
            <h1 class="text-[24px] font-[900]">Services</h1>
        </div>
        <div class="grid grid-cols-4 grid-rows-2 font-[800] gap-y-16">
            <div class="flex flex-col items-center justify-center">
                <img src="{{ asset('icons/sport_physiotherapy.png') }}" alt="Sports Physiotherapy Icon" class="w-[50px] h-[50px] pb-3">
                <p>Sports Physiotherapy</p>
            </div>
            <div class="flex flex-col items-center justify-center">
                <img src="{{ asset('icons/chiropractic.png') }}" alt="Chiropractor Icon" class="w-[50px] h-[50px] pb-3">
                <p>Chiropractic Therapy</p>
                >>>>>>> Stashed changes
            </div>
            <div class="flex flex-col items-center justify-center">
                <img src="{{ asset('icons/massage.png') }}" alt="Massage Icon" class="w-[50px] h-[50px] pb-3">
                <p>Massage Therapy</p>
            </div>
            <div class="flex flex-col items-center justify-center">
                <img src="{{ asset('icons/physiotherapy.png') }}" alt="Physiotherapy Icon" class="w-[50px] h-[50px] pb-3">
                <p>Physiotherapy</p>
            </div>
            <div class="flex flex-col items-center justify-center">
                <img src="{{ asset('icons/nutritionist.png') }}" alt="Nutritionist Icon" class="w-[50px] h-[50px] pb-3">
                <p>Nutritionist Consultations</p>
            </div>
            <div class="flex flex-col items-center justify-center">
                <img src="{{ asset('icons/shockwave_therapy.png') }}" alt="Acupunture Icon" class="w-[50px] h-[50px] pb-3">
                <p>Acupunture</p>
            </div>
            <div class="flex flex-col items-center justify-center">
                <img src="{{ asset('icons/acupunture.png') }}" alt="Acupunture Icon" class="w-[50px] h-[50px] pb-3">
                <p>Acupuncture</p>
            </div>

            <div class="flex flex-col items-center justify-center">
                <img src="{{ asset('icons/shockwave_therapy.png') }}" alt="Shockwave Therapy Icon" class="w-[50px] h-[50px] pb-3">
                <p>Shockwave Therapy</p>
            </div>
            <div class="flex flex-col items-center justify-center">
                <img src="{{ asset('icons/aquatherapy.png') }}" alt="Sports Physiotherapy Icon" class="w-[50px] h-[50px] pb-3">
                <p>Aquatherapy</p>
            </div>
        </div>
    </div>
</section>
<section id="professionals" class="pt-[40px] pb-[100px]">
    <div class="flex flex-col items-center justify-center text-[#222222]">
        <div class="pb-8">
            <h1 class="text-[24px] font-[900]">Professionals</h1>
        </div>
        <div class="grid grid-cols-5 grid-rows-2 font-[800] gap-y-16">
            <div class="flex flex-col items-center justify-center">
            </div>
        </div>
    </div>
</section>


@endsection