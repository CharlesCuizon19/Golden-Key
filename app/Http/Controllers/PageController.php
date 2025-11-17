<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitType;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }
    public function about_us()
    {
        return view('pages.about-us');
    }
    public function unit_listing()
    {
        // Fetch all units with relations
        $units = Unit::with(['agent', 'type', 'features', 'images'])->get();

        // Transform units for the front-end
        $unitsData = $units->map(function ($unit) {
            return (object)[
                'id' => $unit->id,
                'name' => $unit->title,
                'type' => $unit->type?->name ?? 'N/A',
                'status' => ucfirst(str_replace('_', ' ', $unit->status)),
                'location' => $unit->location_text,
                'area' => $unit->sqm,
                'price' => number_format($unit->price),
                'price_type' => $unit->price_status === 'fixed' ? 'fixed' : 'month',
                'image' => $unit->images->first()?->image_path ?? 'images/default-property.png',
                // Include features in the mapped object
                'features' => $unit->features->map(function ($feature) {
                    return (object)[
                        'name' => $feature->feature_name,
                        'quantity' => $feature->pivot->quantity ?? null,
                    ];
                }),
            ];
        });

        // Chunk for Swiper (9 per slide)
        $chunks = $unitsData->chunk(9);

        // Dynamic filters
        $types = UnitType::pluck('name')->toArray();
        $statuses = ['For Sale', 'For Rent', 'For Lease'];
        $cities = Unit::pluck('location_text')->unique()->toArray();
        $priceRanges = ['₱0 - ₱1M', '₱1M - ₱5M', '₱5M+'];
        $areaRanges = ['0 - 50 sqm', '50 - 100 sqm', '100+ sqm'];
        $sortOptions = ['Newest', 'Oldest', 'Lowest Price', 'Highest Price'];

        return view('pages.unit-listing', compact(
            'chunks',
            'types',
            'statuses',
            'cities',
            'priceRanges',
            'areaRanges',
            'sortOptions'
        ));
    }



    public function FAQs()
    {
        return view('pages.FAQs');
    }
    public function contact_us()
    {
        return view('pages.contact-us');
    }
    public function unit_listing_singlepage($id)
    {
        $property = Unit::with([
            'images',
            'agent' => function ($q) {
                $q->withCount('units'); // << load units_count
            },
            'type',
            'features'
        ])->findOrFail($id);

        $imageGallery_count = $property->images->count();

        $latestProperties = Unit::with('images')
            ->where('id', '!=', $id)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.unit-listing-singlepage', compact('property', 'imageGallery_count', 'latestProperties'));
    }
}
