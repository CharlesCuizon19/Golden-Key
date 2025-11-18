<div x-data="inquiryModal()" x-effect="document.body.classList.toggle('overflow-hidden', open)" class="relative z-50">
    <!-- Button -->
    <button @click="open = true">
        <div
            class="flex items-center gap-3 bg-[#edc45b] hover:bg-[#f4d16e] w-fit transition px-5 py-3 rounded-md cursor-pointer">
            <div class="text-base 2xl:text-xl text-[#20272D]">Inquire Now</div>
        </div>
    </button>

    <!-- Modal -->
    <template x-teleport="body">
        <div x-show="open" x-transition x-cloak class="fixed inset-0 z-[9999] flex items-center justify-center p-4"
            aria-modal="true">
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" @click="open = false"></div>

            <!-- Modal box -->
            <div @click.stop x-transition.scale.origin.center
                class="relative z-10 w-full max-w-2xl max-h-[90%] overflow-y-auto bg-[#101317] text-gray-100 border border-gray-700 rounded-xl shadow-2xl">
                <!-- Header -->
                <div class="sticky top-0 flex items-center justify-between px-6 py-4 bg-[#1a2127]">
                    <h2 class="text-2xl font-semibold text-white">Direct Inquiry</h2>
                    <button @click="open = false"
                        class="text-2xl leading-none text-gray-400 hover:text-white">✕</button>
                </div>

                <!-- Body -->
                <form @submit.prevent="submitInquiry" class="p-6 space-y-5">
                    <p class="text-lg text-gray-400">Looking for a property? Fill in the form for inquiries.</p>

                    <div class="space-y-4">
                        <div>
                            <label class="block mb-1 text-lg font-bold text-gray-300">Full Name <span
                                    class="text-[#edc45b]">*</span></label>
                            <input type="text" x-model="form.full_name" placeholder="Enter your full name"
                                class="w-full px-3 py-2 text-lg text-gray-100 bg-transparent border border-gray-600 rounded-md focus:border-[#edc45b] focus:ring-0">
                        </div>
                        <div>
                            <label class="block mb-1 text-lg font-bold text-gray-300">Email Address <span
                                    class="text-[#edc45b]">*</span></label>
                            <input type="email" x-model="form.email" placeholder="Enter your email address"
                                class="w-full px-3 py-2 text-lg text-gray-100 bg-transparent border border-gray-600 rounded-md focus:border-[#edc45b] focus:ring-0">
                        </div>
                        <div>
                            <label class="block mb-1 text-lg font-bold text-gray-300">Phone No. <span
                                    class="text-[#edc45b]">*</span></label>
                            <input type="text" x-model="form.phone" placeholder="Enter your phone no."
                                class="w-full px-3 py-2 text-lg text-gray-100 bg-transparent border border-gray-600 rounded-md focus:border-[#edc45b] focus:ring-0">
                        </div>
                        <div>
                            <label class="block mb-1 text-lg font-bold text-gray-300">Interested In <span
                                    class="text-[#edc45b]">*</span></label>
                            <input type="text" x-model="form.interested_in" placeholder="Enter your interest"
                                class="w-full px-3 py-2 text-lg text-gray-100 bg-transparent border border-gray-600 rounded-md focus:border-[#edc45b] focus:ring-0">
                        </div>
                        <div>
                            <label class="block mb-1 text-lg font-bold text-gray-300">Message <span
                                    class="text-[#edc45b]">*</span></label>
                            <textarea rows="3" x-model="form.message" placeholder="Enter your message"
                                class="w-full px-3 py-2 text-lg text-gray-100 bg-transparent border border-gray-600 rounded-md focus:border-[#edc45b] focus:ring-0"></textarea>
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
                        <button type="submit"
                            class="gap-2 bg-[#ecc467] w-full hover:bg-[#e6b74e] text-black font-medium text-lg px-6 py-3 rounded-md transition">Submit
                            Inquiry</button>
                        <button type="button"
                            class="px-6 py-4 w-full text-lg text-[#091A39] font-medium bg-[#e2e2e2] border border-gray-600 rounded-md"
                            @click="open = false">Cancel</button>
                    </div>
                </form>

                <div class="absolute inset-0 hidden w-full h-full mt-16 -z-10 lg:flex">
                    <img src="{{ asset('images/modal-bg.png') }}" alt="" class="object-cover w-full h-full" />
                </div>
            </div>
        </div>
    </template>
</div>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function inquiryModal() {
        return {
            open: false,
            form: {
                full_name: '',
                email: '',
                phone: '',
                interested_in: '',
                message: ''
            },
            async submitInquiry() {
                try {
                    const response = await fetch("{{ route('inquiries.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify(this.form)
                    });

                    const data = await response.json();

                    if (response.ok && data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Inquiry Submitted!',
                            text: data.message,
                            confirmButtonColor: '#edc45b'
                        });
                        this.open = false;
                        this.form = {
                            full_name: '',
                            email: '',
                            phone: '',
                            interested_in: '',
                            message: ''
                        };
                    } else {
                        // Validation errors or custom error
                        let message = data.message || 'Something went wrong.';
                        if (data.errors) {
                            message = Object.values(data.errors).flat().join('\n');
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: message,
                            confirmButtonColor: '#edc45b'
                        });
                    }
                } catch (err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Something went wrong. Please try again.',
                        confirmButtonColor: '#edc45b'
                    });
                    console.error(err);
                }
            }
        }
    }
</script>
