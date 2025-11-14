<?php

namespace App\Http\Controllers;

use App\Models\UnitType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UnitTypeController extends Controller
{
    /**
     * Display a listing of the unit types.
     */
    public function index()
    {
        $types = UnitType::latest()->paginate(10);
        return view('admin.unit-types.index', compact('types'));
    }

    /**
     * Store a newly created unit type.
     */
    public function store(Request $request)
    {
        Log::info('UnitType store method called', ['request_data' => $request->all()]);

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:unit_types,name',
            ]);

            $unitType = UnitType::create($validated);

            Log::info('UnitType created successfully', ['unit_type' => $unitType]);

            return redirect()->route('admin.unit-type.index')
                ->with('success', 'Unit type created successfully.');
        } catch (\Exception $e) {
            Log::error('Error storing unit type', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Something went wrong. Please check logs.');
        }
    }

    public function edit(UnitType $unitType)
    {
        // Optional: just redirect back to index with modal open
        return redirect()->route('admin.unit-type.index')
            ->with(['editId' => $unitType->id, 'editName' => $unitType->name]);
    }

    /**
     * Update the specified unit type.
     */
    public function update(Request $request, UnitType $unitType)
    {
        Log::info('UnitType update method called', [
            'unit_type_id' => $unitType->id,
            'request_data' => $request->all(),
        ]);

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:unit_types,name,' . $unitType->id,
            ]);

            $unitType->update($validated);

            Log::info('UnitType updated successfully', ['unit_type_id' => $unitType->id]);

            return redirect()->route('admin.unit-type.index')
                ->with('success', 'Unit type updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating unit type', [
                'unit_type_id' => $unitType->id,
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Something went wrong during update.');
        }
    }

    /**
     * Remove the specified unit type.
     */
    public function destroy(UnitType $unitType)
    {
        try {
            $unitType->delete();
            Log::info('UnitType deleted', ['unit_type_id' => $unitType->id]);

            return redirect()->route('admin.unit-type.index')
                ->with('success', 'Unit type deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting unit type', [
                'unit_type_id' => $unitType->id,
                'message' => $e->getMessage(),
            ]);

            return back()->with('error', 'Failed to delete unit type.');
        }
    }
}
