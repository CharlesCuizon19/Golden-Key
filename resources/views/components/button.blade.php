@props([
    'buttonName' => 'button',
    'route' => '#',
    'withIcon' => 'false',
])

<a href="{{ route($route) }}">
    <div
        class="flex items-center gap-3 bg-[#edc45b] hover:bg-[#f4d16e] w-fit transition px-5 py-3 rounded-md cursor-pointer">
        <div class="text-lg 2xl:text-xl text-[#20272D]">
            {{ $buttonName }}
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                class="{{ $withIcon === 'true' ? 'flex' : 'hidden' }} text-[#20272D] transition duration-300 size-5 2xl:size-8 group-hover:translate-x-1">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="m10 17l5-5l-5-5" />
            </svg>
        </div>
    </div>
</a>
