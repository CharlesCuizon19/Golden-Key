@extends('layouts.admin')

@section('title', 'Unit Location / Edit')

@section('content')
<div class="max-w-screen-xl mx-auto bg-[#121212] p-10 rounded-2xl shadow-xl border border-gray-800">
    <h1 class="text-3xl font-extrabold mb-8 text-[#f37021] tracking-wide">EDIT LOCATION</h1>

    <form action="{{ route('admin.unit-location.update', $location->id) }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-8">

        @csrf
        @method('PUT')

        {{-- City (Display only) --}}
        <div>
            <label class="block text-sm font-medium text-gray-400 mb-2">City</label>
            <input type="text"
                class="w-full bg-[#1a1a1a] text-gray-400 border border-gray-700 rounded-lg px-4 py-2.5"
                value="{{ $location->city }}"
                disabled>
        </div>

        {{-- Total Units (Display only) --}}
        <div>
            <label class="block text-sm font-medium text-gray-400 mb-2">Total Units</label>
            <input type="text"
                class="w-full bg-[#1a1a1a] text-gray-400 border border-gray-700 rounded-lg px-4 py-2.5"
                value="{{ $location->units_count ?? $location->units()->count() }}"
                disabled>
        </div>

        {{-- Image Upload --}}
        <div class="border-2 border-dashed border-gray-600 rounded-xl p-8 text-center bg-[#1a1a1a]">
            <p class="font-semibold text-white text-lg mb-1">Location Image</p>
            <p class="text-sm text-gray-400 mb-5">
                Upload a new image to replace the current one (Max 5MB • JPG • PNG • WEBP)
            </p>

            <label for="image" class="cursor-pointer">
                <span class="px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold shadow-md">
                    Upload Image
                </span>
            </label>
            <input type="file" name="image" id="image" class="hidden" accept="image/*">

            @error('image')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- Current Image Preview --}}
        <div class="mt-6 text-center">
            <p class="font-semibold text-gray-300 mb-3">Current Image</p>
            @if ($location->image)
            <img src="{{ asset($location->image) }}"
                class="w-80 h-48 object-cover rounded-lg shadow-lg border border-gray-700 mx-auto">
            @else
            <p class="text-gray-500">No image uploaded.</p>
            @endif
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between pt-6">
            <a href="{{ route('admin.unit-location.index') }}"
                class="px-6 py-2 rounded-lg border border-gray-600 text-gray-300 hover:bg-gray-700 transition">
                ← Back
            </a>

            <button type="submit"
                class="px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold shadow-lg">
                Update Image
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    // Live image preview
    const imageInput = document.getElementById('image');
    imageInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewContainer = document.querySelector('#preview-container');
        const currentImage = document.querySelector('#current-image');

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                let img = document.createElement('img');
                img.src = e.target.result;
                img.className = "w-80 h-48 object-cover rounded-lg shadow-lg border border-gray-700 mx-auto";

                if (currentImage) {
                    currentImage.replaceWith(img);
                } else {
                    document.querySelector('.mt-6.text-center').appendChild(img);
                }
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection