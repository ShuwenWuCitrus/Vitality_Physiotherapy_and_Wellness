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
<section id="services" class="pt-[40px] pb-[100px] bg-yellow">
    <div class="flex flex-col items-center justify-center text-[#222222]">
        <div class="pb-8">
            <h1 class="text-[24px] font-[900]">Services</h1>
        </div>
    </section>
    <section id="professionals" class="pt-[40px] pb-[100px]">
        <div class="flex flex-col items-center justify-center text-[#222222]">
            <div class="pb-8">
                <h1 class="text-[24px] font-[900]">Professionals</h1>
            </div>
            <div class="grid grid-cols-5 grid-rows-2 font-[800] gap-y-16">
                @foreach ($professionals as $professional)
                    <div class="flex flex-col items-center justify-center">
                        <div>
                            <p class="py-3"> {{ $professional['name'] }} </p>
                        </div>
                        <div>
                            <img src="{{ asset('images/' . $professional['name'] . '.webp') }}"
                                class="w-[100px] h-[100px] pb-3" alt="">
                        </div>
                        <div>
                            <p><!-- Here we need to get the service each professional has.--></p>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--@endforeach-->
        </div>
    </div>
</section>
<section id="professionals" class="pt-[40px] pb-[100px]">
    <div class="flex flex-col items-center justify-center text-[#222222]">
        <div class="pb-8">
            <h1 class="text-[24px] font-[900]">Professionals</h1>
        </div>
        <div class="grid grid-cols-5 grid-rows-2 font-[800] gap-y-16">
            @foreach ($professionals as $professional)
            <div class="flex flex-col items-center justify-center">
                <div>
                    <p class="py-3"> {{ $professional['name'] }} </p>
                </div>
                <div>
                    <img src="{{ asset('images/' . $professional['name'] . '.webp') }}" class="w-[100px] h-[100px] pb-3" alt="">
                </div>
                <div>
                    <p><!-- Here we need to get the service each professional offers--></p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
</section>


@endsection