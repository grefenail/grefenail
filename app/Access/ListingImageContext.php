<?php

namespace App\Access;

use App\Contracts\ListingImageContract;
use App\Models\Listing;
use App\Strategy\CloudinaryStrategy;

class ListingImageContext
{

    public function __construct(public ListingImageContract $strategy = new CloudinaryStrategy()){ }

    public function store($file, Listing $listing)
    {
        $this->strategy->storeListingImage($file, $listing);
    }

    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;
    }

}
