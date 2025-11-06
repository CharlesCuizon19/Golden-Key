@php
    $banners = [
        (object) [
            'title' => 'Unlock Hassle-Free Property Management',
            'img' => 'images/homepage-banner.png',
        ],
        (object) [
            'title' => 'Simplify Your Property Management Experience',
            'img' => 'images/homepage-banner2.jpg',
        ],
        (object) [
            'title' => 'Experience Effortless Property Ownership',
            'img' => 'images/homepage-banner3.jpg',
        ],
    ];
@endphp

<div class="hidden lg:flex h-[65rem] w-auto">
    <div class="swiper BannerSwiper max-w-[100%]">
        <div class="swiper-wrapper">
            @foreach ($banners as $item)
                <div class="swiper-slide">
                    <img src="{{ asset($item->img) }}" alt="" class="w-full h-auto">
                </div>
            @endforeach
        </div>
    </div>

    <div class="absolute z-50 flex gap-4 right-40 bottom-10">
        <button class="p-2 border rounded-lg customized-button-prev border-white/70 bg-white/10 group">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                class="text-white transition duration-300 size-10 group-hover:-translate-x-1">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="1.5" d="m14 7l-5 5l5 5" />
            </svg>
        </button>
        <button class="p-2 border rounded-lg customized-button-next bg-white/10 border-white/70 group">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                class="text-white transition duration-300 size-10 group-hover:translate-x-1">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="1.5" d="m10 17l5-5l-5-5" />
            </svg>
        </button>
    </div>

    <div class="absolute top-0 left-0 z-40">
        <div class="relative transition-all duration-1000 ease-in-out floater">
            <div class="absolute z-[9999] top-[1rem] left-32 text-lg font-bold text-[#f37021]">
                <img src="{{ asset('images/logo.png') }}" alt="" class="w-auto h-[110px]">
            </div>
            <img src="{{ asset('images/floater.png') }}" alt="" class="w-auto ">

            <div class="absolute top-0 flex items-center justify-center h-full mt-10 left-32">
                <section
                    class="py-20 text-white transition-all duration-1000 ease-in-out translate-x-10 opacity-0 form-section">
                    <div class="max-w-4xl mx-auto">
                        <div class="swiper bannerTitleSwiper">
                            <div class="swiper-wrapper">
                                @foreach ($banners as $item)
                                    <div class=" swiper-slide">
                                        <h2 class="mb-6 font-serif text-5xl font-medium leading-loose md:text-6xl">
                                            {{ $item->title }}
                                        </h2>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Subtitle -->
                        <p class="mb-12 text-lg text-gray-300">
                            Looking for a property? Fill in the form for inquiries.
                        </p>

                        <!-- Form -->
                        <form class="grid gap-8  md:grid-cols-2 w-[70%]">
                            <!-- Full Name -->
                            <div>
                                <label class="block mb-1 text-lg font-medium text-gray-200">
                                    Full Name <span class="text-[#f5c25b]">*</span>
                                </label>
                                <input type="text" placeholder="Enter your full name"
                                    class="w-full bg-transparent border-b border-gray-500 focus:border-[#f5c25b] outline-none py-2 text-gray-100 placeholder-gray-500" />
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block mb-1 text-lg font-medium text-gray-200">
                                    Email Address <span class="text-[#f5c25b]">*</span>
                                </label>
                                <input type="email" placeholder="Enter your email address"
                                    class="w-full bg-transparent border-b border-gray-500 focus:border-[#f5c25b] outline-none py-2 text-gray-100 placeholder-gray-500" />
                            </div>

                            <!-- Phone -->
                            <div>
                                <label class="block mb-1 text-lg font-medium text-gray-200">
                                    Phone No. <span class="text-[#f5c25b]">*</span>
                                </label>
                                <input type="text" placeholder="Enter your phone no."
                                    class="w-full bg-transparent border-b border-gray-500 focus:border-[#f5c25b] outline-none py-2 text-gray-100 placeholder-gray-500" />
                            </div>

                            <!-- Interested In -->
                            <div>
                                <label class="block mb-1 text-lg font-medium text-gray-200">
                                    Interested In <span class="text-[#f5c25b]">*</span>
                                </label>
                                <input type="text" placeholder="Enter your interest"
                                    class="w-full bg-transparent border-b border-gray-500 focus:border-[#f5c25b] outline-none py-2 text-gray-100 placeholder-gray-500" />
                            </div>

                            <!-- Message (full width) -->
                            <div class="md:col-span-2">
                                <label class="block mb-1 text-lg font-medium text-gray-200">
                                    Message <span class="text-[#f5c25b]">*</span>
                                </label>
                                <textarea rows="4" placeholder="Enter your message"
                                    class="w-full bg-transparent border-b border-gray-500 focus:border-[#f5c25b] outline-none py-2 resize-none text-gray-100 placeholder-gray-500"></textarea>
                            </div>

                            <!-- Submit -->
                            <div class="md:col-span-2">
                                <button type="submit"
                                    class="flex items-center gap-2 bg-[#ecc467] hover:bg-[#e6b74e] text-black font-medium text-lg px-6 py-3 rounded-md transition">
                                    Submit Inquiry
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-5">
                                        <defs>
                                            <path id="SVG2jlUvrhl"
                                                d="M12.97 2.67a.5.5 0 0 0-.64-.64l-11 4a.5.5 0 0 0-.016.934l4.433 1.773l2.9-3.09l.707.707l-2.98 3.176l1.662 4.156a.5.5 0 0 0 .934-.015z" />
                                        </defs>
                                        <g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd">
                                            <use href="#SVG2jlUvrhl" />
                                            <use href="#SVG2jlUvrhl" />
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

{{-- MOBILE VIEW --}}
<div class="flex lg:hidden">
    <div class="mt-[68px]">
        <!-- Swiper Container -->
        <div class="max-w-screen-md min-h-full swiper mobileSwiper">
            <div class="swiper-wrapper">
                @foreach ($banners as $item)
                    <div class="relative swiper-slide">
                        <img src="{{ asset($item->img) }}" alt="" class="object-cover w-full h-auto ">
                        <div class="absolute top-0 left-0">
                            <div class="relative">
                                <div class="absolute top-[3rem] flex items-center justify-center h-full mt-10 left-5">
                                    <section class="py-20 text-[#20272D]">
                                        <div class="">
                                            <div
                                                class="w-[20rem] mb-6 font-serif text-2xl font-medium leading-tight md:text-6xl">
                                                {{ $item->title }}
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- NAV BUTTONS -->
            <div class="absolute z-20 flex gap-4 right-10 bottom-10">
                <div class="mobile-button-prev !static p-2 border rounded-lg border-white/70 bg-white/10 group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="text-white transition duration-300 size-6 group-hover:-translate-x-1">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5" d="m14 7l-5 5l5 5" />
                    </svg>
                </div>
                <div class="mobile-button-next !static p-2 border rounded-lg border-white/70 bg-white/10 group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="text-white transition duration-300 size-6 group-hover:translate-x-1">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5" d="m10 17l5-5l-5-5" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.bannerTitleSwiper', {
            slidesPerView: 1,
            allowTouchMove: false,
            simulateTouch: false,
            keyboard: {
                enabled: false,
            },
            speed: 1000,
            loop: true,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.customized-button-next',
                prevEl: '.customized-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const bannerSwiper = new Swiper('.BannerSwiper', {
            slidesPerView: 1,
            allowTouchMove: false,
            simulateTouch: false,
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.customized-button-next',
                prevEl: '.customized-button-prev',
            },
            on: {
                init: function() {
                    // 👇 Fade in title/form on first load
                    const formSection = document.querySelector('.form-section');
                    setTimeout(() => {
                        formSection.classList.remove('opacity-0', 'translate-x-10');
                        formSection.classList.add('opacity-100', 'translate-x-0');
                    }, 500); // delay for smoother entry after banner image loads
                },
                slideChangeTransitionStart: function() {
                    const floater = document.querySelector('.floater');
                    const formSection = document.querySelector('.form-section');

                    floater.classList.add('translate-x-[-1300px]', 'opacity-70');
                    formSection.classList.add('opacity-0', 'translate-x-10');
                },
                slideChangeTransitionEnd: function() {
                    const floater = document.querySelector('.floater');
                    const formSection = document.querySelector('.form-section');

                    setTimeout(() => {
                        floater.classList.remove('translate-x-[-1300px]', 'opacity-70');
                    }, 200);

                    setTimeout(() => {
                        formSection.classList.remove('opacity-0', 'translate-x-10');
                        formSection.classList.add('opacity-100', 'translate-x-0');
                    }, 600);
                }
            }
        });

        // Initialize Swiper properly (trigger init event)
        bannerSwiper.init();

        // Sync title swiper
        const titleSwiper = new Swiper('.bannerTitleSwiper', {
            slidesPerView: 1,
            allowTouchMove: false,
            simulateTouch: false,
            loop: true,
            navigation: {
                nextEl: '.customized-button-next',
                prevEl: '.customized-button-prev',
            },
        });

        bannerSwiper.on('slideChange', function() {
            titleSwiper.slideToLoop(bannerSwiper.realIndex);
        });
    });

    new Swiper(".mobileSwiper", {
        loop: true,
        slidesPerView: 1,
        speed: 1000,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".mobile-button-next",
            prevEl: ".mobile-button-prev",
        },
        effect: "slide",
    });
</script>
