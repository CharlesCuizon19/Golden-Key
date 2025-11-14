@php
    $properties = [
        (object) [
            'place' => 'Davao',
            'propertyCount' => '81',
            'img' => 'images/Davao.png',
        ],
        (object) [
            'place' => 'Antipolo',
            'propertyCount' => '31',
            'img' => 'images/antipolo.png',
        ],
        (object) [
            'place' => 'Cebu',
            'propertyCount' => '16',
            'img' => 'images/cebu.png',
        ],
        (object) [
            'place' => 'Bacolod',
            'propertyCount' => '78',
            'img' => 'images/bacolod.png',
        ],
        (object) [
            'place' => 'Manila',
            'propertyCount' => '89',
            'img' => 'images/manila.png',
        ],
        (object) [
            'place' => 'Test',
            'propertyCount' => '89',
            'img' => 'images/manila.png',
        ],
    ];
@endphp

<div class="bg-[#f9f9f9] py-24 relative overflow-hidden">
    <div class="container relative z-10 flex flex-col gap-10 mx-auto">
        <div class="flex flex-col items-center justify-center gap-10">
            <x-title title="Discover More" />
            <div class="font-serif 2xl:text-7xl text-xl text-[#20272d]">
                Find Properties in These Cities
            </div>
        </div>

        <!-- Swiper Container -->
        <div class="swiper myPropertiesSwiper max-w-[100%]">
            <div class="swiper-wrapper">
                @foreach ($properties as $item)
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center justify-center gap-5">
                            <div>
                                <img src="{{ asset($item->img) }}" alt="" class="rounded-full">
                            </div>
                            <div class="text-[#20272d] text-2xl font-semibold">
                                {{ $item->place }}
                            </div>
                            <div class="text-[#A58234] font-thin text-lg">
                                {{ $item->propertyCount }} Properties
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="absolute inset-0 flex items-center justify-center -z-10">
            <img src="{{ asset('images/discover-more-bg.png') }}" alt="">
        </div>
    </div>
    <div class="absolute w-full bottom-7">
        <div class="swiper-pagination"></div>
    </div>

    <!-- Navigation Buttons -->
    <div class="hidden 2xl:flex absolute w-full top-[55%]">
        <div class="flex justify-between w-full">
            <button class="p-2 border rounded-lg border-[#D3AC4E]/70 bg-white/10 group ml-24 customized-button-prev">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    class="text-[#D3AC4E] transition duration-300 size-10 group-hover:-translate-x-1">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5" d="m14 7l-5 5l5 5" />
                </svg>
            </button>
            <button class="p-2 border rounded-lg bg-white/10 border-[#D3AC4E]/70 group mr-24 customized-button-next">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    class="text-[#D3AC4E] transition duration-300 size-10 group-hover:translate-x-1">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5" d="m10 17l5-5l-5-5" />
                </svg>
            </button>
        </div>
    </div>
</div>

{{-- <style>
    .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background: #d9d9d9;
        opacity: 0.6;
    }

    .swiper-pagination-bullet-active {
        background: #ecc467;
        opacity: 1;
    }
</style> --}}


<!-- Swiper Init -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.myPropertiesSwiper', {
            slidesPerView: 5,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: '.customized-button-next',
                prevEl: '.customized-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true, // 👈 allows clicking on bullets
            },
            breakpoints: {
                320: {
                    slidesPerView: 1
                },
                640: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                },
                1280: {
                    slidesPerView: 4
                },
                1536: {
                    slidesPerView: 5
                },
            },
        });
    });
</script>
