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
            'slug' => Str::slug($data['petName']), 
            'description' => $data['description'],
            'petName' => $data['petName'],
            'ownerName' => $data['ownerName'],
            'address' => $data['address'],
            'email' => $data['email'],
            'petAge' => $data['petAge'],
            'contact' => $data['contact'],
            'categoryId' => $data['categoryId'],
            'userId' => $userId, 
        ]);
    }

}
