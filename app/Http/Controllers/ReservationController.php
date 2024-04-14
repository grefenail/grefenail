<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Listing;
use App\Providers\NewListingReservation;
use App\Services\ReservationService;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function store(StoreReservationRequest $request, ReservationService $reservationService)
    {
        try {

            $listing = Listing::where('id', $request->listingId)->first();

            $reservation = $reservationService->saveReservation($request->validated());

            event(new NewListingReservation($reservation));

            return redirect()->route('home')->with('toast', 'The request was sent to the owner');

        } catch (\EXception $th)
        {
            return redirect()->back()->with('toast', 'Please try again');
        }
    }

}
