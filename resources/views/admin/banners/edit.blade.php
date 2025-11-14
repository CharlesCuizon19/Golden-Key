@extends('layouts.admin')

@section('title', 'Homepage Banner / Edit Banner')

@section('content')
<div class="max-w-screen-xl mx-auto bg-[#121212] p-10 rounded-2xl shadow-xl border border-gray-800">
    <h1 class="text-3xl font-extrabold mb-8 text-[#f37021] tracking-wide">EDIT BANNER</h1>

    <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div>
            <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Title</label>
            <input type="text" name="title" id="title"
                class="w-full bg-[#1a1a1a] text-white placeholder-gray-400 border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#f37021] focus:border-[#f37021] transition"
                value="{{ old('title', $banner->title) }}" placeholder="Enter banner title" required>
            @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

       
        {{-- Image Upload --}}
        <div class="border-2 border-dashed border-gray-600 rounded-xl p-8 text-center bg-[#1a1a1a] hover:border-[#f37021]/60 transition">
            <p class="font-semibold text-white text-lg mb-1">Image Upload</p>
            <p class="text-sm text-gray-400 mb-5">
                Upload a new image to replace the current one (Max 5MB • JPG • PNG • WEBP • GIF)
            </p>

            <div class="flex flex-col items-center gap-4">
                <label for="media" class="cursor-pointer flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 15a4 4 0 014-4h.586a1 1 0 01.707.293l2.414 2.414a1 1 0 001.414 0l2.414-2.414a1 1 0 01.707-.293H17a4 4 0 014 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2v-1z" />
                    </svg>

                    <span class="text-gray-400 mb-3">Click below or drag an image to upload</span>

                    <input type="file" name="media" id="media" class="hidden" accept="image/*">

                    {{-- Upload Button --}}
                    <span
                        class="mt-2 px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 transition-transform shadow-md">
                        Upload Image
                    </span>
                </label>
            </div>

            @error('media')
            <p class="text-red-500 text-sm mt-3">{{ $message }}</p>
            @enderror
        </div>

        {{-- Preview Section --}}
        <div id="preview-container" class="mt-6 text-center">
            <p class="font-semibold text-gray-300 mb-3">Current Image</p>
            <div id="preview" class="relative flex justify-center">
                @if($banner->image)
                <div class="relative inline-block z-50">
                    <img src="{{ asset($banner->image) }}" alt="Banner" class="w-80 h-48 object-cover rounded-lg shadow-lg border border-gray-700">
                    <button type="button" id="remove-current"
                        class="absolute bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center text-sm shadow-lg hover:bg-red-700 transition"
                        style="top:-10px; right:-10px;">
                        ✖
                    </button>
                </div>
                @endif
            </div>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between pt-6">
            <a href="{{ route('admin.banners.index') }}"
                class="px-6 py-2 rounded-lg border border-gray-600 text-gray-300 hover:bg-gray-700 hover:text-white transition">
                ← Back
            </a>
            <button type="submit"
                class="px-6 py-2 bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white rounded-lg font-semibold hover:scale-105 shadow-lg transition">
                Update Banner
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    // ✅ CKEditor setup
    ClassicEditor
        .create(document.querySelector('#subtitle'))
        .then(editor => {
            editor.editing.view.change(writer => {
                const root = editor.editing.view.document.getRoot();
                writer.setStyle('background-color', '#1a1a1a', root);
                writer.setStyle('color', '#ffffff', root);
            });
        })
        .catch(error => console.error(error));

    // ✅ Remove current image
    const removeCurrentBtn = document.getElementById('remove-current');
    if (removeCurrentBtn) {
        removeCurrentBtn.addEventListener('click', function() {
            document.getElementById('preview').innerHTML = '';
            const hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = 'remove_image';
            hidden.value = '1';
            document.querySelector('form').appendChild(hidden);
        });
    }

    // ✅ Live image preview (same as create)
    document.getElementById('media').addEventListener('change', function(event) {
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
                wrapper.style.position = "relative";
                wrapper.style.display = "inline-block";

                const img = document.createElement("img");
                img.src = e.target.result;
                img.className = "w-80 h-48 object-cover rounded-lg shadow-lg border border-gray-700";
                img.style.display = "block";

                const removeBtn = document.createElement("button");
                removeBtn.innerHTML = "✖";
                removeBtn.type = "button";
                removeBtn.className =
                    "absolute bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center text-sm shadow-lg hover:bg-red-700 transition";
                removeBtn.style.top = "-10px";
                removeBtn.style.right = "-10px";
                removeBtn.style.zIndex = "9999";

                removeBtn.onclick = function() {
                    document.getElementById('media').value = "";
                    preview.innerHTML = "";
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