<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Listing::with(['category', 'image', 'vaccination', 'user'])
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
                'pet_name' => $u->pet_name,
                'pet_age' => $u->pet_age,
                'pet_gender' => $u->pet_gender, 
                'pet_size' => $u->pet_size,
                'slug' => $u->slug,
                'sterile' => $u->sterile,
                'is_active' => $u->is_active,
                'category' => $u->category->name ?? '',
                'description' => $u->description,
                'user_id' => $u->user_id,
                'address' => $u->user->address ?? '',
                'vaccination'=> $u->vaccination ?? '',
                'image' => $u->image->url ?? '',
            ]);
            
        return inertia('Home', [
            'listings' => $query,

            'filters' => $request->only(['search'])
        ]);
    }
}
