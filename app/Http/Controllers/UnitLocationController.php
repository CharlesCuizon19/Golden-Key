<?php

namespace App\Http\Controllers;

use App\Models\UnitLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UnitLocationController extends Controller
{
    public function index()
    {
        $locations = UnitLocation::withCount('units')
            ->latest()
            ->paginate(10);

        return view('admin.unit_locations.index', compact('locations'));
    }


    public function create()
    {
        return view('admin.unit_locations.create');
    }

    public function store(Request $request)
    {
        Log::info('UnitLocation store called', ['data' => $request->all()]);

        try {
            $validated = $request->validate([
                'province'  => 'required|string|max:255',
                'city'      => 'required|string|max:255',
                'zip_code'  => 'nullable|string|max:20',
                'image'     => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
            ]);

            // Prevent duplicates
            $location = UnitLocation::firstOrCreate(
                [
                    'province' => $validated['province'],
                    'city'     => $validated['city'],
                ],
                [
                    'zip_code' => $validated['zip_code'] ?? null,
                    'image'    => null,
                ]
            );

            // Store image
            if ($request->hasFile('image')) {
                $fileName = time() . "_" . $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('storage/location_images'), $fileName);

                $location->update([
                    'image' => 'storage/location_images/' . $fileName
                ]);
            }

            return redirect()->route('admin.unit_locations.index')->with('success', 'Location created successfully.');
        } catch (\Exception $e) {
            Log::error('Location store error', ['error' => $e->getMessage()]);
            return back()->with('error', 'Something went wrong while saving location.');
        }
    }

    public function edit($id)
    {
        $location = UnitLocation::findOrFail($id);
        return view('admin.unit_locations.edit', compact('location'));
    }

    public function update(Request $request, UnitLocation $unit_location)
    {
        // Log the request
        Log::info('UnitLocation update called', [
            'location_id' => $unit_location->id,
            'data' => $request->all()
        ]);

        try {
            // Validate input
            $validated = $request->validate([
                'province'  => 'nullable|string|max:255',
                'city'      => 'nullable|string|max:255',
                'zip_code'  => 'nullable|string|max:20',
                'image'     => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120',
            ]);

            // Update main fields
            $unit_location->update($validated);

            // Handle image upload
            if ($request->hasFile('image')) {

                // Delete old image if exists
                if ($unit_location->image && file_exists(public_path($unit_location->image))) {
                    unlink(public_path($unit_location->image));
                }

                // Save new image
                $file = $request->file('image');
                $fileName = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path('storage/location_images'), $fileName);

                // Update database with image path
                $unit_location->update([
                    'image' => 'storage/location_images/' . $fileName
                ]);

                Log::info('Image updated successfully', [
                    'path' => 'storage/location_images/' . $fileName
                ]);
            }

            return redirect()->route('admin.unit-location.index')
                ->with('success', 'Location updated successfully.');
        } catch (\Exception $e) {
            Log::error('Location update error', ['error' => $e->getMessage()]);
            return back()->with('error', 'Something went wrong while updating location.');
        }
    }



    public function destroy(UnitLocation $location)
    {
        // Prevent deletion if has related units
        if ($location->units()->count() > 0) {
            return back()->with('error', 'Cannot delete. Location still assigned to units.');
        }

        // Delete image
        if ($location->image && file_exists(public_path($location->image))) {
            unlink(public_path($location->image));
        }

        $location->delete();

        return redirect()->route('admin.unit_locations.index')->with('success', 'Location deleted successfully.');
    }
}
