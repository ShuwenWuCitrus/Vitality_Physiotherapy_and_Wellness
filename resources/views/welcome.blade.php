@extends('layouts.master')
@section('title', 'Vitality | Home Page')

@section('content')

<section>
    <div class="h-[350px] bg-no-repeat bg-cover bg-center bg-[url('../../public/images/index-banner.webp')]">
        <div class="flex flex-col h-full justify-center p-4 sm:p-8 md:p-16 lg:p-[190px] text-[#222222]">
            <h1 class="font-[900] text-2xl sm:text-3xl md:text-[40px]">
                Empower your health,<br>
                Revitalize your life
            </h1>
            <div class="mt-4 sm:mt-[16px]">
                <button class="bg-blue rounded-[25px] p-3 sm:p-[16px] ease-in duration-200 hover:bg-[#69c4f9]">
                    @auth
                    <a href="{{ url('/services') }}" class="text-base sm:text-[20px] font-semibold">Book your appointment</a>
                    @else
                    <a href="{{ route('login') }}" class="text-base sm:text-[20px] font-semibold">Book your appointment</a>
                    @endauth
                </button>
            </div>
        </div>
    </div>
</section>

<section id="services" class="pt-8 sm:pt-[40px] pb-16 sm:pb-[100px] bg-yellow px-4 sm:px-8">
    <div class="flex flex-col items-center justify-center text-[#222222]">
        <div class="pb-4 sm:pb-8">
            <h1 class="text-xl sm:text-[24px] font-[900]">Services</h1>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 gap-8 font-[800] text-center">
            @foreach ($services as $service)
                <div class="flex flex-col items-center justify-center">
                    <div>
                        <img src="{{ asset('icons/' . $service['name'] . '.webp') }}"
                            class="w-[50px] h-[50px] pb-2 sm:pb-3" alt="">
                    </div>
                    <div>
                        <p class="py-2 sm:py-3 font-bold text-[14px]"> {{ $service['name'] }} </p>
                    </div>                    
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="professionals" class="pt-8 sm:pt-[40px] pb-16 sm:pb-[100px]">
    <div class="flex flex-col items-center justify-center text-[#222222]">
        <div class="pb-4 sm:pb-8">
            <h1 class="text-xl sm:text-[24px] font-[900]">Professionals</h1>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8">
            @foreach ($professionals as $professional)
                <div class="flex flex-col items-center justify-start h-full">
                    <div>
                        <p class="py-2 sm:py-3 font-bold text-xs"> {{ $professional['name'] }} </p>
                    </div>
                    <div>
                        <img src="{{ asset('images/' . $professional['name'] . '.webp') }}"
                            class="w-[150px] h-[150px] pb-2 sm:pb-3" alt="">
                    </div>
                    <div>
                        <p>
                            <ul class="text-xs text-center">
                                @foreach ($professional['services'] as $index => $service)
                                    <li>
                                        {{ $service['name']}}
                                        @if ($index < count($professional['services']) - 1)
                                            <span>,</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="about" class="pt-8 sm:pt-[40px] pb-16 sm:pb-[100px] bg-yellow">
    <div class="flex flex-col items-center justify-center text-[#222222]">
        <div class="pb-4 sm:pb-8">
            <h1 class="text-xl sm:text-[24px] font-[900]">About Us</h1>
        </div>
        <div class="max-w-[800px] text-center text-sm sm:text-[16px] px-4 sm:px-0">
            <p>
                At Vitality, we believe in empowering your health and revitalizing your life. Our dedicated team of professionals is here to provide personalized services designed to meet your unique needs. Whether you're looking to improve your physical health, mental well-being, or overall lifestyle, we have the expertise and resources to help you achieve your goals.
            </p>
            <p class="mt-4">
                Our mission is to create a supportive and nurturing environment where you can thrive. We are committed to delivering the highest quality of care and ensuring that each visit leaves you feeling rejuvenated and inspired.
            </p>
        </div>
    </div>
</section>

@endsection