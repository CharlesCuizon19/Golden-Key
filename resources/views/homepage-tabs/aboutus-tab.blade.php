<div class="grid grid-cols-1 gap-12 py-20 mx-3 2xl:mx-20 2xl:grid-cols-2">
    <div class="flex flex-col items-start justify-start gap-10">
        <x-title title="About Us" />

        <div class="font-serif text-xl 2xl:text-7xl text-[#20272D]">
            The Golden Standard in Property Management
        </div>

        <div class="leading-snug text-base 2xl:text-2xl text-[#20272D] border-l-4 border-[#ecc467] p-5">
            Golden Key Property Management is a trusted partner for property owners, investors, and developers who seek
            professional care and maximum value for their real estate. We specialize in the seamless management and
            marketing of properties, ensuring worry-free ownership while providing tenants with quality living and
            working spaces.
        </div>

        <x-button buttonName="More About Us" route="home" withIcon="true" />
    </div>
    <div class="flex items-center justify-center">
        <img src="{{ asset('images/aboutus-img.png') }}" alt="">
    </div>
</div>
