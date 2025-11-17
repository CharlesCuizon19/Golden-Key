@extends('layouts.app')

@section('content')
    <div>
        <x-banner page="About Us" breadcrumb1="About Us" />

        {{-- Get To Know Us --}}
        <div>
            <div class="grid grid-cols-1 gap-20 py-20 mx-3 lg:grid-cols-2 2xl:mx-20">
                <div class="overflow-hidden rounded-3xl">
                    <img src="{{ asset('images/aboutus-img1.png') }}" alt="" class="w-full h-full">
                </div>
                <div class="flex flex-col gap-5">
                    <x-title title="Get To Know Us" />
                    <div class="text-2xl 2xl:text-7xl text-[#20272d] leading-tight font-serif">Discover the Passion Behind
                        Golden Key
                    </div>
                    <div class="text-[#20272d]/80 text-lg lg:text-2xl leading-snug">
                        Our property management company provides comprehensive management services for residential and
                        commercial properties. We aim to deliver exceptional customer service, maximize property value, and
                        ensure stress-free ownership.
                    </div>
                    <div class="flex flex-col gap-3">
                        <div class="flex items-center gap-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                    class="text-[#ecc467] size-6 lg:size-8">
                                    <g fill="currentColor">
                                        <path
                                            d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708z" />
                                        <path
                                            d="M12.5 16a3.5 3.5 0 1 0 0-7a3.5 3.5 0 0 0 0 7m1.679-4.493l-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547l1.17-1.951a.5.5 0 1 1 .858.514" />
                                    </g>
                                </svg>
                            </div>
                            <div class="text-lg lg:text-2xl text-[#20272d]">
                                Complete Property Management Solutions
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                    class="text-[#ecc467] size-6 lg:size-8">
                                    <g fill="currentColor">
                                        <path
                                            d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708z" />
                                        <path
                                            d="M12.5 16a3.5 3.5 0 1 0 0-7a3.5 3.5 0 0 0 0 7m1.679-4.493l-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547l1.17-1.951a.5.5 0 1 1 .858.514" />
                                    </g>
                                </svg>
                            </div>
                            <div class="text-lg lg:text-2xl text-[#20272d]">
                                Professional Building Maintenance
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                    class="text-[#ecc467] size-6 lg:size-8">
                                    <g fill="currentColor">
                                        <path
                                            d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708z" />
                                        <path
                                            d="M12.5 16a3.5 3.5 0 1 0 0-7a3.5 3.5 0 0 0 0 7m1.679-4.493l-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547l1.17-1.951a.5.5 0 1 1 .858.514" />
                                    </g>
                                </svg>
                            </div>
                            <div class="text-lg lg:text-2xl text-[#20272d]">
                                Tenant & Owner Portals
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                    class="text-[#ecc467] size-6 lg:size-8">
                                    <g fill="currentColor">
                                        <path
                                            d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708z" />
                                        <path
                                            d="M12.5 16a3.5 3.5 0 1 0 0-7a3.5 3.5 0 0 0 0 7m1.679-4.493l-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547l1.17-1.951a.5.5 0 1 1 .858.514" />
                                    </g>
                                </svg>
                            </div>
                            <div class="text-lg lg:text-2xl text-[#20272d]">
                                Marketing & Leasing Support
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Our Commitment --}}
        <div class="bg-[#f8f8f8] h-full w-full">
            <div class="relative z-10">
                <div class="py-10 mx-3 space-y-8 lg:mx-24">
                    <div class="flex items-center justify-center w-full">
                        <x-title title="Our Commitment" />
                    </div>
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-3">
                        <div class="flex flex-col gap-5 bg-[#ffe3a2] rounded-2xl py-7 px-14">
                            <div class="flex items-center justify-center w-full">
                                <div class="flex items-center gap-2">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                            class="size-8 lg:size-11">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M13.293 0c.39 0 .707.317.707.707V2h1.293a.707.707 0 0 1 .5 1.207l-1.46 1.46A1.14 1.14 0 0 1 13.53 5h-1.47L8.53 8.53a.75.75 0 0 1-1.06-1.06L11 3.94V2.47c0-.301.12-.59.333-.804l1.46-1.46a.7.7 0 0 1 .5-.207M2.5 8a5.5 5.5 0 0 1 6.598-5.39a.75.75 0 0 0 .298-1.47A7 7 0 1 0 14.86 6.6a.75.75 0 0 0-1.47.299q.109.533.11 1.101a5.5 5.5 0 1 1-11 0m5.364-2.496a.75.75 0 0 0-.08-1.498A4 4 0 1 0 11.988 8.3a.75.75 0 0 0-1.496-.111a2.5 2.5 0 1 1-2.63-2.686"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="font-serif text-2xl lg:text-6xl text-[#20272d]">
                                        Mission
                                    </div>
                                </div>
                            </div>
                            <div>
                                <ul class="space-y-3 text-lg list-disc lg:text-xl">
                                    <li>
                                        Provide exceptional customer service by understanding, anticipating, and gratifying
                                        clients' needs in a timely, cost-effective, and value-added manner.
                                    </li>
                                    <li>
                                        Deliver results-driven industry insights and exceptional service to clients.
                                    </li>
                                    <li>
                                        Create lasting relationships and value for clients, partners, and the community.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex flex-col gap-5 bg-[#dddddd] rounded-2xl py-7 px-14">
                            <div class="flex items-center justify-center w-full">
                                <div class="flex items-center gap-2">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="size-8 lg:size-14">
                                            <path fill="currentColor"
                                                d="M11.5 18c4 0 7.46-2.22 9.24-5.5C18.96 9.22 15.5 7 11.5 7s-7.46 2.22-9.24 5.5C4.04 15.78 7.5 18 11.5 18m0-12c4.56 0 8.5 2.65 10.36 6.5C20 16.35 16.06 19 11.5 19S3 16.35 1.14 12.5C3 8.65 6.94 6 11.5 6m0 2C14 8 16 10 16 12.5S14 17 11.5 17S7 15 7 12.5S9 8 11.5 8m0 1A3.5 3.5 0 0 0 8 12.5a3.5 3.5 0 0 0 3.5 3.5a3.5 3.5 0 0 0 3.5-3.5A3.5 3.5 0 0 0 11.5 9" />
                                        </svg>
                                    </div>
                                    <div class="font-serif text-2xl lg:text-6xl text-[#20272d]">
                                        Vision
                                    </div>
                                </div>
                            </div>
                            <div>
                                <ul class="space-y-3 text-lg list-disc lg:text-xl">
                                    <li>
                                        To be a distinguished leader in the real estate industry, known for innovation,
                                        professionalism, teamwork, integrity, and commitment.
                                    </li>
                                    <li>
                                        To create lasting value for clients and the community through sustainable practices
                                        and exceptional service.
                                    </li>
                                    <li>
                                        To be a catalyst for innovation, initiating trends, and fostering growth and
                                        development
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex flex-col gap-5 bg-[#ffe3a2] rounded-2xl py-7 px-14">
                            <div class="flex items-center justify-center w-full">
                                <div class="flex items-center gap-2">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="size-8 lg:size-10">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M6.535 3.25a1.75 1.75 0 0 0-1.456.78L1.49 9.412c-.219.33-.245.752-.068 1.106A33 33 0 0 0 9.45 20.8l1.75 1.501a1.23 1.23 0 0 0 1.601 0l1.75-1.5a33 33 0 0 0 8.029-10.283c.177-.354.15-.776-.069-1.106L18.92 4.03a1.75 1.75 0 0 0-1.455-.779zm-.208 1.611a.25.25 0 0 1 .208-.111h2.34L6.96 9.346a2 2 0 0 0-.1.326a69 69 0 0 1-2.11-.19l-1.405-.147zM3.28 10.836a31.5 31.5 0 0 0 6.994 8.695l-3.125-8.334a71 71 0 0 1-2.554-.222zm5.506.454L12 19.864l3.215-8.574a71 71 0 0 1-6.43 0m8.067-.093l-3.125 8.334a31.5 31.5 0 0 0 6.994-8.695l-1.315.139q-1.275.133-2.554.222m3.803-1.862l-1.406.148a69 69 0 0 1-2.11.19a2 2 0 0 0-.099-.327L15.125 4.75h2.34a.25.25 0 0 1 .208.111zm-5.063.435q-3.591.186-7.184 0L10.5 4.75h3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="font-serif text-2xl lg:text-6xl text-[#20272d]">
                                        Core Values
                                    </div>
                                </div>
                            </div>
                            <div>
                                <ul
                                    class="grid grid-cols-1 space-y-1 text-lg list-disc md:grid-cols-3 lg:grid-cols-1 lg:text-xl">
                                    <li>
                                        Integrity
                                    </li>
                                    <li>
                                        Commitment
                                    </li>
                                    <li>
                                        Experience
                                    </li>
                                    <li>
                                        Personalized service
                                    </li>
                                    <li>
                                        Client-centric approach
                                    </li>
                                    <li>
                                        I nnovation
                                    </li>
                                    <li>
                                        Teamwork
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-0 w-full h-full -z-10">
                    <img src="{{ asset('images/aboutus-rectangle.png') }}" alt=""
                        class="object-cover w-full h-full mix-blend-multiply">
                </div>
            </div>
        </div>

        {{-- Target Market --}}
        <div class="py-20 mx-3 lg:mx-20">
            <div x-data="{ activeTab: 'target' }"
                class="grid grid-cols-1 overflow-hidden bg-white border shadow-sm lg:grid-cols-4 md:flex-row rounded-2xl">

                <div class="hidden col-span-1 lg:flex">
                    <img src="{{ asset('images/target-market-img.png') }}" alt="" class="w-full h-full">
                </div>

                <div
                    class="flex flex-row justify-center col-span-1 overflow-x-auto border-r border-gray-200 lg:flex-col md:w-full bg-gray-50">
                    <template
                        x-for="tab in [
                        { id: 'target', name: 'Target Market' },
                        { id: 'marketing', name: 'Marketing Strategy' },
                        { id: 'operations', name: 'Operations' },
                        { id: 'financial', name: 'Financial Projections' },
                        { id: 'team', name: 'Team' }
                        ]">
                        <button @click="activeTab = tab.id"
                            class="w-full px-6 py-3 text-lg text-left transition-all duration-200 lg:py-8 lg:text-3xl"
                            :class="activeTab === tab.id ?
                                'bg-white text-yellow-600 font-semibold border-r-4 border-yellow-500' :
                                'text-gray-700 hover:bg-gray-100 border-r-4 border-[#d4d4d4]'">
                            <span x-text="tab.name"></span>
                        </button>
                    </template>
                </div>

                <div class="col-span-2 p-6 text-lg lg:text-2xl md:w-full">
                    <!-- Target Market -->
                    <div x-show="activeTab === 'target'" x-transition class="space-y-5">
                        <x-title title="Target Market" />
                        <div class="text-gray-600 ">
                            Our target market consists of professionals, families, and investors seeking modern and
                            convenient
                            real estate solutions within urban areas.
                        </div>
                    </div>

                    <!-- Marketing Strategy -->
                    <div x-show="activeTab === 'marketing'" x-transition class="space-y-5">
                        <x-title title="Marketing Strategy" />
                        <p class="mb-4 text-gray-600">
                            We combine online visibility, professional networking, and local advertising to attract quality
                            clients and maximize property exposure.
                        </p>
                        <ol class="ml-5 space-y-2 text-gray-700 list-decimal">
                            <li>
                                <strong>Online presence:</strong>
                                <ul class="ml-5 list-disc">
                                    <li>Website</li>
                                    <li>Social media</li>
                                    <li>Online directories</li>
                                </ul>
                            </li>
                            <li>
                                <strong>Networking:</strong>
                                <ul class="ml-5 list-disc">
                                    <li>Real estate agents</li>
                                    <li>Attorneys</li>
                                    <li>Financial institutions</li>
                                </ul>
                            </li>
                            <li><strong>Referral incentives</strong></li>
                            <li>
                                <strong>Local advertising:</strong>
                                <ul class="ml-5 list-disc">
                                    <li>Print media</li>
                                    <li>Online listings</li>
                                </ul>
                            </li>
                        </ol>
                    </div>

                    <!-- Operations -->
                    <div x-show="activeTab === 'operations'" x-transition class="space-y-5">
                        <x-title title="Operations" />
                        <p class="text-gray-600">
                            Our operations focus on efficient project management, timely completion, and maintaining the
                            highest
                            standards of construction and customer service.
                        </p>
                    </div>

                    <!-- Financial Projections -->
                    <div x-show="activeTab === 'financial'" x-transition class="space-y-5">
                        <x-title title="Financial Projections" />
                        <p class="text-gray-600">
                            Projected growth includes a 20% increase in property sales annually, supported by strong
                            marketing
                            efforts and expanding market presence.
                        </p>
                    </div>

                    <!-- Team -->
                    <div x-show="activeTab === 'team'" x-transition class="space-y-5">
                        <x-title title="Team" />
                        <p class="text-gray-600">
                            Our experienced team consists of architects, engineers, project managers, and marketing
                            professionals dedicated to delivering high-quality developments.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Services --}}
        <div class=" bg-[#f9f9f9]">
            <div class="flex flex-col gap-20 py-20 mx-3 lg:mx-20">
                <div class="flex flex-col items-center justify-center gap-8">
                    <x-title title="Services" />
                    <div class="text-2xl lg:text-6xl text-[#20272d] font-serif">
                        Property Management Services
                    </div>
                    <div class="text-center text-[#20272d]/90 leading-normal text-lg lg:text-2xl max-w-3xl">
                        We handle every aspect of property care, including leasing, maintenance, marketing, and financial
                        reporting, to ensure smooth operations and a worry-free ownership experience for our clients.
                    </div>
                </div>
                <div class="container grid grid-cols-2 mx-auto lg:grid-cols-4 gap-y-20">
                    <div class="flex flex-col items-center justify-center gap-5">
                        <div class="bg-[#ecc467] rounded-full p-3 w-fit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-white size-11">
                                <path fill="currentColor"
                                    d="M20 13q.9 0 1.5.6c.3.4.5.9.5 1.4l-8 3l-7-2V7h1.9l7.3 2.7c.5.2.8.6.8 1.1c0 .3-.1.6-.3.8s-.6.4-.9.4H13l-1.8-.7l-.3.9l2.1.8zM1 7h4v11H1z" />
                            </svg>
                        </div>
                        <div class="font-serif text-lg lg:text-3xl text-center w-[80%]">
                            Rent Collection and Accounting
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-5">
                        <div class="bg-[#ecc467] rounded-full p-3 w-fit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-white size-11">
                                <path fill="currentColor"
                                    d="M12.835 3.161a.8.8 0 0 0 .147-.148h2.562l.035-.001a5 5 0 0 1 .545 0h.038a3.8 3.8 0 0 1 1.646.369a5.23 5.23 0 0 1 2.34 1.822a5.2 5.2 0 0 1 .804 4.348l-3.281-3.237a.75.75 0 0 0-.527-.216h-4.775a.75.75 0 0 0-.423.152l-1.884 1.428a.97.97 0 0 1-1.358-.184a.95.95 0 0 1 .181-1.34zM7.899 14.235l-.014.013l-.974.968l-.013.012a.906.906 0 0 1-1.261-.012a.89.89 0 0 1 0-1.267l.974-.968a.906.906 0 0 1 1.275 0a.89.89 0 0 1 .013 1.254m-.291 1.698a.89.89 0 0 0 .013 1.254c.352.35.923.35 1.275 0l.974-.968a.892.892 0 0 0-.14-1.38a.906.906 0 0 0-1.122.1l-.013.014l-.974.967zM5.5 11.407a.89.89 0 0 1 0 1.267l-.974.968a.906.906 0 0 1-1.275 0a.89.89 0 0 1 0-1.267l.974-.968a.906.906 0 0 1 1.275 0m6.353 5.517a.89.89 0 0 1 0 1.267l-.974.968a.906.906 0 0 1-1.275 0a.89.89 0 0 1-.172-1.028l.001-.002a.9.9 0 0 1 .171-.237l.974-.968a.906.906 0 0 1 1.275 0M5.344 4.83a6.18 6.18 0 0 1 5.112-1.749L7.98 4.958a2.45 2.45 0 0 0-.466 3.448a2.473 2.473 0 0 0 3.454.467l1.684-1.275h4.185l3.507 3.46l.036.04l1.15 1.15a1.439 1.439 0 0 1-1.936 2.124l-.096-.096l-.06-.052l-1.093-1.092a.5.5 0 1 0-.707.707l1.15 1.15q.063.062.128.119l.044.044a1.019 1.019 0 1 1-1.441 1.441l-.17-.169a.5.5 0 0 0-.853.363a.5.5 0 0 0 .147.365l.223.223a.943.943 0 1 1-1.333 1.333h-.001l-.012-.013l-.21-.21a.497.497 0 0 0-.707 0a.5.5 0 0 0 0 .707l.218.219a.96.96 0 0 1-1.35 1.367l-1.431-1.36l.525-.522a1.884 1.884 0 0 0 0-2.677a1.9 1.9 0 0 0-1.429-.552a1.88 1.88 0 0 0-.556-1.42a1.9 1.9 0 0 0-1.428-.552a1.88 1.88 0 0 0-.556-1.419a1.91 1.91 0 0 0-1.844-.489a1.88 1.88 0 0 0-.541-1.085a1.914 1.914 0 0 0-2.514-.158A6.1 6.1 0 0 1 5.344 4.83" />
                            </svg>
                        </div>
                        <div class="font-serif text-lg lg:text-3xl text-center w-[80%]">
                            Tenant Screening and Leasing
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-5">
                        <div class="bg-[#ecc467] rounded-full p-3 w-fit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="text-white size-11">
                                <path fill="currentColor"
                                    d="m86.257 23.405l-3.866 3.866l-3.737 3.737l-4.759 4.759a9.08 9.08 0 0 1-9.663-9.663l4.759-4.759l3.737-3.737l3.866-3.866a.645.645 0 0 0 0-.911c-.046-.046-.101-.074-.155-.103l.001-.001l-.01-.004a1 1 0 0 0-.102-.043a21.4 21.4 0 0 0-8.749-1.878c-11.939 0-21.618 9.679-21.618 21.618c0 2.28.358 4.475 1.012 6.538L24.428 61.504c-7.545.122-13.627 6.267-13.627 13.842c0 7.65 6.203 13.853 13.853 13.853c7.574 0 13.72-6.083 13.842-13.628l22.546-22.546a21.6 21.6 0 0 0 6.539 1.012c11.939 0 21.618-9.679 21.618-21.618c0-3.118-.686-6.066-1.877-8.742a.6.6 0 0 0-.05-.118l-.022-.052l-.007.007c-.024-.037-.041-.078-.074-.111a.646.646 0 0 0-.912.002M30.378 75.346a5.724 5.724 0 1 1-11.449 0a5.724 5.724 0 0 1 11.449 0" />
                            </svg>
                        </div>
                        <div class="font-serif text-lg lg:text-3xl text-center w-[80%]">
                            Property Maintenance and Repairs
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-5">
                        <div class="bg-[#ecc467] rounded-full p-3 w-fit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-white size-11">
                                <path fill="currentColor"
                                    d="m11.03 13.923l3.67-2.361q.316-.204.316-.562t-.316-.561l-3.67-2.362q-.326-.229-.678-.04q-.352.188-.352.596v4.734q0 .408.352.596q.352.189.679-.04M4.615 18q-.69 0-1.153-.462T3 16.384V5.616q0-.691.463-1.153T4.615 4h14.77q.69 0 1.152.463T21 5.616v10.769q0 .69-.463 1.153T19.385 18H15v1.192q0 .349-.23.578t-.578.23H9.808q-.348 0-.578-.23T9 19.192V18zm0-1h14.77q.23 0 .423-.192t.192-.424V5.616q0-.231-.192-.424T19.385 5H4.615q-.23 0-.423.192T4 5.616v10.769q0 .23.192.423t.423.192M4 17V5z" />
                            </svg>
                        </div>
                        <div class="font-serif text-lg lg:text-3xl text-center w-[80%]">
                            Marketing and Advertising
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-5">
                        <div class="bg-[#ecc467] rounded-full p-3 w-fit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-white size-11">
                                <path fill="currentColor" d="M12 3L2 12h3v8h14v-8h3M9 18H7v-6h2m4 6h-2v-8h2m4 8h-2v-4h2" />
                            </svg>
                        </div>
                        <div class="font-serif text-lg lg:text-3xl text-center w-[80%]">
                            Financial Reporting and Budgeting
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-5">
                        <div class="bg-[#ecc467] rounded-full p-3 w-fit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="text-white size-11">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="M7 20h10M6 6l6-1l6 1m-6-3v17m-3-8L6 6l-3 6a3 3 0 0 0 6 0m12 0l-3-6l-3 6a3 3 0 0 0 6 0" />
                            </svg>
                        </div>
                        <div class="font-serif text-lg lg:text-3xl text-center w-[80%]">
                            Compliance with Laws and Regulations
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-5">
                        <div class="bg-[#ecc467] rounded-full p-3 w-fit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56 56" class="text-white size-11">
                                <path fill="currentColor"
                                    d="M28 51.906c13.055 0 23.906-10.828 23.906-23.906c0-13.055-10.875-23.906-23.93-23.906C14.899 4.094 4.095 14.945 4.095 28c0 13.078 10.828 23.906 23.906 23.906M16.539 25.398c0-4.945 4.055-9 9.023-9c4.946 0 9 4.055 9 9a8.76 8.76 0 0 1-1.664 5.18l5.86 5.86c.328.328.539.773.539 1.218c0 .985-.68 1.664-1.594 1.664c-.539 0-.984-.164-1.43-.61l-5.789-5.788a8.9 8.9 0 0 1-4.922 1.5c-4.968 0-9.023-4.055-9.023-9.024m2.601 0c0 3.516 2.907 6.422 6.422 6.422c3.47 0 6.375-2.906 6.375-6.422c0-3.468-2.906-6.375-6.375-6.375c-3.515 0-6.422 2.907-6.422 6.375" />
                            </svg>
                        </div>
                        <div class="font-serif text-lg lg:text-3xl text-center w-[80%]">
                            Regular Property Inspections
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-5">
                        <div class="bg-[#ecc467] rounded-full p-3 w-fit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" class="text-white size-11">
                                <path fill="currentColor"
                                    d="M7.378 2.283A3.5 3.5 0 0 0 2.536 5c.26.02.464.24.464.499v3c0 .28-.225.5-.503.5H1.5A1.5 1.5 0 0 1 0 7.5v-1A1.5 1.5 0 0 1 1.5 5h.028a4.5 4.5 0 0 1 8.944 0h.028A1.5 1.5 0 0 1 12 6.5v1a1.5 1.5 0 0 1-1.394 1.496c-.091.64-.339 1.14-.685 1.52a2.93 2.93 0 0 1-1.283.796a4 4 0 0 1-.758.164a1 1 0 1 1-.031-1.005a3 3 0 0 0 .483-.111c.321-.104.622-.267.85-.519A1.7 1.7 0 0 0 9.592 9h-.09A.504.504 0 0 1 9 8.5v-3c0-.268.205-.48.464-.499a3.5 3.5 0 0 0-2.086-2.718M10 6v2h.5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM2 8V6h-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5z" />
                            </svg>
                        </div>
                        <div class="font-serif text-lg lg:text-3xl text-center w-[80%]">
                            Tenant Communication and Support
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
