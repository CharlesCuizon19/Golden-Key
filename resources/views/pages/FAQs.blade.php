@extends('layouts.app')

@section('content')
    <div class="">
        <x-banner page="FAQs" breadcrumb1="FAQs" />

        <div class="relative z-0 w-full h-full py-32 text-[#20272d]">
            <div class="flex flex-col items-center justify-center gap-10">
                <div class="flex flex-col gap-5 text-center">
                    <div class="font-serif text-4xl lg:text-6xl">
                        Frequently Asked Questions
                    </div>
                    <div class="lg:text-[23px]">
                        Find answers to common questions about our company and services.
                    </div>
                </div>
                <div class="mx-3">
                    <div x-data="{ open: 1 }" class="w-full 2xl:min-w-[64rem] max-w-5xl space-y-5">
                        @foreach ([
            ['id' => 1, 'question' => 'What services does Golden Key offer?', 'answer' => 'Golden Key provides comprehensive real estate services — from property sales and rentals to leasing, management, and development — ensuring seamless and profitable ownership experiences.'],
            ['id' => 2, 'question' => 'How do I list my property with Golden Key?', 'answer' => 'You can list your property by contacting our sales team through our website or visiting one of our offices for assistance with documentation and evaluation.'],
            ['id' => 3, 'question' => 'Do you handle both residential and commercial properties?', 'answer' => 'Yes, Golden Key manages both residential and commercial properties, providing expert guidance and support for every client type.'],
            ['id' => 4, 'question' => 'What are the requirements to rent or lease a unit?', 'answer' => 'Requirements include valid identification, proof of income, and a signed lease agreement. Additional documents may be requested depending on the property.'],
            ['id' => 5, 'question' => 'Can you assist with property investment opportunities?', 'answer' => 'Absolutely! We offer consultancy services and market insights to help clients make informed investment decisions tailored to their financial goals.'],
        ] as $faq)
                            <div class="overflow-hidden text-lg transition-all duration-300 border rounded-lg lg:text-xl"
                                :class="open === {{ $faq['id'] }} ? 'shadow-lg' : 'shadow-none'">
                                <button @click="open === {{ $faq['id'] }} ? open = null : open = {{ $faq['id'] }}"
                                    class="flex items-center justify-between w-full px-6 py-4 font-semibold text-left transition"
                                    :class="open === {{ $faq['id'] }} ? 'bg-[#ecc467]' : 'bg-[#ebebeb] hover:bg-gray-200'">
                                    <span :class="open === {{ $faq['id'] }} ? 'font-bold' : 'font-normal'">
                                        {{ $faq['question'] }}
                                    </span>

                                    <span x-text="open === {{ $faq['id'] }} ? '−' : '+'"></span>
                                </button>

                                <div x-show="open === {{ $faq['id'] }}" x-collapse
                                    class="px-6 py-4 text-gray-700 bg-white">
                                    {{ $faq['answer'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col items-center justify-center gap-5">
                    <div class="text-4xl font-bold lg:text-5xl">
                        Still have questions?
                    </div>
                    <div class="text-lg text-center lg:text-[23px]">
                        Don't hesitate to send us a message with your inquiry or statement.
                    </div>
                    <x-button buttonName="Contact Us Now" route="contact-us" />
                </div>
            </div>
            <div class="absolute inset-0 w-full h-full -z-10">
                <img src="{{ asset('images/faq-bg.png') }}" alt=""
                    class="object-cover w-full h-full mix-blend-multiply">
            </div>

        </div>
    </div>
@endsection
