@extends('layouts.admin')

@section('title', 'Units / Edit Unit')

@section('content')
<div class="max-w-screen-xl mx-auto bg-[#121212] p-10 rounded-2xl shadow-xl border border-gray-800">
    <h1 class="text-3xl font-extrabold mb-8 text-[#ecc467] tracking-wide">EDIT UNIT</h1>

    {{-- Pass JSON via hidden div --}}
    <div id="unit-features-json" data-features='@json($unit->features)'></div>

    <form action="{{ route('admin.units.update', $unit->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8" x-data="unitFeatureHandler()">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div>
            <label class="block text-sm text-gray-300 mb-2 font-medium">Unit Title</label>
            <input type="text" name="title" value="{{ $unit->title }}" required
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 placeholder-gray-400 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition">
        </div>

        {{-- Description --}}
        <div>
            <label class="block text-sm text-gray-300 mb-2 font-medium">Description</label>
            <textarea name="description" rows="4" required
                class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-3 placeholder-gray-400 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition">{{ $unit->description }}</textarea>
        </div>

        {{-- Type + Agent --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm text-gray-300 mb-2 font-medium">Unit Type</label>
                <select name="unit_type_id" class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition">
                    @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ $unit->unit_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-2 font-medium">Agent Assigned</label>
                <select name="agent_id" class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#ecc467] focus:border-[#ecc467] transition">
                    @foreach($agents as $agent)
                    <option value="{{ $agent->id }}" {{ $unit->agent_id == $agent->id ? 'selected' : '' }}>{{ $agent->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Specifications --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm text-gray-300 mb-2">SQM</label>
                <input type="number" name="sqm" value="{{ $unit->sqm }}" class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5">
            </div>
        </div>

        {{-- Price + Price Status --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm text-gray-300 mb-2">Price</label>
                <input type="number" name="price" value="{{ $unit->price }}" required
                    class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5">
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-2 font-medium">Price Status</label>
                <select name="price_status" required class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5">
                    <option value="fixed" {{ $unit->price_status == 'fixed' ? 'selected' : '' }}>Fixed</option>
                    <option value="monthly" {{ $unit->price_status == 'monthly' ? 'selected' : '' }}>Monthly</option>
                </select>
            </div>
        </div>

        {{-- Status --}}
        <div>
            <label class="block text-sm text-gray-300 mb-2 font-medium">Status</label>
            <select name="status" class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5">
                <option value="for_sale" {{ $unit->status == 'for_sale' ? 'selected' : '' }}>For Sale</option>
                <option value="for_rent" {{ $unit->status == 'for_rent' ? 'selected' : '' }}>For Rent</option>
                <option value="for_lease" {{ $unit->status == 'for_lease' ? 'selected' : '' }}>For Lease</option>
            </select>
        </div>

        {{-- Location Dropdown --}}
        <div class="space-y-4 mt-4" x-data="addressDropdown()" x-init="init('{{ $unit->location->province }}', '{{ $unit->location->city }}', '{{ $unit->barangay }}')">
            <h2 class="text-lg text-[#ecc467] font-semibold mb-2">Location</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm text-gray-300 mb-2 font-medium">Province</label>
                    <select name="province" x-model="provinceCode" @change="fetchCities()" class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5">
                        <option value="">-- Select Province --</option>
                        <template x-for="prov in provinces" :key="prov.code">
                            <option :value="prov.name" x-text="prov.name" :selected="prov.name === ''"></option>
                        </template>
                    </select>
                </div>

                <div>
                    <label class="block text-sm text-gray-300 mb-2 font-medium">City / Municipality</label>
                    <select name="city" x-model="cityCode" @change="fetchBarangays()" class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5">
                        <option value="">-- Select City / Municipality --</option>
                        <template x-for="city in cities" :key="city.code">
                            <option :value="city.name" x-text="city.name" :selected="city.name === '{{ $unit->location->city }}'"></option>
                        </template>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm text-gray-300 mb-2 font-medium">Barangay</label>
                    <select name="barangay" x-model="barangayCode" class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5">
                        <option value="">-- Select Barangay --</option>
                        <template x-for="bgy in barangays" :key="bgy.code">
                            <option :value="bgy.name" x-text="bgy.name"
                                :selected="bgy.name === '{{ $unit->barangay }}' ? true : false">
                            </option>
                        </template>
                        <!-- In case the saved barangay is not in the API result -->
                        <option x-show="!barangays.find(b => b.name === '{{ $unit->barangay }}')"
                            value="{{ $unit->barangay }}" selected>
                            {{ $unit->barangay }}
                        </option>
                    </select>
                </div>


                <div>
                    <label class="block text-sm text-gray-300 mb-2 font-medium">Zip Code</label>
                    <input type="text" name="zip_code" value="{{ $unit->location->zip_code }}" class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5">
                </div>
            </div>
        </div>

        {{-- Google Maps Embed --}}
        <div>
            <label class="block text-sm text-gray-300 mb-2 font-medium">Google Maps Embed (iframe)</label>
            <textarea name="location_embedded" rows="4" class="w-full bg-[#1a1a1a] text-white border border-gray-700 rounded-lg px-4 py-2.5">{{ $unit->location_embedded }}</textarea>
        </div>

        {{-- Unit Features --}}
        <div class="border border-gray-700 rounded-lg p-5 bg-[#1a1a1a]">
            <h2 class="text-lg text-[#ecc467] font-semibold mb-4">Unit Features</h2>
            <template x-for="(feature, index) in selectedFeatures" :key="index">
                <div class="flex gap-4 mb-3 items-center">
                    <select :name="`features[${index}][id]`" x-model="feature.id" class="bg-[#121212] text-white border border-gray-700 rounded-lg px-3 py-2 w-2/3">
                        <option value="" disabled>Select feature</option>
                        @foreach($features as $f)
                        <option value="{{ $f->id }}">{{ $f->feature_name }}</option>
                        @endforeach
                    </select>
                    <input type="number" min="1" :name="`features[${index}][quantity]`" x-model="feature.quantity" class="bg-[#121212] text-white border border-gray-700 rounded-lg px-3 py-2 w-1/3" placeholder="Qty" required>
                    <button type="button" @click="removeFeature(index)" class="px-2 py-1 bg-red-600 hover:bg-red-700 text-white rounded-lg">Remove</button>
                </div>
            </template>
            <button type="button" @click="addFeature()" class="px-4 py-2 bg-[#ecc467] hover:bg-[#e6b857] text-black rounded-lg font-semibold mt-2">Add Feature</button>
        </div>

        {{-- Images --}}
        <div class="border-2 border-dashed border-gray-600 rounded-xl p-8 bg-[#1a1a1a] text-center">
            <p class="font-semibold text-white text-lg">Current Images</p>
            <div id="existing-images" class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-5">
                @foreach($unit->images as $img)
                <div class="relative w-full h-40 rounded-lg border border-gray-700">
                    <img src="{{ asset($img->image_path) }}" class="w-full h-full object-cover">
                    <button type="button" class="absolute bg-red-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-xs hover:bg-red-700" style="top:-12px; right:-12px" onclick="removeExistingImage({{ $img->id }})">✖</button>
                </div>
                @endforeach
            </div>

            <input type="hidden" name="deleted_images" id="deleted_images">

            <hr class="my-6 border-gray-700">

            <p class="font-semibold text-white text-lg">Add More Images</p>
            <input type="file" name="images[]" id="images" multiple accept="image/*" class="hidden">
            <label for="images" class="cursor-pointer bg-[#ecc467] text-black px-5 py-2 rounded-lg font-semibold">Select Images</label>
            <div id="preview-container" class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-5"></div>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between pt-6">
            <a href="{{ route('admin.units.index') }}" class="px-6 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700">← Back</a>
            <button type="submit" class="px-6 py-2 bg-[#ecc467] text-black rounded-lg font-semibold hover:scale-105 shadow-xl">Update Unit</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // ---------------------------
    // DELETE EXISTING IMAGES
    // ---------------------------
    let deletedImages = [];

    function removeExistingImage(id) {
        deletedImages.push(id);
        document.getElementById('deleted_images').value = JSON.stringify(deletedImages);
        event.target.parentElement.remove();
    }

    // ---------------------------
    // IMAGE PREVIEW
    // ---------------------------
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
                const wrapper = document.createElement('div');
                wrapper.className = 'relative w-full h-40 rounded-lg border border-gray-700';
                const img = document.createElement('img');
                img.src = evt.target.result;
                img.className = 'w-full h-full object-cover';
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.innerHTML = '✖';
                removeBtn.className = 'absolute bg-red-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-xs hover:bg-red-700';
                removeBtn.style.top = '-12px';
                removeBtn.style.right = '-12px';
                removeBtn.onclick = () => {
                    filesArray.splice(index, 1);
                    updatePreview();
                };
                wrapper.appendChild(img);
                wrapper.appendChild(removeBtn);
                previewContainer.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });
    }

    // ---------------------------
    // ALPINE.JS FEATURE HANDLER
    // ---------------------------
    function unitFeatureHandler() {
        return {
            selectedFeatures: [],
            init() {
                let el = document.getElementById('unit-features-json');
                let phpFeatures = JSON.parse(el.dataset.features);
                this.selectedFeatures = phpFeatures.map(f => ({
                    id: f.id,
                    quantity: f.pivot.quantity
                }));
            },
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

    // ---------------------------
    // ALPINE.JS ADDRESS DROPDOWN
    // ---------------------------
    function addressDropdown() {
        return {
            provinces: [],
            cities: [],
            barangays: [],
            provinceCode: '',
            cityCode: '',
            barangayCode: '',

            init(province = '', city = '', barangay = '') {
                this.fetchProvinces().then(() => {
                    if (province) this.provinceCode = province;
                    this.fetchCities().then(() => {
                        if (city) this.cityCode = city;
                        if (city) {
                            this.fetchBarangays().then(() => {
                                if (barangay) this.barangayCode = barangay; // set after barangays are loaded
                            });
                        }
                    });
                });
            },

            async fetchProvinces() {
                const res = await fetch('https://psgc.cloud/api/provinces');
                this.provinces = await res.json();
            },

            async fetchCities() {
                this.cities = [];
                this.barangays = [];
                this.cityCode = '';
                this.barangayCode = '';
                if (!this.provinceCode) return;
                const res = await fetch(`https://psgc.cloud/api/provinces/${this.provinceCode}/cities`);
                this.cities = await res.json();
            },

            async fetchBarangays() {
                this.barangays = [];
                this.barangayCode = '';
                if (!this.cityCode) return;
                const res = await fetch(`https://psgc.cloud/api/cities/${this.cityCode}/barangays`);
                this.barangays = await res.json();
            }
        }
    }
</script>
@endpush