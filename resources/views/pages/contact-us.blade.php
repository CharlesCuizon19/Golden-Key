@extends('layouts.app')

@section('content')
<div>
    <x-banner page="Contact Us" breadcrumb1="Contact Us" />

    <div class="py-20">
        <div class="grid grid-cols-5 pb-20 mx-3 2xl:mx-20 gap-x-20">
            <div class="flex flex-col justify-between col-span-3">
                <div class="flex flex-col gap-5 text-[#20272d]">
                    <x-title title="Get in Touch" />
                    <div class="font-serif leading-snug text-7xl">
                        Let's Talk About Your Next Property Move
                    </div>
                    <div class="text-2xl leading-snug">
                        Whether you’re looking to buy, sell, rent, or have your property managed, Golden Key Real Estate
                        and
                        Development is here to assist you. Our team of experts is dedicated to providing personalized
                        service
                        and professional guidance every step of the way.
                    </div>
                </div>
                <div class="relative z-10">
                    <div class="flex flex-col gap-5">
                        <div class="grid grid-cols-1 gap-5 2xl:grid-cols-2">
                            <div class="flex items-center w-full gap-5 p-5 border rounded-xl">
                                <div class="bg-[#ecc467] rounded-full p-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="text-white size-5">
                                        <path fill="currentColor"
                                            d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02z" />
                                    </svg>
                                </div>
                                <div class="flex flex-col">
                                    <div class="text-2xl font-bold">
                                        Phone No.
                                    </div>
                                    <div class="text-2xl">
                                        09969711881
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-5 2xl:grid-cols-2">
                            <div class="flex items-center w-full gap-5 p-5 border rounded-xl">
                                <div class="bg-[#ecc467] rounded-full p-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12"
                                        class="text-white size-5">
                                        <path fill="currentColor"
                                            d="M6 .5A4.5 4.5 0 0 1 10.5 5c0 1.863-1.42 3.815-4.2 5.9a.5.5 0 0 1-.6 0C2.92 8.815 1.5 6.863 1.5 5A4.5 4.5 0 0 1 6 .5m0 3a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3" />
                                    </svg>
                                </div>
                                <div class="flex flex-col">
                                    <div class="text-2xl font-bold">
                                        Address
                                    </div>
                                    <div class="text-2xl">
                                        3A Siargao Tower Palm Beach West
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center w-full gap-5 p-5 border rounded-xl">
                                <div class="bg-[#ecc467] rounded-full p-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="text-white size-5"">
                                            <path fill=" currentColor"
                                        d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 4l-8 5l-8-5V6l8 5l8-5z" />
                                    </svg>
                                </div>
                                <div class="flex flex-col">
                                    <div class="text-2xl font-bold">
                                        Email Address
                                    </div>
                                    <div class="text-2xl">
                                        goldenkey.realestate777@gmail.com
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute inset-0 -z-10">
                        <img src="{{ asset('images/contact-us-map.png') }}" alt="">
                    </div>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="relative z-0 flex flex-col col-span-2 gap-5 overflow-hidden rounded-3xl" x-data="contactForm()">
                <form @submit.prevent="submitForm" class="p-10 space-y-5">
                    <p class="font-bold text-white 2xl:text-[43px] pb-7">Tell Us How We Can Help.</p>

                    <div class="space-y-10">
                        <div>
                            <label class="block mb-1 text-xl font-bold text-gray-300">Full Name <span
                                    class="text-[#edc45b]">*</span></label>
                            <input type="text" name="full_name" placeholder="Enter your full name" required
                                class="w-full px-3 py-2 text-lg text-gray-100 bg-transparent border-b border-gray-600 focus:border-[#edc45b] focus:ring-0">
                        </div>

                        <div>
                            <label class="block mb-1 text-xl font-bold text-gray-300">Email Address <span
                                    class="text-[#edc45b]">*</span></label>
                            <input type="email" name="email" placeholder="Enter your email address" required
                                class="w-full px-3 py-2 text-lg text-gray-100 bg-transparent border-b border-gray-600 focus:border-[#edc45b] focus:ring-0">
                        </div>

                        <div>
                            <label class="block mb-1 text-xl font-bold text-gray-300">Subject<span
                                    class="text-[#edc45b]">*</span></label>
                            <input type="text" name="subject" placeholder="Enter your subject" required
                                class="w-full px-3 py-2 text-lg text-gray-100 bg-transparent border-b border-gray-600 focus:border-[#edc45b] focus:ring-0">
                        </div>

                        <div>
                            <label class="block mb-1 text-xl font-bold text-gray-300">Message <span
                                    class="text-[#edc45b]">*</span></label>
                            <textarea name="message" rows="4" placeholder="Enter your message" required
                                class="w-full px-3 py-2 text-lg text-gray-100 bg-transparent border-b border-gray-600 focus:border-[#edc45b] focus:ring-0"></textarea>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-4">
                        <button type="submit"
                            class=" gap-2 bg-[#ecc467]  w-fit hover:bg-[#e6b74e] text-black font-medium text-lg px-6 py-3 rounded-md transition">
                            <div class="flex items-center justify-center w-full gap-3">
                                <span>
                                    Submit Message
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
                    </div>
                </form>
                <div class="absolute inset-0 w-full h-full -z-10">
                    <img src="{{ asset('images/modal-bg.png') }}" alt=""
                        class="object-cover w-full h-full mix-blend-multiply">
                </div>
            </div>
        </div>
        <div class="mx-3 overflow-hidden 2xl:mx-20 rounded-xl">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.9882121310916!2d120.98642177592575!3d14.542666778490762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c90046dfeccf%3A0x432e42529411a7f6!2sSiargao%20Tower%20-%20Palm%20Beach%20West!5e0!3m2!1sen!2sph!4v1762936981050!5m2!1sen!2sph"
                style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                class="w-full h-auto 2xl:h-[30rem]"></iframe>
        </div>
    </div>
</div>

{{-- Alpine.js & AJAX --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function contactForm() {
        return {
            async submitForm(event) {
                const form = event.target;
                const data = new FormData(form);

                try {
                    const response = await fetch("{{ route('contacts.store') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: data
                    });

                    const result = await response.json();

                    if (result.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Message Sent!',
                            text: result.message || 'We will contact you soon.',
                            confirmButtonColor: '#ecc467'
                        });
                        form.reset();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: result.message || 'Please check your inputs.',
                            confirmButtonColor: '#ecc467'
                        });
                    }
                } catch (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Submission Failed',
                        text: 'Something went wrong. Please try again later.',
                        confirmButtonColor: '#ecc467'
                    });
                    console.error(error);
                }
            }
        }
    }
</script>
@endsection