@props([
    'property' => [],
])

<div x-data="{ open: true }" x-effect="document.body.classList.toggle('overflow-hidden', open)" class="relative z-50">

    <!-- Button -->
    <button @click="open = true" class="bg-[#ecc467] w-full p-5 rounded-lg hover:bg-[#f4d16e] transition duration-300">
        <div class="flex items-center justify-center w-full gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-5">
                <defs>
                    <path id="SVG2jlUvrhl" d=" M12.97 2.67a.5.5 0 0 0-.64-.64l-11 4a.5.5 0 0 0-.016.934l4.433
        1.773l2.9-3.09l.707.707l-2.98 3.176l1.662 4.156a.5.5 0 0 0 .934-.015z" />
                </defs>
                <g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd">
                    <use href="#SVG2jlUvrhl" />
                    <use href="#SVG2jlUvrhl" />
                </g>
            </svg>
            <span class="text-xl text-center">
                Inquire Now
            </span>
        </div>
    </button>

    <!-- ✅ Teleport the actual modal into body -->
    <template x-teleport="body">
        <div x-show="open" x-transition x-cloak class="fixed inset-0 z-[9999] flex items-center justify-center p-4"
            aria-modal="true">
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" @click="open = false">
            </div>

            <!-- Modal box -->
            <div @click.stop x-transition.scale.origin.center
                class="relative z-10 w-full max-w-4xl max-h-[90%] overflow-y-auto bg-[#101317] text-gray-100 border border-gray-700 rounded-xl shadow-2xl">
                <!-- Header -->
                <div class="sticky top-0 flex items-center justify-between px-6 py-4 bg-[#1a2127]">
                    <h2 class="text-2xl font-semibold text-white">Direct Inquiry</h2>
                    <button @click="open = false" class="text-2xl leading-none text-gray-400 hover:text-white">
                        ✕
                    </button>
                </div>

                <!-- Body -->
                <form class="p-6 space-y-5">
                    <div class="grid grid-cols-1 xl:grid-cols-2">
                        <div class="relative">
                            <div class="overflow-hidden rounded-lg">
                                <img src="{{ asset($property->image) }}" alt="{{ $property->name }}" loading="lazy"
                                    class="w-full h-[15rem] text-center object-cover transition duration-500 group-hover:scale-105">
                            </div>
                            <div
                                class="absolute top-3 left-3 px-4 py-2 text-sm text-black rounded-lg 2xl:text-base {{ $property->status === 'For Sale'
                                    ? 'bg-[#9dff00]'
                                    : ($property->status === 'For Rent'
                                        ? 'bg-[#00e0ff]'
                                        : 'bg-[#f6ff00]') }}">
                                {{ $property->status }}
                            </div>
                        </div>
                        <div class="flex flex-col justify-between">
                            <div class="px-4 py-2 text-sm text-[#20272D] bg-[#e6e6e6] rounded-full 2xl:text-lg">
                                {{ $property->type }}
                            </div>
                            <div class="flex items-center gap-5 text-[#656565]">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <g fill="currentColor">
                                            <path
                                                d="M3 6a1 1 0 0 1 .993.883L4 7v6h6V8a1 1 0 0 1 .883-.993L11 7h8a3 3 0 0 1 2.995 2.824L22 10v8a1 1 0 0 1-1.993.117L20 18v-3H4v3a1 1 0 0 1-1.993.117L2 18V7a1 1 0 0 1 1-1" />
                                            <path d="M7 8a2 2 0 1 1-1.995 2.15L5 10l.005-.15A2 2 0 0 1 7 8" />
                                        </g>
                                    </svg>
                                    <span class="text-sm font-bold 2xl:text-xl">{{ $property->bedrooms }}</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                        <path fill="currentColor"
                                            d="M3.5 4.135a1.635 1.635 0 0 1 3.153-.607l.144.358a4.1 4.1 0 0 0-1.38 1.774a4.18 4.18 0 0 0-.02 3.107a.75.75 0 0 0 .995.413l5.96-2.566a.75.75 0 0 0 .402-.963a3.97 3.97 0 0 0-2.132-2.213a3.84 3.84 0 0 0-2.466-.192l-.11-.275A3.135 3.135 0 0 0 2 4.135V11h-.25a.75.75 0 0 0 0 1.5H2v.355c0 .375 0 .595.016.84c.142 2.237 1.35 4.302 3.102 5.652l-.039.068l-1 2a.75.75 0 0 0 1.342.67l.968-1.935a7.4 7.4 0 0 0 2.58.765c.245.025.394.03.648.04h.007c.74.028 1.464.045 2.126.045s1.386-.017 2.126-.045h.007c.254-.01.404-.015.648-.04a7.4 7.4 0 0 0 2.58-.765l.968 1.936a.75.75 0 0 0 1.342-.671l-1-2l-.038-.068c1.751-1.35 2.96-3.416 3.102-5.652c.015-.245.015-.465.015-.84v-.038c0-.06 0-.123-.004-.18a2 2 0 0 0-.014-.137h.268a.75.75 0 0 0 0-1.5H3.5z" />
                                    </svg>
                                    <span class="text-sm font-bold 2xl:text-xl">{{ $property->bathrooms }}</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="1.5"
                                            d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                                    </svg>
                                    <span class="text-sm font-bold 2xl:text-xl">{{ $property->area }}
                                        sqm</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block mb-1 text-lg font-bold text-gray-300">Full Name <span
                                    class="text-[#edc45b]">*</span></label>
                            <input type="text" placeholder="Enter your full name"
                                class="w-full px-3 py-2 text-lg text-gray-100 bg-transparent border-b border-gray-600 focus:border-[#edc45b] focus:ring-0">
                        </div>

                        <div>
                            <label class="block mb-1 text-lg font-bold text-gray-300">Phone No. <span
                                    class="text-[#edc45b]">*</span></label>
                            <input type="text" placeholder="Enter your phone no."
                                class="w-full px-3 py-2 text-lg text-gray-100 bg-transparent border-b border-gray-600 focus:border-[#edc45b] focus:ring-0">
                        </div>

                        <div>
                            <label class="block mb-1 text-lg font-bold text-gray-300">Message <span
                                    class="text-[#edc45b]">*</span></label>
                            <textarea rows="3" placeholder="Enter your message"
                                class="w-full px-3 py-2 text-lg text-gray-100 bg-transparent border-b border-gray-600 focus:border-[#edc45b] focus:ring-0"></textarea>
                        </div>
                    </div>

                    <div class="space-y-1 text-base text-gray-400">
                        <p>By clicking <span class="font-medium text-white">"Submit Inquiry"</span>, you agree that:</p>
                        <ul class="ml-3 list-disc list-inside">
                            <li>You have read, understood and accepted the <a href="#"
                                    class="text-[#edc45b] hover:underline">Privacy Policy</a>.</li>
                            <li>You agree to be contacted by Golden Key Real Estate and Development.</li>
                            <li>You are at least 18 years old.</li>
                        </ul>
                    </div>

                    <div class="flex items-center gap-3 pt-4 border-t border-gray-700">
                        <button type="submit" @click="open = false"
                            class=" gap-2 bg-[#ecc467]  w-full hover:bg-[#e6b74e] text-black font-medium text-lg px-6 py-3 rounded-md transition">
                            <div class="flex items-center justify-center w-full gap-3">
                                <span>
                                    Submit Inquiry
                                </span>
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
                            </div>
                        </button>
                        <button type="button"
                            class="px-6 py-4 w-full text-lg text-[#091A39] font-medium bg-[#e2e2e2] border border-gray-600 rounded-md"
                            @click="open = false">
                            Cancel
                        </button>
                    </div>
                </form>

                <div class="absolute inset-0 w-full h-full mt-16 -z-10">
                    <img src="{{ asset('images/modal-bg.png') }}" alt=""
                        class="object-cover w-full h-full" />
                </div>

            </div>
        </div>
    </template>
</div>
