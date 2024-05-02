<?php

namespace App\Services;

use App\Models\Listing;
use App\Models\Reservation;
use Ramsey\Uuid\Type\Integer;

class ReservationService
{

    public function saveReservation(array $data): Reservation
    {
        return Reservation::create([
            'listingId' => $data['listingId'],
            'startDate' => $data['startDate'],
            'endDate' => $data['endDate'],
            'createdAt' => now()->toDateString(),
        ]);
    }

}
