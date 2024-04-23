<?php

namespace App\Services;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Support\Str;


class ListingService
{

    private $userId;

    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    public function storeListing(array $data, $userId): Listing
    {
        return Listing::create([
            'slug' => Str::slug($data['pet_name']), 
            'description' => $data['description'],
            'pet_name' => $data['pet_name'],
            'pet_age' => $data['pet_age'],
            'pet_size' => $data['pet_size'],
            'pet_gender' => $data['pet_gender'],
            'category_id' => $data['category'],
            'user_id' => $userId, 
        ]);
    }

}
