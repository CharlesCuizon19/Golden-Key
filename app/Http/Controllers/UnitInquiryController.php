<?php

namespace App\Http\Controllers;

use App\Models\UnitInquiry;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UnitInquiryController extends Controller
{
    /**
     * Display a listing of unit inquiries.
     */
    public function index()
    {
        try {
            $inquiries = UnitInquiry::with('unit')->latest()->paginate(10);
            Log::info('Loaded unit inquiries list', ['count' => $inquiries->count()]);
            return view('admin.unit_inquiries.index', compact('inquiries'));
        } catch (\Throwable $e) {
            Log::error('Error loading unit inquiries', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to load unit inquiries.');
        }
    }

    /**
     * Show the form for creating a new inquiry.
     */
    public function create()
    {
        try {
            $units = Unit::all();
            Log::info('Loaded create inquiry form', ['units_count' => $units->count()]);
            return view('admin.unit_inquiries.create', compact('units'));
        } catch (\Throwable $e) {
            Log::error('Error loading inquiry creation form', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to load inquiry creation form.');
        }
    }

    /**
     * Store a newly created unit inquiry in storage.
     */
    public function store(Request $request)
    {
        try {
            Log::info('Incoming unit inquiry data', $request->all());

            $validated = $request->validate([
                'unit_id' => 'required|exists:units,id',
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:50',
                'message' => 'nullable|string',
            ]);

            $inquiry = UnitInquiry::create($validated);

            Log::info('Unit inquiry created successfully', ['inquiry_id' => $inquiry->id]);

            // Return JSON if the request expects JSON
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Inquiry submitted successfully!',
                ]);
            }

            // Otherwise, normal redirect
            return redirect()->route('admin.unit_inquiries.index')
                ->with('success', 'Unit inquiry created successfully!');
        } catch (\Illuminate\Validation\ValidationException $ve) {
            Log::warning('Validation failed for unit inquiry', ['errors' => $ve->errors()]);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $ve->errors()
                ], 422);
            }

            return back()->withErrors($ve->errors())->withInput();
        } catch (\Throwable $e) {
            Log::error('Error storing unit inquiry', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to submit inquiry.',
                ], 500);
            }

            return back()->with('error', 'Failed to create unit inquiry.');
        }
    }

    /**
     * Display the specified inquiry.
     */
    public function show(UnitInquiry $unitInquiry)
    {
        try {
            $unitInquiry->load('unit');
            Log::info('Showing unit inquiry', ['id' => $unitInquiry->id]);
            return view('admin.unit_inquiries.show', compact('unitInquiry'));
        } catch (\Throwable $e) {
            Log::error('Error showing unit inquiry', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to show unit inquiry.');
        }
    }

    /**
     * Show the form for editing the specified inquiry.
     */
    public function edit(UnitInquiry $unitInquiry)
    {
        try {
            $units = Unit::all();
            Log::info('Editing unit inquiry', ['id' => $unitInquiry->id]);
            return view('admin.unit_inquiries.edit', compact('unitInquiry', 'units'));
        } catch (\Throwable $e) {
            Log::error('Error editing unit inquiry', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to load inquiry edit form.');
        }
    }

    /**
     * Update the specified unit inquiry in storage.
     */
    public function update(Request $request, UnitInquiry $unitInquiry)
    {
        try {
            Log::info('Updating unit inquiry', ['id' => $unitInquiry->id]);

            $validated = $request->validate([
                'unit_id' => 'required|exists:units,id',
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:50',
                'message' => 'nullable|string',
            ]);

            $unitInquiry->update($validated);

            Log::info('Unit inquiry updated successfully', ['id' => $unitInquiry->id]);

            return redirect()->route('admin.unit_inquiries.index')
                ->with('success', 'Unit inquiry updated successfully!');
        } catch (\Throwable $e) {
            Log::error('Error updating unit inquiry', [
                'id' => $unitInquiry->id,
                'error' => $e->getMessage(),
            ]);
            return back()->with('error', 'Failed to update unit inquiry.');
        }
    }

    /**
     * Remove the specified inquiry from storage.
     */
    public function destroy(UnitInquiry $unitInquiry)
    {
        try {
            $unitInquiry->delete();
            Log::info('Unit inquiry deleted successfully', ['id' => $unitInquiry->id]);

            return redirect()->back()->with('success', 'Unit inquiry deleted successfully!');
        } catch (\Throwable $e) {
            Log::error('Error deleting unit inquiry', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to delete unit inquiry.');
        }
    }
}
