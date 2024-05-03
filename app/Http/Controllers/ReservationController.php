<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Listing;
use App\Models\Reservation;
use App\Models\Answer;
use App\Providers\NewListingReservation;
use App\Services\ReservationService;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function store(StoreReservationRequest $request, ReservationService $reservationService)
    {

        $validated = $request->validated();

        $reservation = $reservationService->saveReservation($validated, auth()->id());

        for ($i = 0; $i < 5; $i++) 
        {
            $answer = $request->input('answer' . $i);

            Answer::create([
                'reservation_id' => $reservation->id,
                'question_id' => $i + 1,
                'answer_text' => $answer,
            ]);
        }

        return redirect()->back()->with('toast', 'Your request was successfully sent!');

    }

}
