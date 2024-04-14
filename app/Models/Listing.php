<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Listing extends Model
{
    use HasFactory;

    protected $table = 'listings';

    protected $fillable = [
        'slug',
        'description',
        'petName',
        'ownerName',
        'address',
        'email',
        'petAge',
        'contact',
        'categoryId',
        'userId',
    ];

    protected $with = ['category', 'user', 'images', 'image'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'locationId', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categoryId', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ListingImages::class, 'listingId', 'id');
    }
    public function image(): HasOne
    {
        return $this->hasOne(ListingImages::class, 'listingId', 'id');
    }

}
