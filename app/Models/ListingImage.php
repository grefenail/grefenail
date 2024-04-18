<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingImage extends Model
{
    use HasFactory;

    protected $table = 'listing_images';

    protected $fillable = [
        'url',
        'listing_id',
    ];

}
