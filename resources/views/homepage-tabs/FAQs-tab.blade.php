<div class="bg-[#f9f9f9]">
    <div class="py-20 mx-3 2xl:mx-20">
        <div class="mx-auto space-y-8 lg:px-8">

            <x-title title="Frequently Asked Questions" />
            <div class="grid items-start grid-cols-1 gap-40 lg:grid-cols-2">
                <div class="flex flex-col gap-8">
                    <div class="text-3xl lg:text-5xl 2xl:text-7xl text-[#20272D] font-serif lg:w-[80%]">
                        Know More Before You Move In
                    </div>
                    <div class="overflow-hidden shadow-md rounded-2xl w-full lg:w-[45rem] mt-4 lg:mt-20">
                        <img src="{{ asset('images/FAQ-img.png') }}" alt="City skyline"
                            class="object-cover w-full h-full">
                    </div>
                </div>

                <!-- Right FAQ Accordion -->
                <div x-data="{ open: 1 }" class="space-y-5">
                    <!-- FAQ Item -->
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
                                :class="open === {{ $faq['id'] }} ?
                                    'bg-[#ecc467] text-gray-900' :
                                    'bg-[#ebebeb] text-gray-800 hover:bg-gray-200'">
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
        </div>
    </div>
</div>
