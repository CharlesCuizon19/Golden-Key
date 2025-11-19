@extends('layouts.admin')

@section('title', 'Units / Create Unit')

@section('content')
<div class="max-w-screen-xl mx-auto bg-[#121212] p-10 rounded-2xl shadow-xl border border-gray-800">
    <h1 class="text-3xl font-extrabold mb-8 text-[#ecc467] tracking-wide">CREATE UNIT</h1>

    <form action="{{ route('admin.units.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8" x-data="unitFeatureHandler()">
        @csrf

        {{-- Title --}}
        <div>
            <label class="block text-sm text-gray-300 mb-2 font-medium">Unit Title</label>
            <input type="text" name="title" placeholder="Enter unit title"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 placeholder-gray-400 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition"
                required>
            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Description --}}
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-300 mb-2">
                Description
            </label>
            <textarea
                name="description"
                id="description"
                placeholder="Enter unit description"
                rows="4"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-3 placeholder-gray-400 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition duration-200 ease-in-out hover:border-gray-500 resize-none"
                required></textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
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
        <div class="space-y-6">
            <div>
                <label class="block text-sm text-gray-300 mb-2">SQM</label>
                <input type="number" name="sqm" placeholder="ex: 45"
                    class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 placeholder-gray-400 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition">
            </div>
        </div>

        {{-- Price + Price Status --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm text-gray-300 mb-2">Price</label>
                <input type="number" name="price" placeholder="ex: 3500000"
                    class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 placeholder-gray-400 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition"
                    required>
                @error('price') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-2 font-medium">Price Status</label>
                <select name="price_status"
                    class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition"
                    required>
                    <option value="fixed">Fixed</option>
                    <option value="monthly">Monthly</option>
                </select>
                @error('price_status') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
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

        {{-- Location Fields (Dropdown with API) --}}
        <div class="space-y-4 mt-4" x-data="addressDropdown()" x-init="init()">
            <h2 class="text-lg text-[#ecc467] font-semibold mb-2">Add New Location</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm text-gray-300 mb-2 font-medium">Province</label>
                    <div class="relative z-[999]">
                        <select
                            name="province"
                            x-model="provinceCode"
                            @change="fetchCities()"
                            class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 
                           focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition appearance-none">
                            <option value="">-- Select Province --</option>
                            <template x-for="prov in provinces" :key="prov.code">
                                <option :value="prov.name" x-text="prov.name"></option>
                            </template>
                        </select>
                    </div>
                    @error('province') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm text-gray-300 mb-2 font-medium">City / Municipality</label>
                    <div class="relative z-[999]">
                        <select
                            name="city"
                            x-model="cityCode"
                            @change="fetchBarangays()"
                            class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 
                           focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition appearance-none">
                            <option value="">-- Select City / Municipality --</option>
                            <template x-for="city in cities" :key="city.code">
                                <option :value="city.name" x-text="city.name"></option>
                            </template>
                        </select>
                    </div>
                    @error('city') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm text-gray-300 mb-2 font-medium">Barangay</label>
                    <div class="relative z-[999]">
                        <select
                            name="barangay"
                            x-model="barangayCode"
                            class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 
                           focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition appearance-none">
                            <option value="">-- Select Barangay --</option>
                            <template x-for="bgy in barangays" :key="bgy.code">
                                <option :value="bgy.name" x-text="bgy.name"></option>
                            </template>
                        </select>
                    </div>
                    @error('barangay') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm text-gray-300 mb-2 font-medium">Zip Code</label>
                    <input
                        type="text"
                        name="zip_code"
                        placeholder="Enter zip code"
                        class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 
                       placeholder-gray-400 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition">
                    @error('zip_code') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        {{-- Google Maps Embed --}}
        <div>
            <label class="block text-sm text-gray-300 mb-2 font-medium">Google Maps Embed (iframe)</label>
            <textarea name="location_embedded" placeholder="Paste Google Maps iframe or link here..." rows="4"
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 placeholder-gray-400 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition"></textarea>
            @error('location_embedded') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Unit Features --}}
        <div class="border border-gray-700 rounded-lg p-5 bg-[#1a1a1a]">
            <h2 class="text-lg text-[#ecc467] font-semibold mb-4">Unit Features</h2>

            <template x-for="(feature, index) in selectedFeatures" :key="index">
                <div class="flex gap-4 mb-3 items-center">
                    <select :name="`features[${index}][id]`" x-model="feature.id"
                        class="bg-[#121212] text-white border border-gray-700 rounded-lg px-3 py-2 w-2/3 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition">
                        <option value="" disabled>Select feature</option>
                        @foreach($features as $f)
                        <option value="{{ $f->id }}">{{ $f->feature_name }}</option>
                        @endforeach
                    </select>
                    <input type="number" min="1" :name="`features[${index}][quantity]`" x-model="feature.quantity"
                        class="bg-[#121212] text-white border border-gray-700 rounded-lg px-3 py-2 w-1/3 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition"
                        placeholder="Qty" required>
                    <button type="button" @click="removeFeature(index)"
                        class="px-2 py-1 bg-red-600 hover:bg-red-700 text-white rounded-lg transition">Remove</button>
                </div>
            </template>

            <button type="button" @click="addFeature()"
                class="px-4 py-2 bg-[#ecc467] hover:bg-[#e6b857] text-black rounded-lg font-semibold transition mt-2">Add Feature</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//unpkg.com/alpinejs" defer></script>

<script>
    // Image preview
    const imagesInput = document.getElementById('images');
    const previewContainer = document.getElementById('preview-container');
    let filesArray = [];

    imagesInput.addEventListener('change', function(e) {
        filesArray = Array.from(e.target.files);
        updatePreview();
    });

    function updatePreview() {
        previewContainer.innerHTML = '';
        filesArray.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(evt) {
                const wrapper = document.createElement('div');
                wrapper.className = 'relative w-full h-40 rounded-lg border border-gray-700 overflow-visible';

                const img = document.createElement('img');
                img.src = evt.target.result;
                img.className = 'w-full h-full object-cover';

                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.innerHTML = '✖';
                removeBtn.className = 'absolute bg-red-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-xs hover:bg-red-700 shadow-lg transition';
                removeBtn.style.top = '-12px';
                removeBtn.style.right = '-12px';
                removeBtn.addEventListener('click', () => {
                    filesArray.splice(index, 1);
                    updatePreview();
                });

                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                previewContainer.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });
    }

    // Alpine.js for unit features
    function unitFeatureHandler() {
        return {
            selectedFeatures: [],
            addFeature() {
                this.selectedFeatures.push({
                    id: '',
                    quantity: 1
                });
            },
            removeFeature(index) {
                this.selectedFeatures.splice(index, 1);
            }
        }
    }

    // SweetAlert messages
    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        confirmButtonColor: '#ecc467'
    });
    @endif
    @if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: "{{ session('error') }}",
        confirmButtonColor: '#ecc467'
    });
    @endif

    // Alpine.js for Address Dropdown
    function addressDropdown() {
        return {
            provinces: [],
            cities: [],
            barangays: [],
            provinceCode: '',
            cityCode: '',
            barangayCode: '',

            init() {
                this.fetchProvinces();
            },

            async fetchProvinces() {
                const res = await fetch('https://psgc.cloud/api/provinces');
                const data = await res.json();
                this.provinces = data;
            },

            async fetchCities() {
                this.cities = [];
                this.barangays = [];
                if (!this.provinceCode) return;
                const res = await fetch(`https://psgc.cloud/api/provinces/${this.provinceCode}/cities`);
                const data = await res.json();
                this.cities = data;
            },

            async fetchBarangays() {
                this.barangays = [];
                if (!this.cityCode) return;
                const res = await fetch(`https://psgc.cloud/api/cities/${this.cityCode}/barangays`);
                const data = await res.json();
                this.barangays = data;
            }
        }
    }
</script>
@endpush