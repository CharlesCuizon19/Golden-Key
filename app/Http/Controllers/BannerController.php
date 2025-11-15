<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::latest()->paginate(10);
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created banner (image only).
     */
    public function store(Request $request)
    {
        Log::info('Banner store method called', ['request_data' => $request->all()]);

        try {
            // ✅ Validate for images only
            $request->validate([
                'title'    => 'required|string|max:255',
                'media'    => 'required|file|mimes:jpg,jpeg,png,webp,gif|max:5120', // 5MB max
            ]);

            $file = $request->file('media');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/banners'), $filename);
            $filePath = 'storage/banners/' . $filename;

            Banner::create([
                'title'    => $request->title,
                'image'    => $filePath,
            ]);

            Log::info('Banner created successfully', ['file_path' => $filePath]);

            return redirect()
                ->route('admin.banners.index')
                ->with('success', 'Banner created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validation failed', ['errors' => $e->errors()]);
            throw $e;
        } catch (\Exception $e) {
            Log::error('Error storing banner', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Something went wrong. Please check logs.');
        }
    }

    /**
     * Show the form for editing the specified banner.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update an existing banner (image only).
     */
    public function update(Request $request, Banner $banner)
    {
        Log::info('Banner update method called', [
            'banner_id'    => $banner->id,
            'request_data' => $request->all(),
        ]);

        try {
            $validated = $request->validate([
                'title'    => 'required|string|max:255',
                'media'    => 'nullable|file|mimes:jpg,jpeg,png,webp,gif|max:5120', // 5MB max
            ]);

            // ✅ If a new image was uploaded
            if ($request->hasFile('media')) {
                $file = $request->file('media');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage/banners'), $filename);
                $filePath = 'storage/banners/' . $filename;

                // Delete old image
                if ($banner->image && file_exists(public_path($banner->image))) {
                    unlink(public_path($banner->image));
                    Log::info('Old banner image deleted', ['old_file' => $banner->image]);
                }

                $validated['image'] = $filePath;
            } else {
                $validated['image'] = $banner->image;
            }

            $banner->update($validated);

            Log::info('Banner updated successfully', [
                'banner_id'    => $banner->id,
                'updated_data' => $validated,
            ]);

            return redirect()
                ->route('admin.banners.index')
                ->with('success', 'Banner updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating banner', [
                'banner_id' => $banner->id,
                'message'   => $e->getMessage(),
                'trace'     => $e->getTraceAsString(),
            ]);

            return redirect()->back()->with('error', 'Something went wrong during update.');
        }
    }

    /**
     * Remove the specified banner.
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        if ($banner->image && file_exists(public_path($banner->image))) {
            unlink(public_path($banner->image));
            Log::info('Banner image deleted', ['file' => $banner->image]);
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully.');
    }
}
