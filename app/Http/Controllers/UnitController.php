<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitImage;
use App\Models\Agent;
use App\Models\UnitType;
use App\Models\UnitFeature;
use App\Models\UnitLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::with(['agent', 'type', 'images', 'features', 'location'])->latest()->paginate(10);
        return view('admin.units.index', compact('units'));
    }

    public function create()
    {
        $agents = Agent::all();
        $types = UnitType::all();
        $features = UnitFeature::all();
        return view('admin.units.create', compact('agents', 'types', 'features'));
    }

    public function store(Request $request)
    {
        Log::info('Unit store method called', ['request_data' => $request->all()]);

        try {
            $validated = $request->validate([
                'title'               => 'required|string|max:255',
                'description'         => 'required|string',
                'sqm'                 => 'required|numeric',
                'province'            => 'nullable|string|max:100',
                'city'                => 'nullable|string|max:100',
                'barangay'            => 'nullable|string|max:100',
                'zip_code'            => 'nullable|string|max:10',
                'location_embedded'   => 'nullable|string',
                'price'               => 'required|numeric',
                'price_status'        => 'required|string|in:fixed,monthly',
                'status'              => 'required|string|in:for_sale,for_rent,for_lease',
                'agent_id'            => 'required|exists:agents,id',
                'unit_type_id'        => 'required|exists:unit_types,id',
                'images.*'            => 'nullable|file|mimes:jpg,jpeg,png,gif,webp|max:5120',
                'features'            => 'nullable|array',
                'features.*.id'       => 'required|integer|exists:unit_features,id',
                'features.*.quantity' => 'required|integer|min:1',
            ]);

            // Handle UnitLocation: avoid duplicates
            $unitLocationId = null;
            if (!empty($validated['province']) && !empty($validated['city'])) {
                $unitLocation = UnitLocation::firstOrCreate(
                    [
                        'province' => $validated['province'],
                        'city'     => $validated['city']
                    ],
                    [
                        'zip_code' => $validated['zip_code'] ?? null,
                        'image'    => null
                    ]
                );
                $unitLocationId = $unitLocation->id;
            }

            // Create Unit
            $unitData = $validated;
            if ($unitLocationId) {
                $unitData['unit_location_id'] = $unitLocationId;
            }

            $unit = Unit::create($unitData);

            // Attach features
            if (!empty($validated['features'])) {
                $featureData = [];
                foreach ($validated['features'] as $feature) {
                    $featureData[$feature['id']] = ['quantity' => $feature['quantity']];
                }
                $unit->features()->sync($featureData);
            }

            // Upload multiple images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('storage/unit_images'), $filename);
                    $unit->images()->create([
                        'image_path' => 'storage/unit_images/' . $filename,
                    ]);
                }
            }

            return redirect()->route('admin.units.index')->with('success', 'Unit and location saved successfully.');
        } catch (\Exception $e) {
            Log::error('Error storing unit', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Something went wrong. Check logs.');
        }
    }

    public function edit(Unit $unit)
    {
        $agents = Agent::all();
        $types = UnitType::all();
        $features = UnitFeature::all();
        return view('admin.units.edit', compact('unit', 'agents', 'types', 'features'));
    }

    public function update(Request $request, Unit $unit)
    {
        Log::info('Unit update method called', [
            'unit_id' => $unit->id,
            'request_data' => $request->all(),
        ]);

        try {
            $validated = $request->validate([
                'title'               => 'required|string|max:255',
                'description'         => 'required|string',
                'sqm'                 => 'required|numeric',
                'province'            => 'nullable|string|max:100',
                'city'                => 'nullable|string|max:100',
                'barangay'            => 'nullable|string|max:100',
                'zip_code'            => 'nullable|string|max:10',
                'location_embedded'   => 'nullable|string',
                'price'               => 'required|numeric',
                'price_status'        => 'required|string|in:fixed,monthly',
                'status'              => 'required|string|in:for_sale,for_rent,for_lease',
                'agent_id'            => 'required|exists:agents,id',
                'unit_type_id'        => 'required|exists:unit_types,id',
                'images.*'            => 'nullable|file|mimes:jpg,jpeg,png,gif,webp|max:5120',
                'remove_images'       => 'nullable|array',
                'remove_images.*'     => 'integer|exists:unit_images,id',
                'features'            => 'nullable|array',
                'features.*.id'       => 'required|integer|exists:unit_features,id',
                'features.*.quantity' => 'required|integer|min:1',
            ]);

            // Update or create UnitLocation: avoid duplicates
            $unitLocationId = null;
            if (!empty($validated['province']) && !empty($validated['city'])) {
                $unitLocation = UnitLocation::firstOrCreate(
                    [
                        'province' => $validated['province'],
                        'city'     => $validated['city']
                    ],
                    [
                        'zip_code' => $validated['zip_code'] ?? null,
                        'image'    => null
                    ]
                );
                $unitLocationId = $unitLocation->id;
            }

            if ($unitLocationId) {
                $validated['unit_location_id'] = $unitLocationId;
            }

            $unit->update($validated);

            // Sync features
            if (!empty($validated['features'])) {
                $featureData = [];
                foreach ($validated['features'] as $feature) {
                    $featureData[$feature['id']] = ['quantity' => $feature['quantity']];
                }
                $unit->features()->sync($featureData);
            } else {
                $unit->features()->detach();
            }

            // Remove images
            if (!empty($validated['remove_images'])) {
                foreach ($validated['remove_images'] as $imageId) {
                    $image = $unit->images()->find($imageId);
                    if ($image && file_exists(public_path($image->image_path))) {
                        unlink(public_path($image->image_path));
                        $image->delete();
                    }
                }
            }

            // Upload new images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('storage/unit_images'), $filename);
                    $unit->images()->create([
                        'image_path' => 'storage/unit_images/' . $filename,
                    ]);
                }
            }

            return redirect()->route('admin.units.index')->with('success', 'Unit updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating unit', [
                'unit_id' => $unit->id,
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Something went wrong during update.');
        }
    }

    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);

        // Delete images
        foreach ($unit->images as $image) {
            if (file_exists(public_path($image->image_path))) {
                unlink(public_path($image->image_path));
            }
            $image->delete();
        }

        // Detach features
        $unit->features()->detach();

        // Delete unit
        $unit->delete();

        return redirect()->route('admin.units.index')->with('success', 'Unit deleted successfully.');
    }
}
