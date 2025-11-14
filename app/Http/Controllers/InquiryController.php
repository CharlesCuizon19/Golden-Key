<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InquiryController extends Controller
{
    /**
     * Display a listing of inquiries.
     */
    public function index()
    {
        $inquiries = Inquiry::latest()->paginate(10);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    /**
     * Show the form for creating a new inquiry (optional if frontend handles it).
     */
    public function create()
    {
        return view('admin.inquiries.create');
    }

    /**
     * Store a newly created inquiry.
     */
    public function store(Request $request)
    {
        Log::info('Inquiry store method called', ['request_data' => $request->all()]);

        try {
            $validated = $request->validate([
                'full_name'   => 'required|string|max:255',
                'email'       => 'required|email|max:255',
                'phone'       => 'required|string|max:20',
                'interested_in' => 'nullable|string|max:255',
                'message'     => 'nullable|string|max:2000',
            ]);

            Inquiry::create($validated);

            Log::info('Inquiry created successfully', ['inquiry' => $validated]);

            return redirect()
                ->route('admin.inquiries.index')
                ->with('success', 'Inquiry submitted successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validation failed', ['errors' => $e->errors()]);
            throw $e;
        } catch (\Exception $e) {
            Log::error('Error storing inquiry', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Something went wrong. Please check logs.');
        }
    }

    /**
     * Show the form for editing the specified inquiry.
     */
    public function edit(Inquiry $inquiry)
    {
        return view('admin.inquiries.edit', compact('inquiry'));
    }

    /**
     * Update the specified inquiry.
     */
    public function update(Request $request, Inquiry $inquiry)
    {
        Log::info('Inquiry update method called', [
            'inquiry_id'   => $inquiry->id,
            'request_data' => $request->all(),
        ]);

        try {
            $validated = $request->validate([
                'full_name'   => 'required|string|max:255',
                'email'       => 'required|email|max:255',
                'phone'       => 'required|string|max:20',
                'interested_in' => 'nullable|string|max:255',
                'message'     => 'nullable|string|max:2000',
            ]);

            $inquiry->update($validated);

            Log::info('Inquiry updated successfully', [
                'inquiry_id'   => $inquiry->id,
                'updated_data' => $validated,
            ]);

            return redirect()
                ->route('admin.inquiries.index')
                ->with('success', 'Inquiry updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating inquiry', [
                'inquiry_id' => $inquiry->id,
                'message'    => $e->getMessage(),
                'trace'      => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Something went wrong during update.');
        }
    }

    /**
     * Remove the specified inquiry.
     */
    public function destroy($id)
    {
        $inquiry = Inquiry::findOrFail($id);

        $inquiry->delete();

        Log::info('Inquiry deleted', ['inquiry_id' => $id]);

        return redirect()->route('admin.inquiries.index')->with('success', 'Inquiry deleted successfully.');
    }
}
