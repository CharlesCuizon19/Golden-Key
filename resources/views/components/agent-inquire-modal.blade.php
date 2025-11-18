@props([
    'property' => null,
])
<div x-data="inquiryModal()" x-effect="document.body.classList.toggle('overflow-hidden', open)" class="relative z-40">

    <!-- Button -->
    <button @click="open = true" class="bg-[#ecc467] w-full p-5 rounded-lg hover:bg-[#f4d16e] transition duration-300">
        <div class="flex items-center justify-center w-full gap-3">
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
            <span class="text-xl text-center">Inquire Now</span>
        </div>
    </button>

    <!-- Modal -->
    <template x-teleport="body">
        <div x-show="open" x-transition x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4"
            aria-modal="true">
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" @click="open = false"></div>

            <!-- Modal box -->
            <div @click.stop x-transition.scale.origin.center
                class="relative z-10 w-full max-w-2xl max-h-[90%] overflow-y-auto bg-[#1a2127] text-gray-100 border border-gray-700 rounded-xl shadow-2xl">
                <!-- Header -->
                <div class="sticky top-0 flex items-center justify-end px-6 py-4 bg-[#1a2127]">
                    <button @click="open = false"
                        class="text-2xl leading-none text-gray-400 hover:text-white">✕</button>
                </div>

                <!-- Body -->
                <form @submit.prevent="submitForm" action="{{ route('unit_inquiries.store') }}" method="POST"
                    class="p-6 space-y-5">
                    @csrf
                    <input type="hidden" name="unit_id" value="{{ $property->id }}">

                    <div class="grid grid-cols-1 gap-5 xl:grid-cols-2">
                        <div class="relative z-10">
                            <div class="overflow-hidden rounded-lg">
                                <img src="{{ asset($property->images->first()?->image_path ?? 'images/default-property.jpg') }}"
                                    alt="{{ $property->name }}" loading="lazy"
                                    class="w-full h-[15rem] object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <div
                                class="absolute top-3 left-3 px-4 py-2 text-sm text-black rounded-lg 2xl:text-base
                                 {{ $property->status === 'for_sale' ? 'bg-[#9dff00]' : ($property->status === 'for_rent' ? 'bg-[#00e0ff]' : 'bg-[#f6ff00]') }}">
                                {{ ucfirst(str_replace('_', ' ', $property->status)) }}
                            </div>
                        </div>

                        <!-- Details -->
                        <div class="flex flex-col justify-between">
                            <div class="px-4 py-2 text-sm text-[#e6e6e6] bg-[#191919] rounded-full w-fit 2xl:text-lg">
                                {{ $property->type->name ?? $property->type }}
                            </div>

                            <div class="text-3xl font-bold">{{ $property->name }}</div>

                            <div class="flex flex-col gap-2">
                                <div class="flex items-center gap-2 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" class="size-5">
                                        <path fill="currentColor"
                                            d="M6 .5A4.5 4.5 0 0 1 10.5 5c0 1.863-1.42 3.815-4.2 5.9a.5.5 0 0 1-.6 0C2.92 8.815 1.5 6.863 1.5 5A4.5 4.5 0 0 1 6 .5m0 3a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3" />
                                    </svg>
                                    <div class="lg:text-xl">{{ $property->location_text }}</div>
                                </div>
                            </div>

                            <!-- Bedrooms & Bathrooms -->
                            <div class="flex items-center gap-5 text-gray-300 bg-[#252c32] p-5 rounded-xl">
                                @foreach ($property->features as $feature)
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <g fill="currentColor">
                                                <path
                                                    d="M3 6a1 1 0 0 1 .993.883L4 7v6h6V8a1 1 0 0 1 .883-.993L11 7h8a3 3 0 0 1 2.995 2.824L22 10v8a1 1 0 0 1-1.993.117L20 18v-3H4v3a1 1 0 0 1-1.993.117L2 18V7a1 1 0 0 1 1-1" />
                                                <path d="M7 8a2 2 0 1 1-1.995 2.15L5 10l.005-.15A2 2 0 0 1 7 8" />
                                            </g>
                                        </svg>
                                        <span class="text-sm font-bold 2xl:text-xl">
                                            {{ $feature->pivot->quantity }} {{ $feature->feature_name }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Price -->
                            <div class="flex items-center gap-1 text-[#656565] mt-3">
                                <span
                                    class="text-lg font-semibold text-[#CDA23A] 2xl:text-2xl">₱{{ $property->price }}</span>
                                <span class="text-lg 2xl:text-xl">/ {{ $property->price_status }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Inquiry Form Fields -->
                    <div class="space-y-4">
                        <div>
                            <label class="block mb-1 text-lg font-bold text-gray-300">Full Name <span
                                    class="text-[#edc45b]">*</span></label>
                            <input type="text" name="full_name" placeholder="Enter your full name" required
                                class="w-full px-3 py-2 text-lg text-gray-100 bg-transparent border-b border-gray-600 focus:border-[#edc45b] focus:ring-0">
                        </div>

                        <div>
                            <label class="block mb-1 text-lg font-bold text-gray-300">Email <span
                                    class="text-[#edc45b]">*</span></label>
                            <input type="email" name="email" placeholder="Enter your email" required
                                class="w-full px-3 py-2 text-lg text-gray-100 bg-transparent border-b border-gray-600 focus:border-[#edc45b] focus:ring-0">
                        </div>

                        <div>
                            <label class="block mb-1 text-lg font-bold text-gray-300">Phone No. <span
                                    class="text-[#edc45b]">*</span></label>
                            <input type="text" name="phone" placeholder="Enter your phone no." required
                                class="w-full px-3 py-2 text-lg text-gray-100 bg-transparent border-b border-gray-600 focus:border-[#edc45b] focus:ring-0">
                        </div>

                        <div>
                            <label class="block mb-1 text-lg font-bold text-gray-300">Message <span
                                    class="text-[#edc45b]">*</span></label>
                            <textarea name="message" rows="3" placeholder="Enter your message" required
                                class="w-full px-3 py-2 text-lg text-gray-100 bg-transparent border-b border-gray-600 focus:border-[#edc45b] focus:ring-0"></textarea>
                        </div>
                    </div>

                    <!-- Terms -->
                    <div class="space-y-1 text-base text-gray-400">
                        <p>By clicking <span class="font-medium text-white">"Submit Inquiry"</span>, you agree that:</p>
                        <ul class="ml-3 list-disc list-inside">
                            <li>You have read, understood and accepted the <a href="#"
                                    class="text-[#edc45b] hover:underline">Privacy Policy</a>.</li>
                            <li>You agree to be contacted by Golden Key Real Estate and Development.</li>
                            <li>You are at least 18 years old.</li>
                        </ul>
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center gap-3 pt-4 border-t border-gray-700">
                        <button type="submit"
                            class="gap-2 bg-[#ecc467] w-full hover:bg-[#e6b74e] text-black font-medium text-lg px-6 py-3 rounded-md transition flex justify-center items-center">
                            Submit Inquiry
                        </button>
                        <button type="button"
                            class="px-6 py-4 w-full text-lg text-[#091A39] font-medium bg-[#e2e2e2] border border-gray-600 rounded-md"
                            @click="open = false">Cancel</button>
                    </div>
                </form>

                <div class="absolute inset-0 hidden w-full h-full lg:flex -z-10">
                    <img src="{{ asset('images/modal-bg.png') }}" alt=""
                        class="object-cover w-full h-full" />
                </div>

            </div>
        </div>
    </template>
</div>

<!-- SweetAlert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function inquiryModal() {
        return {
            open: false,
            async submitForm(event) {
                const form = event.target;
                const data = new FormData(form);

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json' // remove CSRF header
                        },
                        body: data
                    });

                    // Check for HTTP errors
                    if (!response.ok) {
                        const errorText = await response.text();
                        throw new Error(errorText || 'Server error');
                    }

                    const result = await response.json();

                    // Handle success
                    if (result.success) {
                        this.open = false;
                        Swal.fire({
                            icon: 'success',
                            title: 'Inquiry Submitted!',
                            text: result.message || 'We will contact you soon.',
                            confirmButtonColor: '#ecc467'
                        });
                        form.reset();
                    } else {
                        // Handle server-side failure (success=false)
                        Swal.fire({
                            icon: 'error',
                            title: 'Submission Failed',
                            text: result.message || 'Please try again.',
                            confirmButtonColor: '#ecc467'
                        });
                    }

                } catch (error) {
                    // Handle network / unexpected errors
                    Swal.fire({
                        icon: 'error',
                        title: 'Submission Failed',
                        text: error.message || 'Something went wrong. Please try again later.',
                        confirmButtonColor: '#ecc467'
                    });
                    console.error('Inquiry submission error:', error);
                }
            }
        }
    }
</script>
