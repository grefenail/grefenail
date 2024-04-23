<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Access\ListingImageContext;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Models\Listing;
use App\Services\ListingService;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Size;
use App\Models\Gender;

class ListingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'store']);
    }

    public function index()
    {
        $categories = Category::all();
        $pet_sizes = Size::all();
        $pet_genders = Gender::all();

        return inertia('Listing/Index', [
            'categories' => $categories,
            'pet_sizes' => $pet_sizes,
            'pet_genders' => $pet_genders,
        ]);
    }

    public function store(StoreListingRequest $request, ListingService $listingService, ListingImageContext $context)
    {
        $validated = $request->validated();

        $listing = $listingService->storeListing($validated, auth()->id());

        foreach ($request->file('image') as $key => $image)
        {
            $context->store($image, $listing);
        }

        return redirect()->back()->with('toast', 'Listing create successfully');
    }

    public function show(Listing $listing)
    {
        return inertia('Listing/Show', [
            'listing' => $listing,
        ]);
    }

}
