<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Listing::with(['category', 'image'])
            ->when($request->filled('search'), function ($query) use ($request)
            {
                $query->whereHas('category',function($query) use($request)
                {
                    $query->where('name', 'like', "%" . $request->search . "%");
                });
            })
            ->paginate(30)
            ->withQueryString()
            ->through(fn ($u) => [
                'id' => $u->id,
                'petName' => $u->petName,
                'slug' => $u->slug,
                'category' => $u->category->name ?? '',
                'image' => $u->image->url ?? '',
                'address' => $u->address,
            ]);
    
       
        return inertia('Home', [
            'listings' => $query,

            'filters' => $request->only(['search'])
        ]);
    }
}
