<?php

namespace App\Services;

use App\Models\Reservation;

class ReservationService
{

    private $userId;

    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }


    public function saveReservation(array $data, $userId): Reservation
    {
        return Reservation::create([
            'user_id' => $userId,
            'listing_id' => $data['listing_id'],
        ]);
    }

}
