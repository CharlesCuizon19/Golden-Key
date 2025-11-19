@props([
'images' => [],
'imageGalleryCount' => '',
])


<div x-data="{ open: false }" x-cloak x-effect="document.body.classList.toggle('overflow-hidden', open)">
    <button @click="open = true"
        class="flex items-center gap-2 px-5 py-2 transition duration-300 bg-white rounded-lg drop-shadow-md hover:bg-gray-300">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M4.507 6.008A3.24 3.24 0 0 0 3 8.75v6.5c0 2.9 2.35 5.25 5.25 5.25h6.5a3.25 3.25 0 0 0 2.744-1.508l-.122.006l-.122.002h-9a3.75 3.75 0 0 1-3.75-3.75v-9q0-.122.007-.242M8.75 3A3.25 3.25 0 0 0 5.5 6.25v8.5A3.25 3.25 0 0 0 8.75 18h8.5a3.25 3.25 0 0 0 3.25-3.25v-8.5A3.25 3.25 0 0 0 17.25 3zm4.68 9.137l.093.077l4.307 4.188a1.8 1.8 0 0 1-.58.098h-8.5q-.306-.002-.58-.098l4.307-4.188a.75.75 0 0 1 .954-.077M8.75 4.5h8.5c.966 0 1.75.784 1.75 1.75v8.5q-.002.315-.104.595l-4.327-4.207a2.25 2.25 0 0 0-3.003-.12l-.134.12l-4.328 4.208A1.8 1.8 0 0 1 7 14.75v-8.5c0-.966.784-1.75 1.75-1.75m1.75 2.251a1.25 1.25 0 1 0 0 2.499a1.25 1.25 0 0 0 0-2.499" />
        </svg>
        <div class="text-lg font-medium">
            View all {{ $imageGalleryCount }} photos
        </div>
    </button>

    {{-- Modal --}}
    <div x-show="open" x-transition class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60"
        @click.self="open = false">
        <div class="relative w-full max-w-5xl bg-white p-7 rounded-xl">
            <button @click="open = false" class="absolute text-gray-600 top-2 right-3 hover:text-black">✕</button>

            {{-- Main Swiper --}}
            <div class="swiper main-swiper">
                <div class="swiper-wrapper">
                    @foreach ($images as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset($image) }}" class="object-cover w-full rounded-lg aspect-video"
                            alt="">
                    </div>
                    @endforeach
                </div>

                {{-- Navigation --}}
                <div class=" absolute z-40 w-full top-[45%]">
                    <div class="justify-between hidden w-full lg:flex">
                        <button
                            class="p-2 border rounded-lg border-[#D3AC4E]/70 bg-white/10 group ml-5 customized-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="text-[#D3AC4E] transition duration-300 size-10 group-hover:-translate-x-1">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5" d="m14 7l-5 5l5 5" />
                            </svg>
                        </button>
                        <button
                            class="p-2 border rounded-lg bg-white/10 border-[#D3AC4E]/70 group mr-5 customized-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="text-[#D3AC4E] transition duration-300 size-10 group-hover:translate-x-1">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5" d="m10 17l5-5l-5-5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Thumbnail Swiper --}}
            <div class="mt-4 mb-5 swiper thumb-swiper">
                <div class="flex justify-between swiper-wrapper">
                    @foreach ($images as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset($image) }}" class="object-cover w-full h-20 rounded-lg cursor-pointer"
                            alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="hidden w-full border border-black lg:flex">
                <div class="swiper-pagination1"></div>
            </div>
        </div>
    </div>
</div>

<style>
    .swiper-pagination1-bullet {
        width: 12px;
        height: 12px;
        background: #d9d9d9;
        opacity: 0.6;
    }

    .swiper-pagination1-bullet-active {
        background: #ecc467;
        opacity: 1;
    }

    /* Active thumbnail border */
    .thumb-swiper .swiper-slide-thumb-active img {
        border: 3px solid #D3AC4E;
        border-radius: 8px;
    }


    .thumb-swiper .swiper-slide img:hover {
        border: 2px solid #ecc467;
        border-radius: 8px;
    }
</style>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.effect(() => {
            // Initialize Swipers only when modal is open
            document.querySelectorAll(".main-swiper").forEach((el) => {
                if (!el.swiper) {
                    const thumbSwiper = new Swiper(".thumb-swiper", {
                        slidesPerView: 6,
                        spaceBetween: 10,
                        watchSlidesProgress: true,
                    });

                    new Swiper(el, {
                        spaceBetween: 10,
                        navigation: {
                            nextEl: ".customized-button-next",
                            prevEl: ".customized-button-prev",
                        },
                        pagination: {
                            el: ".swiper-pagination1",
                            clickable: true,
                        },
                        thumbs: {
                            swiper: thumbSwiper,
                        },
                        loop: true,
                    });
                }
            });
        });
    });
</script>