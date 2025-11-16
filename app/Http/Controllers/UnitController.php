<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitImage;
use App\Models\Agent;
use App\Models\UnitType;
use App\Models\UnitFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::with(['agent', 'type', 'images', 'features'])->latest()->paginate(10);
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
                'sqm'                 => 'required|numeric',
                'location_text'       => 'nullable|string|max:255',
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

            $unit = Unit::create($validated);

            // Attach features with quantities
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
                    UnitImage::create([
                        'unit_id'    => $unit->id,
                        'image_path' => 'storage/unit_images/' . $filename,
                    ]);
                }
            }

            return redirect()->route('admin.units.index')->with('success', 'Unit created successfully.');
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
                'sqm'                 => 'required|numeric',
                'location_text'       => 'nullable|string|max:255',
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

        $unit->delete();

        return redirect()->route('admin.units.index')->with('success', 'Unit deleted successfully.');
    }
}
