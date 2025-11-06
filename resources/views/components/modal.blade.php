<div x-data="{ open: true }" x-effect="document.body.classList.toggle('overflow-hidden', open)" class="relative z-50">
    <!-- Button -->
    <button @click="open = true">
        <div
            class="flex items-center gap-3 bg-[#edc45b] hover:bg-[#f4d16e] w-fit transition px-5 py-3 rounded-md cursor-pointer">
            <div class="text-base 2xl:text-xl text-[#20272D]">
                Inquire Now
            </div>
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
                class="relative z-10 w-full max-w-lg max-h-[90%] overflow-y-auto bg-[#101317] text-gray-100 border border-gray-700 rounded-xl shadow-2xl">
                <!-- Header -->
                <div
                    class="sticky top-0 flex items-center justify-between px-6 py-4 border-b border-gray-700 bg-[#101317]">
                    <h2 class="text-lg font-semibold text-white">Direct Inquiry</h2>
                    <button @click="open = false" class="text-2xl leading-none text-gray-400 hover:text-white">
                        ✕
                    </button>
                </div>

                <!-- Body -->
                <form class="p-6 space-y-5">
                    <p class="text-sm text-gray-400">Looking for a property? Fill in the form for inquiries.</p>

                    <div class="space-y-4">
                        <div>
                            <label class="block mb-1 text-sm text-gray-300">Full Name <span
                                    class="text-[#edc45b]">*</span></label>
                            <input type="text" placeholder="Enter your full name"
                                class="w-full px-3 py-2 text-sm text-gray-100 bg-transparent border border-gray-600 rounded-md focus:border-[#edc45b] focus:ring-0">
                        </div>

                        <div>
                            <label class="block mb-1 text-sm text-gray-300">Email Address <span
                                    class="text-[#edc45b]">*</span></label>
                            <input type="email" placeholder="Enter your email address"
                                class="w-full px-3 py-2 text-sm text-gray-100 bg-transparent border border-gray-600 rounded-md focus:border-[#edc45b] focus:ring-0">
                        </div>

                        <div>
                            <label class="block mb-1 text-sm text-gray-300">Phone No. <span
                                    class="text-[#edc45b]">*</span></label>
                            <input type="text" placeholder="Enter your phone no."
                                class="w-full px-3 py-2 text-sm text-gray-100 bg-transparent border border-gray-600 rounded-md focus:border-[#edc45b] focus:ring-0">
                        </div>

                        <div>
                            <label class="block mb-1 text-sm text-gray-300">Interested In <span
                                    class="text-[#edc45b]">*</span></label>
                            <input type="text" placeholder="Enter your interest"
                                class="w-full px-3 py-2 text-sm text-gray-100 bg-transparent border border-gray-600 rounded-md focus:border-[#edc45b] focus:ring-0">
                        </div>

                        <div>
                            <label class="block mb-1 text-sm text-gray-300">Message <span
                                    class="text-[#edc45b]">*</span></label>
                            <textarea rows="3" placeholder="Enter your message"
                                class="w-full px-3 py-2 text-sm text-gray-100 bg-transparent border border-gray-600 rounded-md focus:border-[#edc45b] focus:ring-0"></textarea>
                        </div>
                    </div>

                    <div class="space-y-1 text-xs text-gray-400">
                        <p>By clicking <span class="font-medium text-white">"Submit Inquiry"</span>, you agree that:</p>
                        <ul class="list-disc list-inside">
                            <li>You have read, understood and accepted the <a href="#"
                                    class="text-[#edc45b] hover:underline">Privacy Policy</a>.</li>
                            <li>You agree to be contacted by Golden Key Real Estate and Development.</li>
                            <li>You are at least 18 years old.</li>
                        </ul>
                    </div>

                    <div class="flex items-center gap-3 pt-4 border-t border-gray-700">
                        <button type="submit" @click="open = false"
                            class="flex items-center w-full gap-2 bg-[#ecc467] hover:bg-[#e6b74e] text-black font-medium text-lg px-6 py-3 rounded-md transition">
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
                        <button type="button"
                            class="px-6 py-4 w-full text-sm text-[#091A39] font-medium bg-[#e2e2e2] border border-gray-600 rounded-md"
                            @click="open = false">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </template>
</div>
