@props([
'images' => [],
'imageGalleryCount' => '',
'buttonType' => '',
])


<div x-cloak x-data="{ open: false }" x-cloak x-effect="document.body.classList.toggle('overflow-hidden', open)">
    <div class="absolute inset-0 w-full h-full bg-black/40 rounded-xl">
        <div class="flex items-center justify-center h-full">
            <div @click="open = true" class="flex items-center gap-2 text-white cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                </svg>
                <div class="text-lg font-semibold">Show more photos</div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div x-show="open" x-transition class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60"
        @click.self="open = false">
        <div class="relative w-full max-w-5xl bg-white p-7 rounded-xl">
            <button @click="open = false" class="absolute text-gray-600 top-2 right-3 hover:text-black">✕</button>

            {{-- Main Swiper --}}
            <div class="swiper main-swiper2">
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
            <div class="mt-4 mb-5 swiper thumb-swiper2">
                <div class="flex justify-between swiper-wrapper">
                    @foreach ($images as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset($image) }}" class="object-cover w-full h-20 rounded-lg cursor-pointer"
                            alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="hidden w-full lg:flex">
                <div class="swiper-pagination2"></div>
            </div>
        </div>
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }

    .swiper-pagination2-bullet {
        width: 12px;
        height: 12px;
        background: #d9d9d9;
        opacity: 0.6;
    }

    .swiper-pagination2-bullet-active {
        background: #ecc467;
        opacity: 1;
    }

    /* Active thumbnail border */
    .thumb-swiper2 .swiper-slide-thumb-active img {
        border: 3px solid #D3AC4E;
        border-radius: 8px;
    }


    .thumb-swiper2 .swiper-slide img:hover {
        border: 2px solid #ecc467;
        border-radius: 8px;
    }
</style>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.effect(() => {
            // Initialize Swipers only when modal is open
            document.querySelectorAll(".main-swiper2").forEach((el) => {
                if (!el.swiper) {
                    const thumbSwiper = new Swiper(".thumb-swiper2", {
                        slidesPerView: 5,
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
                            el: ".swiper-pagination2",
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