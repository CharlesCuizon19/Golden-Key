<?php

namespace App\Http\Controllers;

use App\Exports\NewsletterExport;
use App\Exports\NewslettersExport;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsletters = Newsletter::orderBy('created_at', 'desc')->get();
        return view('admin.newsletters.index', compact('newsletters'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:rfc,dns|max:255|unique:newsletters,email',
        ]);

        Newsletter::create([
            'email' => $validated['email'],
        ]);

        // Always return JSON if AJAX / fetch
        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'You have successfully subscribed!']);
        }

        return redirect()->back()->with('success', 'You have successfully subscribed!');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        $newsletter->delete();

        if (request()->expectsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back()->with('success', 'Newsletter deleted successfully.');
    }
}
