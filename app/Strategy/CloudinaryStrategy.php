<?php

namespace App\Strategy;
use Cloudinary;
use App\Contracts\ListingImageContract;
use App\Models\Listing;
use App\Models\ListingImage;

class CloudinaryStrategy implements ListingImageContract
{

    public function storeListingImage($image, Listing $listing)
    {
        $uploadedFileUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();

        ListingImage::create(['url' => $uploadedFileUrl, 'listing_id' => $listing->id]);
    }

}
