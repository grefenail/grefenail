<?php

namespace App\Contracts;

use App\Models\Listing;

interface ListingImageContract
{
    public function storeListingImage($image, Listing $listing);

}
