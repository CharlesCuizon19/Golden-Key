@extends('layouts.admin')

@section('title', 'Agents / Create Agent')

@section('content')
<div class="max-w-screen-xl mx-auto bg-[#121212] p-10 rounded-2xl shadow-xl border border-gray-800">
    <h1 class="text-3xl font-extrabold mb-8 text-[#f37021] tracking-wide">CREATE AGENT</h1>

    <form action="{{ route('admin.agents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        {{-- Name --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Name</label>
            <input type="text" name="name" id="name"
                class="w-full bg-[#1a1a1a] text-white placeholder-gray-400 border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition"
                value="{{ old('name') }}" placeholder="Enter agent name" required>
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Position --}}
        <div>
            <label for="position" class="block text-sm font-medium text-gray-300 mb-2">Position</label>
            <input type="text" name="position" id="position"
                class="w-full bg-[#1a1a1a] text-white placeholder-gray-400 border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition"
                value="{{ old('position') }}" placeholder="Enter agent position" required>
            @error('position')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Image Upload --}}
        <div
            class="border-2 border-dashed border-gray-600 rounded-xl p-8 text-center bg-[#1a1a1a] hover:border-[#f37021]/60 transition">
            <p class="font-semibold text-white text-lg mb-1">Image Upload</p>
            <p class="text-sm text-gray-400 mb-5">
                Upload an agent image (Max 5MB • JPG • PNG • WEBP • GIF)
            </p>

            <div class="flex flex-col items-center gap-4">
                <label for="image" class="cursor-pointer flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 15a4 4 0 014-4h.586a1 1 0 01.707.293l2.414 2.414a1 1 0 001.414 0l2.414-2.414a1 1 0 01.707-.293H17a4 4 0 014 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2v-1z" />
                    </svg>

                    <span class="text-gray-400 mb-3">Click below or drag an image to upload</span>

                    <input type="file" name="image" id="image" class="hidden" accept="image/*">

                    <span
                        class="mt-2 px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 transition-transform shadow-md">
                        Upload Image
                    </span>
                </label>
            </div>

            @error('image')
            <p class="text-red-500 text-sm mt-3">{{ $message }}</p>
            @enderror
        </div>

        {{-- Preview Section --}}
        <div id="preview-container" class="hidden mt-6 text-center">
            <p class="font-semibold text-gray-300 mb-3">Preview</p>
            <div id="preview" class="relative flex justify-center"></div>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between pt-6">
            <a href="{{ route('admin.agents.index') }}"
                class="px-6 py-2 rounded-lg border border-gray-600 text-gray-300 hover:bg-gray-700 hover:text-white transition">
                ← Back
            </a>
            <button type="submit"
                class="px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 shadow-lg transition">
                Save Agent
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    // Image Preview
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('preview-container');
        const preview = document.getElementById('preview');
        preview.innerHTML = "";

        if (file && file.type.startsWith("image/")) {
            previewContainer.classList.remove('hidden');
            const reader = new FileReader();

            reader.onload = function(e) {
                const wrapper = document.createElement("div");
                wrapper.className = "relative inline-block z-50";

                const img = document.createElement("img");
                img.src = e.target.result;
                img.className = "w-80 h-48 object-cover rounded-lg shadow-lg border border-gray-700";

                const removeBtn = document.createElement("button");
                removeBtn.innerHTML = "✖";
                removeBtn.type = "button";
                removeBtn.className =
                    "absolute bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center text-sm shadow-lg hover:bg-red-700 transition";
                removeBtn.style.top = "-10px";
                removeBtn.style.right = "-10px";

                removeBtn.onclick = function() {
                    document.getElementById('image').value = "";
                    preview.innerHTML = "";
                    previewContainer.classList.add('hidden');
                };

                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                preview.appendChild(wrapper);
            };

            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection