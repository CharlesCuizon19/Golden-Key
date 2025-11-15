<?php

namespace App\Http\Controllers;

use App\Models\UnitFeature;
use Illuminate\Http\Request;

class UnitFeatureController extends Controller
{
    public function index()
    {
        $features = UnitFeature::latest()->paginate(10);
        return view('admin.unit_features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.unit_features.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'feature_name' => 'required|string|max:255',
        ]);

        UnitFeature::create($validated);

        return redirect()->route('admin.unit-feature.index')->with('success', 'Feature created successfully.');
    }

    public function edit(UnitFeature $unitFeature)
    {
        return view('admin.unit-feature.edit', compact('unitFeature'));
    }

    public function update(Request $request, UnitFeature $unitFeature)
    {
        $validated = $request->validate([
            'feature_name' => 'required|string|max:255',
        ]);

        $unitFeature->update($validated);

        return redirect()->route('admin.unit-feature.index')->with('success', 'Feature updated successfully.');
    }

    public function destroy(UnitFeature $unitFeature)
    {
        $unitFeature->delete();
        return redirect()->route('admin.unit-feature.index')->with('success', 'Feature deleted successfully.');
    }
}
