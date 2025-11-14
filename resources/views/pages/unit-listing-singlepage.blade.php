@extends('layouts.app')

@section('content')
    <div>
        <x-banner page="Unit Listing" breadcrumb1="Unit Listing" breadcrumb2="{!! $property->name !!}" />

        <div class="py-20 mx-3 lg:mx-20">
            <div class="grid grid-cols-1 gap-6 pb-16 border-b lg:grid-cols-5">
                <div class="lg:col-span-3">
                    <div class="flex flex-col gap-5">
                        <div class="relative w-full h-full overflow-hidden rounded-xl">
                            <img src="{{ asset($property->image) }}" alt="" class="object-cover w-full h-full">

                            <div class="absolute flex bottom-5 right-5 gap-x-5">
                                <x-gallery-modal :images="$property->image_gallery" propertyImages="false"
                                    imageGalleryCount="{{ $imageGallery_count }}" />
                                <button
                                    class="flex items-center gap-2 px-5 py-2 transition duration-300 bg-white rounded-lg drop-shadow-md hover:bg-gray-300">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81c1.66 0 3-1.34 3-3s-1.34-3-3-3s-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65c0 1.61 1.31 2.92 2.92 2.92s2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92" />
                                        </svg>
                                    </div>
                                    <div class="text-lg font-medium">
                                        Copy Link
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="grid grid-cols-2 gap-3 lg:col-span-2">
                    @foreach ($property->image_gallery as $index => $item)
                        @if ($index < 4)
                            <div class="relative rounded-xl">
                                <img src="{{ asset($item) }}" alt="" class="object-cover w-full h-full rounded-xl">

                                {{-- Show overlay only on 4th image --}}
                                @if ($index === 3)
                                    <div class="absolute inset-0 w-full h-full bg-black/40 rounded-xl">
                                        <div class="flex items-center justify-center h-full">
                                            <div class="flex items-center gap-2 text-white cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                                                </svg>
                                                <div class="text-lg font-semibold">Show more photos</div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <x-gallery-modal :images="[$property->image_gallery]" propertyImages="true" /> --}}
                                    {{-- @include('components.gallery-modal', [
                                        'images' => $property->image_gallery,
                                        'propertyImages' => 'true',
                                    ]) --}}
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="flex flex-col gap-5 lg:col-span-3">
                    <div class="bg-[#e6e6e6] w-fit text-lg px-3 py-1 rounded-full">
                        {{ $property->type }}
                    </div>
                    <div class="text-5xl font-bold">
                        {{ $property->name }}
                    </div>
                    <div class="flex flex-col gap-5">
                        <div class="text-2xl leading-snug text-black/80 line-clamp-5">
                            {{ $property->property_desc }}
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="text-2xl font-bold text-black/80">
                                Read More
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" d="m7 10l5 5l5-5" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 mt-7">
                        <x-title title="Facilities" />
                        <div class="flex flex-wrap gap-16">
                            <div class="flex items-center gap-3 text-black/80">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-10">
                                    <g fill="currentColor">
                                        <path
                                            d="M3 6a1 1 0 0 1 .993.883L4 7v6h6V8a1 1 0 0 1 .883-.993L11 7h8a3 3 0 0 1 2.995 2.824L22 10v8a1 1 0 0 1-1.993.117L20 18v-3H4v3a1 1 0 0 1-1.993.117L2 18V7a1 1 0 0 1 1-1" />
                                        <path d="M7 8a2 2 0 1 1-1.995 2.15L5 10l.005-.15A2 2 0 0 1 7 8" />
                                    </g>
                                </svg>
                                <span class="text-sm font-bold 2xl:text-2xl">{{ $property->bedrooms }} Bedroom(s)</span>
                            </div>
                            <div class="flex items-center gap-3 text-black/80">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-8">
                                    <path fill="currentColor"
                                        d="M3.5 4.135a1.635 1.635 0 0 1 3.153-.607l.144.358a4.1 4.1 0 0 0-1.38 1.774a4.18 4.18 0 0 0-.02 3.107a.75.75 0 0 0 .995.413l5.96-2.566a.75.75 0 0 0 .402-.963a3.97 3.97 0 0 0-2.132-2.213a3.84 3.84 0 0 0-2.466-.192l-.11-.275A3.135 3.135 0 0 0 2 4.135V11h-.25a.75.75 0 0 0 0 1.5H2v.355c0 .375 0 .595.016.84c.142 2.237 1.35 4.302 3.102 5.652l-.039.068l-1 2a.75.75 0 0 0 1.342.67l.968-1.935a7.4 7.4 0 0 0 2.58.765c.245.025.394.03.648.04h.007c.74.028 1.464.045 2.126.045s1.386-.017 2.126-.045h.007c.254-.01.404-.015.648-.04a7.4 7.4 0 0 0 2.58-.765l.968 1.936a.75.75 0 0 0 1.342-.671l-1-2l-.038-.068c1.751-1.35 2.96-3.416 3.102-5.652c.015-.245.015-.465.015-.84v-.038c0-.06 0-.123-.004-.18a2 2 0 0 0-.014-.137h.268a.75.75 0 0 0 0-1.5H3.5z" />
                                </svg>
                                <span class="text-sm font-bold 2xl:text-2xl">{{ $property->bathrooms }} Bathroom(s)</span>
                            </div>
                            <div class="flex items-center gap-3 text-black/80">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-9">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.5"
                                        d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                                </svg>
                                <span class="text-sm font-bold 2xl:text-2xl">{{ $property->area }}
                                    sqm</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 mt-7">
                        <x-title title="Location" />
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15447.586949419088!2d121.0308923678014!3d14.547897314617192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c8ee094965bd%3A0xf42e785026fedb49!2sBonifacio%20Global%20City%2C%20Taguig%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1763013089427!5m2!1sen!2sph"
                            height="450" style="border:0;" allowfullscreen="" loading="lazy" class="w-full rounded-xl"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <div class="flex items-center gap-2 text-black/80">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12" class=" size-6">
                                <path fill="currentColor"
                                    d="M6 .5A4.5 4.5 0 0 1 10.5 5c0 1.863-1.42 3.815-4.2 5.9a.5.5 0 0 1-.6 0C2.92 8.815 1.5 6.863 1.5 5A4.5 4.5 0 0 1 6 .5m0 3a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3" />
                            </svg>
                            <div class="lg:text-2xl">
                                {{ $property->location }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-5 lg:col-span-2">
                    <div
                        class="relative bg-gradient-to-r from-[#21282e] to-[#907c4d] flex flex-col gap-5 p-5 rounded-2xl overflow-hidden">
                        <div
                            class=" w-fit px-4 py-2 text-sm text-black rounded-lg 2xl:text-base {{ $property->status === 'For Sale'
                                ? 'bg-[#9dff00]'
                                : ($property->status === 'For Rent'
                                    ? 'bg-[#00e0ff]'
                                    : 'bg-[#f6ff00]') }}">
                            {{ $property->status }}
                        </div>
                        <div class="text-5xl font-bold text-[#cda23a] flex items-center gap-2">
                            ₱ {{ $property->price }} <span class="text-2xl font-thin text-white">/ fixed</span>
                        </div>
                        <div class="absolute -right-10 -top-10">
                            <img src="{{ asset('images/logo-floater.png') }}" alt="">
                        </div>
                    </div>
                    <div class="bg-[#f8f8f8] p-4 flex flex-col gap-5 rounded-xl">
                        <div class="text-2xl font-bold text-black/80">
                            Agent Details
                        </div>
                        <div class="flex flex-wrap justify-between w-full p-5 bg-white border rounded-xl">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('images/sample-user.avif') }}" alt=""
                                    class="object-cover w-[75px] h-auto rounded-full">
                                <div class="flex flex-col gap-2">
                                    <span class="font-serif text-3xl">
                                        Michonne Estubio
                                    </span>
                                    <span class="text-xl font-medium text-gray-600">
                                        Real Estate Agent
                                    </span>
                                </div>
                            </div>
                            <div class="bg-[#f3f3f3] rounded-lg text-center text-[#656565] p-3 flex flex-col gap-2">
                                <div class="text-2xl font-bold">
                                    18
                                </div>
                                <div class="text-xl">
                                    Listed Units
                                </div>
                            </div>
                        </div>
                        <div class="grid flex-wrap grid-cols-1 gap-5 lg:grid-cols-2">
                            <button class="bg-[#ecc467] w-full p-5 rounded-lg hover:bg-[#f4d16e] transition duration-300">
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
                                    <span class="text-xl text-center">
                                        Inquire Now
                                    </span>
                                </div>
                            </button>
                            <button
                                class="bg-[#20272d] hover:bg-[#39434c] transition duration-300 w-full p-5 rounded-lg text-white">
                                <div class="flex items-center justify-center w-full gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class=" size-5">
                                        <path fill="currentColor"
                                            d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24c1.12.37 2.33.57 3.57.57c.55 0 1 .45 1 1V20c0 .55-.45 1-1 1c-9.39 0-17-7.61-17-17c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02z" />
                                    </svg>
                                    <span class="text-xl text-center ">
                                        Call Agent
                                    </span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-10 pt-16">
                <div class="flex flex-wrap items-center justify-between w-full">
                    <div class="font-serif text-5xl">
                        Explore Other Properties
                    </div>
                    <x-button buttonName="See All Properties" withIcon="true" route="unit-listing.all" />
                </div>
                <div class="grid grid-cols-1 gap-10 lg:grid-cols-3">
                    @foreach ($latestProperties as $item)
                        <a href="{{ route('unit-listing.singlepage', ['id' => $item->id]) }}"
                            class="flex flex-col gap-3 cursor-pointer group">
                            <div class="relative">
                                <div class="overflow-hidden rounded-lg">
                                    <img src="{{ asset($item->image) }}" loading="lazy"
                                        class="w-full  h-[20rem] object-cover transition duration-500 group-hover:scale-105">
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
                                <div class="px-4 py-2 text-sm text-[#20272D] bg-[#e6e6e6] rounded-full 2xl:text-lg">
                                    {{ $item->type }}
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
                                        <span class="text-sm font-bold 2xl:text-xl">{{ $item->bedrooms }}</span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                            <path fill="currentColor"
                                                d="M3.5 4.135a1.635 1.635 0 0 1 3.153-.607l.144.358a4.1 4.1 0 0 0-1.38 1.774a4.18 4.18 0 0 0-.02 3.107a.75.75 0 0 0 .995.413l5.96-2.566a.75.75 0 0 0 .402-.963a3.97 3.97 0 0 0-2.132-2.213a3.84 3.84 0 0 0-2.466-.192l-.11-.275A3.135 3.135 0 0 0 2 4.135V11h-.25a.75.75 0 0 0 0 1.5H2v.355c0 .375 0 .595.016.84c.142 2.237 1.35 4.302 3.102 5.652l-.039.068l-1 2a.75.75 0 0 0 1.342.67l.968-1.935a7.4 7.4 0 0 0 2.58.765c.245.025.394.03.648.04h.007c.74.028 1.464.045 2.126.045s1.386-.017 2.126-.045h.007c.254-.01.404-.015.648-.04a7.4 7.4 0 0 0 2.58-.765l.968 1.936a.75.75 0 0 0 1.342-.671l-1-2l-.038-.068c1.751-1.35 2.96-3.416 3.102-5.652c.015-.245.015-.465.015-.84v-.038c0-.06 0-.123-.004-.18a2 2 0 0 0-.014-.137h.268a.75.75 0 0 0 0-1.5H3.5z" />
                                        </svg>
                                        <span class="text-sm font-bold 2xl:text-xl">{{ $item->bathrooms }}</span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"
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
        </div>
    </div>
@endsection
