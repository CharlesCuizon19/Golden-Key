@php
    $properties = [
        (object) [
            'name' => 'The Grand Vista Residences',
            'type' => 'Condominium',
            'status' => 'For Sale',
            'location' => 'Bonifacio Global City, Taguig',
            'bedrooms' => 2,
            'bathrooms' => 2,
            'area' => 82,
            'price' => '9,800,000',
            'price_type' => 'fixed',
            'image' => 'images/grand-vista.png',
        ],
        (object) [
            'name' => 'One Meridian Business Tower',
            'type' => 'Office Space',
            'status' => 'For Lease',
            'location' => 'Ortigas Center, Pasig City',
            'bedrooms' => 0,
            'bathrooms' => 2,
            'area' => 130,
            'price' => '115,000',
            'price_type' => 'month',
            'image' => 'images/meridian-tower.png',
        ],
        (object) [
            'name' => 'Verdant Hills Estate',
            'type' => 'House & Lot',
            'status' => 'For Rent',
            'location' => 'Nuvali, Sta. Rosa, Laguna',
            'bedrooms' => 4,
            'bathrooms' => 3,
            'area' => 210,
            'price' => '80,000',
            'price_type' => 'month',
            'image' => 'images/verdant-hills.png',
        ],
    ];
@endphp

<div class="flex flex-col gap-10 py-20 mx-3 2xl:mx-20">
    <div>
        <x-title title="Listed Properties" />
    </div>
    <div class="flex flex-col justify-between gap-5 2xl:gap-0 2xl:flex-row">
        <div class="font-serif text-xl 2xl:text-6xl text-[#20272d]">
            Explore Our Featured Properties
        </div>
        <div>
            <x-button buttonName="See All Properties" withIcon="true" route="home" />
        </div>
    </div>
    <div class="grid grid-cols-1 gap-8 2xl:grid-cols-3">
        @foreach ($properties as $item)
            <div class="flex flex-col gap-3 cursor-pointer group">
                <div class="relative">
                    <div class="overflow-hidden rounded-lg">
                        <img src="{{ asset($item->image) }}" alt=""
                            class="w-full transition duration-500 group-hover:scale-105">
                    </div>
                    <div
                        class="absolute rounded-lg top-3 text-sm 2xl:text-base left-3 px-4 py-2 text-black {{ $item->status === 'For Sale'
                            ? 'bg-[#9dff00]'
                            : ($item->status === 'For Rent'
                                ? 'bg-[#00e0ff]'
                                : 'bg-[#f6ff00]') }}">
                        {{ $item->status }}
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="rounded-full px-4 py-2 bg-[#e6e6e6] text-sm 2xl:text-lg text-[#20272D]">
                        {{ $item->type }}
                    </div>
                    <div class="flex items-center gap-5">
                        <div class="flex items-center gap-2 text-[#656565]">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <g fill="currentColor">
                                        <path
                                            d="M3 6a1 1 0 0 1 .993.883L4 7v6h6V8a1 1 0 0 1 .883-.993L11 7h8a3 3 0 0 1 2.995 2.824L22 10v8a1 1 0 0 1-1.993.117L20 18v-3H4v3a1 1 0 0 1-1.993.117L2 18V7a1 1 0 0 1 1-1" />
                                        <path d="M7 8a2 2 0 1 1-1.995 2.15L5 10l.005-.15A2 2 0 0 1 7 8" />
                                    </g>
                                </svg>
                            </div>
                            <div class="text-sm font-bold 2xl:text-xl">
                                {{ $item->bedrooms }}
                            </div>
                        </div>
                        <div class="flex items-center gap-2 text-[#656565]">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                    <path fill="currentColor"
                                        d="M3.5 4.135a1.635 1.635 0 0 1 3.153-.607l.144.358a4.1 4.1 0 0 0-1.38 1.774a4.18 4.18 0 0 0-.02 3.107a.75.75 0 0 0 .995.413l5.96-2.566a.75.75 0 0 0 .402-.963a3.97 3.97 0 0 0-2.132-2.213a3.84 3.84 0 0 0-2.466-.192l-.11-.275A3.135 3.135 0 0 0 2 4.135V11h-.25a.75.75 0 0 0 0 1.5H2v.355c0 .375 0 .595.016.84c.142 2.237 1.35 4.302 3.102 5.652l-.039.068l-1 2a.75.75 0 0 0 1.342.67l.968-1.935a7.4 7.4 0 0 0 2.58.765c.245.025.394.03.648.04h.007c.74.028 1.464.045 2.126.045s1.386-.017 2.126-.045h.007c.254-.01.404-.015.648-.04a7.4 7.4 0 0 0 2.58-.765l.968 1.936a.75.75 0 0 0 1.342-.671l-1-2l-.038-.068c1.751-1.35 2.96-3.416 3.102-5.652c.015-.245.015-.465.015-.84v-.038c0-.06 0-.123-.004-.18a2 2 0 0 0-.014-.137h.268a.75.75 0 0 0 0-1.5H3.5z" />
                                </svg>
                            </div>
                            <div class="text-sm font-bold 2xl:text-xl">
                                {{ $item->bathrooms }}
                            </div>
                        </div>
                        <div class="flex items-center gap-2 text-[#656565]">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.5"
                                        d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                                </svg>
                            </div>
                            <div class="text-sm font-bold 2xl:text-xl">
                                {{ $item->area }} sqm
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="text-xl 2xl:text-3xl font-semibold text-[#20272D] group-hover:underline transition duration-700">
                    {{ $item->name }}
                </div>
                <div class="flex items-center gap-2 text-[#656565]">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 12 12">
                            <path fill="currentColor"
                                d="M6 .5A4.5 4.5 0 0 1 10.5 5c0 1.863-1.42 3.815-4.2 5.9a.5.5 0 0 1-.6 0C2.92 8.815 1.5 6.863 1.5 5A4.5 4.5 0 0 1 6 .5m0 3a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3" />
                        </svg>
                    </div>
                    <div class="text-base 2xl:text-xl">
                        {{ $item->location }}
                    </div>
                </div>
                <div class="flex gap-1 items-center text-[#656565] mt-4">
                    <div class="text-lg 2xl:text-2xl text-[#CDA23A] font-semibold">
                        ₱{{ $item->price }}
                    </div>
                    <div class="text-lg 2xl:text-xl">
                        /
                    </div>
                    <div class="text-lg 2xl:text-xl">
                        {{ $item->price_type }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
