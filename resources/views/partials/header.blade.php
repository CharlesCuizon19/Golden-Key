<div class="fixed z-20 w-full xl:absolute">
    <div class="relative flex flex-col drop-shadow-md">
        <div class="bg-[#ecc467] py-2 w-full lg:flex items-end justify-end hidden">
            <div class="xl:mr-[1rem] 2xl:mr-[7rem] flex items-end justify-end gap-10 ">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02z" />
                    </svg>
                    <div class="text-lg">
                        09989711881
                    </div>
                </div>
                <div class="text-xl">
                    •
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 4l-8 5l-8-5V6l8 5l8-5z" />
                    </svg>
                    <div class="text-lg">
                        goldenkey.realestate777@gmail.com
                    </div>
                </div>
                <div class="text-xl">
                    •
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M9.156 14.544C10.899 13.01 14 9.876 14 7A6 6 0 0 0 2 7c0 2.876 3.1 6.01 4.844 7.544a1.736 1.736 0 0 0 2.312 0M6 7a2 2 0 1 1 4 0a2 2 0 0 1-4 0" />
                    </svg>
                    <div class="text-lg">
                        3A Siargao Tower Palm Beach West
                    </div>
                </div>
            </div>
        </div>
        <header x-data="{ open: false }" class="w-full bg-white border-b border-gray-200">
            <nav class="flex items-center justify-between lg:justify-end gap-10  px-6 py-4 2xl:mr-[5rem]">

                <img src="{{ asset('images/logo.png') }}" alt="" class="flex size-14 2xl:size-10 lg:hidden">

                <!-- Desktop Nav -->
                <ul class="items-center hidden space-x-12 text-lg text-gray-700 lg:flex">
                    <li>
                        <a href="{{ route('home') }}"
                            class=" hover:text-[#f37021] {{ Route::is('home') ? 'font-bold text-black' : 'font-normal' }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('about-us') }}"
                            class="hover:text-[#f37021] {{ Route::is('about-us') ? 'font-bold text-black' : 'font-normal' }}">About
                            Us</a>
                    </li>
                    <li>
                        <a href="{{ route('unit-listing.all') }}"
                            class="hover:text-[#f37021] {{ Route::is('unit-listing.*') ? 'font-bold text-black' : 'font-normal' }}">Unit
                            Listing</a>
                    </li>
                    <li><a href="{{ route('FAQs') }}"
                            class="hover:text-[#f37021] {{ Route::is('FAQs') ? 'font-bold text-black' : 'font-normal' }}">FAQs</a>
                    </li>
                    <li><a href="{{ route('contact-us') }}"
                            class="hover:text-[#f37021] {{ Route::is('contact-us') ? 'font-bold text-black' : 'font-normal' }}">Contact
                            Us</a></li>
                </ul>

                <!-- Desktop Actions -->
                <div class="items-center hidden space-x-4 lg:flex">
                    <x-direct-inquiry-modal />

                    <button class="text-gray-700 hover:text-[#f37021] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>

                <!-- Mobile Hamburger -->
                <button @click="open = !open" class="lg:hidden text-gray-700 hover:text-[#f37021] focus:outline-none">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </nav>

            <!-- Mobile Menu -->
            <div x-show="open" x-transition
                class="relative z-50 flex flex-col px-6 py-4 space-y-4 bg-white border-t border-gray-200 lg:hidden">
                <a href="{{ route('home') }}"
                    class=" hover:text-[#f37021] {{ Route::is('home') ? 'font-bold text-black' : 'font-normal' }}">Home</a>
                <a href="{{ route('about-us') }}"
                    class="hover:text-[#f37021] {{ Route::is('about-us') ? 'font-bold text-black' : 'font-normal' }}">About
                    Us</a>
                <a href="{{ route('unit-listing.all') }}"
                    class="hover:text-[#f37021] {{ Route::is('unit-listing.*') ? 'font-bold text-black' : 'font-normal' }}">Unit
                    Listing</a>
                <a href="{{ route('FAQs') }}"
                    class="hover:text-[#f37021] {{ Route::is('FAQs') ? 'font-bold text-black' : 'font-normal' }}">FAQs</a>
                <a href="{{ route('contact-us') }}"
                    class="hover:text-[#f37021] {{ Route::is('contact-us') ? 'font-bold text-black' : 'font-normal' }}">Contact
                    Us</a>
                <x-direct-inquiry-modal />
            </div>
        </header>
    </div>
</div>

<!-- Sticky Header on Scroll -->
<div x-data="{ show: false }" x-init="window.addEventListener('scroll', () => { show = window.scrollY > 50 })" x-show="show" x-transition.duration.300.opacity
    class="fixed top-0 left-0 z-50 hidden w-full bg-white shadow-md xl:flex">
    <div class="flex items-center justify-between w-full px-6 py-4 2xl:mr-[8rem]">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="flex size-16 2xl:ml-[8rem]">
        <div class="flex items-center gap-10">
            <ul class="items-center hidden space-x-16 text-lg text-gray-700 md:flex">
                <li>
                    <a href="{{ route('home') }}"
                        class="{{ Route::is('home') ? 'font-bold text-black' : 'font-normal' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('about-us') }}"
                        class="{{ Route::is('about-us') ? 'font-bold text-black' : 'font-normal' }}">
                        About Us
                    </a>
                </li>
                <li><a href="{{ route('unit-listing.all') }}"
                        class="{{ Route::is('unit-listing.*') ? 'font-bold text-black' : 'font-normal' }}">Unit
                        Listing</a></li>
                <li><a href="{{ route('FAQs') }}"
                        class="hover:text-[#f37021] {{ Route::is('FAQs') ? 'font-bold text-black' : 'font-normal' }}">FAQs</a>
                </li>
                <li><a href="{{ route('contact-us') }}"
                        class="hover:text-[#f37021] {{ Route::is('contact-us') ? 'font-bold text-black' : 'font-normal' }}">Contact
                        Us</a></li>
            </ul>

            <div class="items-center hidden space-x-4 md:flex">
                <x-direct-inquiry-modal />

                <button class="text-gray-700 hover:text-[#f37021] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>
