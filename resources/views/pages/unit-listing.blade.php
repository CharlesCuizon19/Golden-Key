@extends('layouts.app')

@section('content')
    <div>
        <x-banner page="Unit Listing" breadcrumb1="Unit Listing" />

        {{-- Search & Filters --}}
        <div class="bg-[#f5f5f5] rounded-lg m-3">
            <div class="flex flex-col gap-5 py-10 mx-3 2xl:mx-20">
                <div class="flex max-w-sm overflow-hidden text-gray-400 bg-white border rounded-lg">
                    <div class="py-3 pl-5 pr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M10.77 18.3a7.53 7.53 0 1 1 7.53-7.53a7.53 7.53 0 0 1-7.53 7.53m0-13.55a6 6 0 1 0 6 6a6 6 0 0 0-6-6" />
                            <path fill="currentColor"
                                d="M20 20.75a.74.74 0 0 1-.53-.22l-4.13-4.13a.75.75 0 0 1 1.06-1.06l4.13 4.13a.75.75 0 0 1 0 1.06a.74.74 0 0 1-.53.22" />
                        </svg>
                    </div>

                    <input type="text" placeholder="Search a specific property"
                        class="w-full px-5 text-lg text-gray-800 placeholder:text-xl focus:outline-none focus:ring-0">
                </div>

                {{-- Dynamic Filter Bar --}}
                <div class="flex flex-wrap gap-3 bg-gray-100" x-data="filterBar()">
                    <template x-for="filter in filters" :key="filter.name">
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" @click.outside="open = false"
                                class="flex items-center justify-between px-4 py-2 text-gray-800 bg-white border border-gray-200 rounded-md 2xl:text-xl w-36 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                <span x-text="filter.selected || filter.name"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 text-gray-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="open" x-transition
                                class="absolute z-10 mt-1 bg-white border border-gray-200 rounded-md shadow-lg w-36">
                                <template x-for="option in filter.options" :key="option">
                                    <button @click="filter.selected = option; open = false"
                                        class="block w-full px-4 py-2 text-left text-gray-700 2xl:text-xl hover:bg-yellow-50"
                                        x-text="option"></button>
                                </template>
                            </div>
                        </div>
                    </template>

                    {{-- Apply Button --}}
                    <button @click="applyFilters"
                        class="px-6 py-2 2xl:text-xl text-gray-800 transition bg-[#ecc467] rounded-md hover:bg-yellow-500">
                        Apply Filter
                    </button>
                </div>
            </div>
        </div>

        {{-- Property Listings --}}
        <div class="flex flex-col gap-10 py-5 mx-3 mb-20 2xl:mx-20">
            <div class="swiper propertySwiper max-w-[100%]">
                <div class="swiper-wrapper">
                    @if (!empty($chunks) && count($chunks) > 0)
                        @foreach ($chunks as $chunk)
                            <div class="swiper-slide">
                                <div class="grid grid-cols-1 gap-x-8 gap-y-20 2xl:grid-cols-3">
                                    @foreach ($chunk as $item)
                                        <a href="{{ route('unit-listing.singlepage', ['id' => $item->id]) }}"
                                            class="flex flex-col gap-3 cursor-pointer group">
                                            <div class="relative">
                                                <div class="overflow-hidden rounded-lg">
                                                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}"
                                                        loading="lazy"
                                                        class="w-full h-[20rem] object-cover transition duration-500 group-hover:scale-105">
                                                </div>
                                                <div
                                                    class="absolute top-3 left-3 px-4 py-2 text-sm text-black rounded-lg 2xl:text-base {{ $item->status === 'For Sale'
                                                        ? 'bg-[#9dff00]'
                                                        : ($item->status === 'For Rent'
                                                            ? 'bg-[#00e0ff]'
                                                            : 'bg-[#f6ff00]') }}">
                                                    {{ $item->status }}
                                                </div>
                                            </div>

                                            <div class="flex justify-between">
                                                <div
                                                    class="px-4 py-2 text-sm text-[#20272D] bg-[#e6e6e6] rounded-full 2xl:text-lg">
                                                    {{ $item->type }}
                                                </div>
                                                <div class="flex items-center gap-5 text-[#656565]">
                                                    <div class="flex flex-wrap gap-4 mt-2">
                                                        @foreach ($item->features as $feature)
                                                            <div class="flex items-center gap-2">
                                                                <!-- Optional: Add icons based on feature name -->
                                                                @if (Str::lower($feature->name) == 'bedroom')
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        fill="currentColor">
                                                                        <path
                                                                            d="M3 6a1 1 0 0 1 .993.883L4 7v6h6V8a1 1 0 0 1 .883-.993L11 7h8a3 3 0 0 1 2.995 2.824L22 10v8a1 1 0 0 1-1.993.117L20 18v-3H4v3a1 1 0 0 1-1.993.117L2 18V7a1 1 0 0 1 1-1" />
                                                                        <path
                                                                            d="M7 8a2 2 0 1 1-1.995 2.15L5 10l.005-.15A2 2 0 0 1 7 8" />
                                                                    </svg>
                                                                @elseif(Str::lower($feature->name) == 'bathroom')
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" fill="currentColor">
                                                                        <path
                                                                            d="M3.5 4.135a1.635 1.635 0 0 1 3.153-.607l.144.358a4.1 4.1 0 0 0-1.38 1.774a4.18 4.18 0 0 0-.02 3.107a.75.75 0 0 0 .995.413l5.96-2.566a.75.75 0 0 0 .402-.963a3.97 3.97 0 0 0-2.132-2.213a3.84 3.84 0 0 0-2.466-.192l-.11-.275A3.135 3.135 0 0 0 2 4.135V11h-.25a.75.75 0 0 0 0 1.5H2v.355c0 .375 0 .595.016.84c.142 2.237 1.35 4.302 3.102 5.652l-.039.068l-1 2a.75.75 0 0 0 1.342.67l.968-1.935a7.4 7.4 0 0 0 2.58.765c.245.025.394.03.648.04h.007c.74.028 1.464.045 2.126.045s1.386-.017 2.126-.045h.007c.254-.01.404-.015.648-.04a7.4 7.4 0 0 0 2.58-.765l.968 1.936a.75.75 0 0 0 1.342-.671l-1-2l-.038-.068c1.751-1.35 2.96-3.416 3.102-5.652c.015-.245.015-.465.015-.84v-.038c0-.06 0-.123-.004-.18a2 2 0 0 0-.014-.137h.268a.75.75 0 0 0 0-1.5H3.5z" />
                                                                    </svg>
                                                                @endif

                                                                <!-- Display only quantity if exists -->
                                                                @if ($feature->quantity)
                                                                    <span
                                                                        class="text-sm font-bold 2xl:text-xl">{{ $feature->quantity }}</span>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <div class="flex items-center gap-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24">
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                                                        </svg>
                                                        <span class="text-sm font-bold 2xl:text-xl">{{ $item->area }}
                                                            sqm</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="text-xl font-semibold text-[#20272D] 2xl:text-3xl group-hover:underline transition duration-700">
                                                {{ $item->name }}
                                            </div>
                                            <div class="flex items-center gap-2 text-[#656565]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 12 12">
                                                    <path fill="currentColor"
                                                        d="M6 .5A4.5 4.5 0 0 1 10.5 5c0 1.863-1.42 3.815-4.2 5.9a.5.5 0 0 1-.6 0C2.92 8.815 1.5 6.863 1.5 5A4.5 4.5 0 0 1 6 .5m0 3a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3" />
                                                </svg>
                                                <span class="text-base 2xl:text-xl">{{ $item->location }}</span>
                                            </div>
                                            <div class="flex items-center gap-1 mt-4 text-[#656565]">
                                                <span
                                                    class="text-lg font-semibold text-[#CDA23A] 2xl:text-2xl">₱{{ $item->price }}</span>
                                                <span class="text-lg 2xl:text-xl">/ {{ $item->price_type }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="flex items-center justify-center h-screen">
                            <span class="text-xl font-medium text-black/50">No listings yet...</span>
                        </div>
                    @endif
                </div>

                {{-- Swiper Navigation --}}
                <div class="flex items-center justify-center gap-[35rem] mt-20">
                    <button class="p-2 border rounded-lg customized-button-prev border-[#ecc467] bg-white/10 group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="text-[#ecc467] transition duration-300 size-10 group-hover:-translate-x-1">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5" d="m14 7l-5 5l5 5" />
                        </svg>
                    </button>

                    <div class="swiper-pagination text-[#ecc467] text-xl !mt-5"></div>

                    <button class="p-2 border rounded-lg customized-button-next bg-white/10 border-[#ecc467] group">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="text-[#ecc467] transition duration-300 size-10 group-hover:translate-x-1">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5" d="m10 17l5-5l-5-5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .swiper-pagination-bullet {
            width: 48px;
            height: 48px;
            background: #f5f5f5;
            color: #ecc467;
            opacity: 1;
            margin: 0 8px !important;
            border-radius: 12px;
            font-weight: 200;
            font-size: 20px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* Active bullet */
        .swiper-pagination-bullet-active {
            background: #ecc467 !important;
            color: white !important;
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(236, 196, 103, 0.5);
        }

        .swiper-pagination-bullet:hover {
            background: #ecc467;
            color: white;
            transform: scale(1.05);
        }
    </style>

    <script>
        function filterBar() {
            return {
                filters: [{
                        name: 'Type',
                        options: @json($types),
                        selected: ''
                    },
                    {
                        name: 'Category',
                        options: @json($statuses),
                        selected: ''
                    },
                    {
                        name: 'City',
                        options: @json($cities),
                        selected: ''
                    },
                    {
                        name: 'Price',
                        options: @json($priceRanges),
                        selected: ''
                    },
                    {
                        name: 'Floor Area',
                        options: @json($areaRanges),
                        selected: ''
                    },
                    {
                        name: 'Sort by',
                        options: @json($sortOptions),
                        selected: ''
                    },
                ],
                applyFilters() {
                    const selected = this.filters.reduce((acc, f) => {
                        acc[f.name] = f.selected || null;
                        return acc;
                    }, {});
                    alert(JSON.stringify(selected, null, 2));
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.propertySwiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                navigation: {
                    nextEl: '.customized-button-next',
                    prevEl: '.customized-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    type: 'bullets',
                    clickable: true,
                    dynamicBullets: true,
                    dynamicMainBullets: 5,
                    hideOnClick: true,
                    renderBullet: function(index, className) {
                        return `<span class="${className} inline-block w-12 h-12 text-center text-lg font-bold rounded-lg transition-all">
                    ${index + 1}
                </span>`;
                    },
                },
            });
        });
    </script>
@endsection
