<div>
    <div class="relative">
        <div class="relative min-h-screen lg:min-h-full">
            <img src="{{ asset('images/footer-img.png') }}" alt=""
                class="object-cover w-auto h-screen lg:h-full lg:w-full">
            <div class="absolute inset-0 w-full h-full bg-gradient-to-t from-black to-transparent">
            </div>
        </div>
        <div class="absolute inset-0 flex flex-col items-center justify-center gap-5 mx-3 lg:mx-0">
            <div>
                <img src="{{ asset('images/logo.png') }}" alt="" class="w-auto h-[11rem]">
            </div>
            <div class="text-[#fcd97d] text-xl lg:text-2xl font-semibold">
                Subscribe to Our
            </div>
            <div class="font-serif text-2xl text-white 2xl:text-7xl">
                Newsletter
            </div>
            <div class="text-base font-light text-center text-white lg:text-xl">
                Stay updated with the latest property listings, market insights, and real estate tips — straight to your
                inbox.
            </div>
            <div class="flex justify-center bg-transparent h-fit">
                <form action="#" method="POST"
                    class="flex items-center justify-between w-full p-2 overflow-hidden bg-white border border-yellow-400 shadow-md rounded-xl">
                    @csrf
                    <input type="email" name="email" placeholder="Enter your email address"
                        class="flex-grow lg:px-6 px-3 py-2 lg:py-4 text-base lg:text-xl 2xl:w-[30rem] text-gray-700 placeholder-gray-400 focus:outline-none"
                        required>
                    <button type="submit"
                        class="lg:px-7 py-2 px-4 lg:py-4 text-base lg:text-xl rounded-md text-gray-900 transition-all duration-300 bg-[#ecc467] hover:bg-[#b99a50] focus:outline-none">
                        Subscribe Now
                    </button>
                </form>
            </div>

        </div>
    </div>

    <div class="relative">
        <div class="absolute bg-[#181f27] lg:bg-transparent">
            <div class="border-t border-b mt-14 border-gray-400/60">
                <div class="grid grid-cols-1 gap-10 mx-3 lg:gap-40 lg:mx-20 2xl:grid-cols-3">
                    <div class="relative flex flex-col border border-white">
                        <img src="{{ asset('images/footer-box.png') }}" alt=""
                            class="object-cover w-full h-full">
                        <div class="absolute flex flex-col justify-between h-full p-5 lg:p-12">
                            <div class="text-base lg:text-[22px] leading-relaxed">
                                GoldenKey Real Estate and Development is a trusted real estate company dedicated to
                                helping
                                clients
                                buy, sell, and invest in properties with confidence.
                            </div>
                            <div class="flex gap-6">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="text-[#ecc467] size-8">
                                        <path fill="currentColor"
                                            d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95" />
                                    </svg>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="text-[#ecc467] size-8">
                                        <path fill="currentColor"
                                            d="M13.028 2c1.125.003 1.696.009 2.189.023l.194.007c.224.008.445.018.712.03c1.064.05 1.79.218 2.427.465c.66.254 1.216.598 1.772 1.153a4.9 4.9 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428c.012.266.022.487.03.712l.006.194c.015.492.021 1.063.023 2.188l.001.746v1.31a79 79 0 0 1-.023 2.188l-.006.194c-.008.225-.018.446-.03.712c-.05 1.065-.22 1.79-.466 2.428a4.9 4.9 0 0 1-1.153 1.772a4.9 4.9 0 0 1-1.772 1.153c-.637.247-1.363.415-2.427.465l-.712.03l-.194.006c-.493.014-1.064.021-2.189.023l-.746.001h-1.309a78 78 0 0 1-2.189-.023l-.194-.006a63 63 0 0 1-.712-.031c-1.064-.05-1.79-.218-2.428-.465a4.9 4.9 0 0 1-1.771-1.153a4.9 4.9 0 0 1-1.154-1.772c-.247-.637-.415-1.363-.465-2.428l-.03-.712l-.005-.194A79 79 0 0 1 2 13.028v-2.056a79 79 0 0 1 .022-2.188l.007-.194c.008-.225.018-.446.03-.712c.05-1.065.218-1.79.465-2.428A4.9 4.9 0 0 1 3.68 3.678a4.9 4.9 0 0 1 1.77-1.153c.638-.247 1.363-.415 2.428-.465c.266-.012.488-.022.712-.03l.194-.006a79 79 0 0 1 2.188-.023zM12 7a5 5 0 1 0 0 10a5 5 0 0 0 0-10m0 2a3 3 0 1 1 .001 6a3 3 0 0 1 0-6m5.25-3.5a1.25 1.25 0 0 0 0 2.5a1.25 1.25 0 0 0 0-2.5" />
                                    </svg>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="text-[#ecc467] size-8">
                                        <path fill="currentColor"
                                            d="m17.687 3.063l-4.996 5.711l-4.32-5.711H2.112l7.477 9.776l-7.086 8.099h3.034l5.469-6.25l4.78 6.25h6.102l-7.794-10.304l6.625-7.571zm-1.064 16.06L5.654 4.782h1.803l10.846 14.34z" />
                                    </svg>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="text-[#ecc467] size-8">
                                        <path fill="currentColor"
                                            d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93zM6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-10 space-y-5">
                        <div class="flex flex-col items-start justify-center gap-4">
                            <div class="font-serif text-2xl text-white">
                                Quick Links
                            </div>
                            <div class="grid grid-cols-1 gap-y-2 gap-x-20 2xl:grid-cols-2">
                                <a href="#" class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 24 24" class="text-[#ECC467]">
                                        <path fill="currentColor" d="M18.4 12.5L9 18.38L8 19V6zm-1.9 0L9 7.8v9.4z" />
                                    </svg>
                                    <span class="text-lg text-white">
                                        Home
                                    </span>
                                </a>
                                <a href="#" class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 24 24" class="text-[#ECC467]">
                                        <path fill="currentColor" d="M18.4 12.5L9 18.38L8 19V6zm-1.9 0L9 7.8v9.4z" />
                                    </svg>
                                    <span class="text-lg text-white">
                                        About Us
                                    </span>
                                </a>
                                <a href="#" class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 24 24" class="text-[#ECC467]">
                                        <path fill="currentColor" d="M18.4 12.5L9 18.38L8 19V6zm-1.9 0L9 7.8v9.4z" />
                                    </svg>
                                    <span class="text-lg text-white">
                                        Unit Listing
                                    </span>
                                </a>
                                <a href="#" class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 24 24" class="text-[#ECC467]">
                                        <path fill="currentColor" d="M18.4 12.5L9 18.38L8 19V6zm-1.9 0L9 7.8v9.4z" />
                                    </svg>
                                    <span class="text-lg text-white">
                                        FAQs
                                    </span>
                                </a>
                                <a href="#" class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 24 24" class="text-[#ECC467]">
                                        <path fill="currentColor" d="M18.4 12.5L9 18.38L8 19V6zm-1.9 0L9 7.8v9.4z" />
                                    </svg>
                                    <span class="text-lg text-white">
                                        Contact Us
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col items-start justify-center gap-4">
                            <div class="font-serif text-2xl text-white">
                                Legal
                            </div>
                            <div class="grid grid-cols-1 gap-y-5 gap-x-20 2xl:grid-cols-2">
                                <a href="#" class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 24 24" class="text-[#ECC467]">
                                        <path fill="currentColor" d="M18.4 12.5L9 18.38L8 19V6zm-1.9 0L9 7.8v9.4z" />
                                    </svg>
                                    <span class="text-lg text-white">
                                        Terms & Conditions
                                    </span>
                                </a>
                                <a href="#" class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                        viewBox="0 0 24 24" class="text-[#ECC467]">
                                        <path fill="currentColor" d="M18.4 12.5L9 18.38L8 19V6zm-1.9 0L9 7.8v9.4z" />
                                    </svg>
                                    <span class="text-lg text-white">
                                        Privacy Policy
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="py-10 space-y-5">
                        <div class="flex flex-col items-start justify-center gap-4">
                            <div class="font-serif text-2xl text-white">
                                Get in Touch
                            </div>
                            <div class="flex items-center gap-6">
                                <div class="p-2 bg-white rounded-full shadow-sm shadow-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12"
                                        class="text-black size-6">
                                        <path fill="currentColor"
                                            d="M6 .5A4.5 4.5 0 0 1 10.5 5c0 1.863-1.42 3.815-4.2 5.9a.5.5 0 0 1-.6 0C2.92 8.815 1.5 6.863 1.5 5A4.5 4.5 0 0 1 6 .5m0 3a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3" />
                                    </svg>
                                </div>
                                <div class="text-xl text-white">
                                    3A Siargao Tower Palm Beach West
                                </div>
                            </div>
                            <div class="flex items-center gap-5">
                                <div class="p-2 bg-white rounded-full shadow-sm shadow-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="text-black size-6">
                                        <path fill="currentColor"
                                            d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02z" />
                                    </svg>
                                </div>
                                <div class="text-xl text-white">
                                    09989711881
                                </div>
                            </div>
                            <div class="flex items-center gap-5">
                                <div class="p-2 bg-white rounded-full shadow-sm shadow-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="text-black size-6">
                                        <path fill="currentColor"
                                            d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 4l-8 5l-8-5V6l8 5l8-5z" />
                                    </svg>
                                </div>
                                <div class="text-xl text-white">
                                    goldenkey.realestate777@gmail.com
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 text-lg text-center text-white">
                © GoldenKey Real Estate and Development 2025. Designed and Developed by <a
                    href="https://rwebsolutions.com.ph/" class="text-[#ff8000] font-semibold">R Web Solutions
                    Corp.</a>
            </div>
        </div>

        <div class="hidden lg:flex">
            <img src="{{ asset('images/footer-rectangle.png') }}" alt=""
                class="w-full h-full mix-blend-plus-darker">
        </div>
    </div>
</div>
