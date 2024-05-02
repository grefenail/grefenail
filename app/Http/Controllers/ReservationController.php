<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Listing;
use App\Models\Reservation;
use App\Models\Answer;
use App\Providers\NewListingReservation;
use App\Services\ReservationService;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function store(Request $request)
    {
        try {

            $reservation = Reservation::create([
                'user_id' => $request['user_id'],
                'listing_id' => $request['listing_id'],
            ]);

            for ($i = 0; $i < 5; $i++)
            {

            }

            Answer::create([

            ]);


            return redirect()->route('home')->with('toast', 'The request was successfully sent!');

        } catch (\Exception $th) {

            return redirect()->back()->with('toast', 'Please try again');

        }
    }

}
