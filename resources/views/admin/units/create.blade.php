@extends('layouts.admin')

@section('title', 'Units / Create Unit')

@section('content')
<div class="max-w-screen-xl mx-auto bg-[#121212] p-10 rounded-2xl shadow-xl border border-gray-800">
    <h1 class="text-3xl font-extrabold mb-8 text-[#ecc467] tracking-wide">CREATE UNIT</h1>

    <form action="{{ route('admin.units.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        {{-- Title --}}
        <div>
            <label class="block text-sm text-gray-300 mb-2 font-medium">Unit Title</label>
            <input type="text" name="title"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 placeholder-gray-400 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition"
                placeholder="Enter unit title" required>
            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Type + Agent --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm text-gray-300 mb-2 font-medium">Unit Type</label>
                <select name="unit_type_id"
                    class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition">
                    <option value="" disabled selected>-- Select Unit Type --</option>
                    @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('unit_type_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-2 font-medium">Agent Assigned</label>
                <select name="agent_id"
                    class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition">
                    <option value="" disabled selected>-- Select Agent --</option>
                    @foreach($agents as $agent)
                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                    @endforeach
                </select>
                @error('agent_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Specifications --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm text-gray-300 mb-2">SQM</label>
                <input type="number" name="sqm"
                    class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 placeholder-gray-400 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition"
                    placeholder="ex: 45">
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-2">Bedrooms</label>
                <input type="number" name="bedroom"
                    class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 placeholder-gray-400 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition">
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-2">Bathrooms</label>
                <input type="number" name="bathrooms"
                    class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 placeholder-gray-400 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition">
            </div>
        </div>

        {{-- Price --}}
        <div>
            <label class="block text-sm text-gray-300 mb-2">Price</label>
            <input type="number" name="price"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 placeholder-gray-400 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition"
                placeholder="ex: 3500000">
        </div>

        {{-- Status --}}
        <div>
            <label class="block text-sm text-gray-300 mb-2 font-medium">Status</label>
            <select name="status"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition">
                <option value="for_sale">For Sale</option>
                <option value="for_rent">For Rent</option>
                <option value="for_lease">For Lease</option>
            </select>
        </div>

        {{-- Location Address --}}
        <div>
            <label class="block text-sm text-gray-300 mb-2 font-medium">Location Address</label>
            <input type="text" name="location_text"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 placeholder-gray-400 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition"
                placeholder="Enter address manually">
            @error('location_text') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Location Embedded --}}
        <div>
            <label class="block text-sm text-gray-300 mb-2 font-medium">Google Maps Embed (iframe code)</label>
            <textarea name="location_embedded"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 placeholder-gray-400 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition"
                placeholder="Paste Google Maps iframe or link here..." rows="4"></textarea>
            @error('location_embedded') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Image Upload --}}
        <div class="border-2 border-dashed border-gray-600 rounded-xl p-8 bg-[#1a1a1a] text-center">
            <p class="font-semibold text-white text-lg">Upload Property Images</p>
            <p class="text-gray-400 text-sm mb-5">You can upload multiple images</p>

            <input type="file" name="images[]" id="images" accept="image/*" multiple class="hidden">
            <label for="images"
                class="cursor-pointer bg-[#ecc467] hover:bg-[#e6b857] text-black px-5 py-2 rounded-lg font-semibold transition">
                Select Images
            </label>

            <div id="preview-container" class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-5"></div>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between pt-6">
            <a href="{{ route('admin.units.index') }}"
                class="px-6 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition">
                ← Back
            </a>

            <button type="submit"
                class="px-6 py-2 bg-[#ecc467] text-black rounded-lg font-semibold hover:scale-105 transition shadow-xl">
                Save Unit
            </button>
        </div>

    </form>
</div>
@endsection

@push('scripts')
<script>
    const imagesInput = document.getElementById('images');
    const previewContainer = document.getElementById('preview-container');
    let filesArray = [];

    imagesInput.addEventListener('change', function(e) {
        const newFiles = Array.from(e.target.files);
        filesArray = filesArray.concat(newFiles);
        updatePreview();
    });

    function updatePreview() {
        previewContainer.innerHTML = '';

        filesArray.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(evt) {
                // Wrapper div for positioning
                const wrapper = document.createElement('div');
                wrapper.className = 'relative w-full h-40 overflow-visible rounded-lg border border-gray-700';

                // Image element
                const img = document.createElement('img');
                img.src = evt.target.result;
                img.className = 'w-full h-full object-cover';

                // Remove button
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.innerHTML = '✖';
                removeBtn.className = 'absolute bg-red-600 text-white w-6 h-6 rounded-full text-xs flex items-center justify-center hover:bg-red-700 shadow-lg transition';

                // Move the button outside the top-right corner
                removeBtn.style.top = '-12px';
                removeBtn.style.right = '-12px';
                removeBtn.style.zIndex = '10';

                removeBtn.addEventListener('click', () => {
                    filesArray.splice(index, 1);
                    updatePreview();
                    imagesInput.value = ''; // reset input
                });

                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                previewContainer.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });
    }
</script>
@endpush