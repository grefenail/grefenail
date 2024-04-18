<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'listings'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pet_name',
        'pet_age',
        'pet_gender',
        'pet_size',
        'slug',
        'sterile',
        'is_active',
        'description',
        'category_id',
        'user_id',
    ]; 

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    protected $with = [
        'gender',
        'size',
        'category',
        'user',
        'vaccination',
        'vaccinations', 
        'images',
        'image'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the gender of the pet.
     */
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'pet_gender', 'id');
    }

    /**
     * Get the size of the pet.
     */
    public function size()
    {
        return $this->belongsTo(Size::class, 'pet_size', 'id');
    }

    /**
     * Get the category of the pet.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Get the user who owns the pet.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function vaccination(): HasMany
    {
        return $this->hasMany(Vaccination::class, 'listing_id', 'id');
    }
    
    public function vaccinations(): HasOne
    {
        return $this->hasOne(Vaccination::class, 'listing_id', 'id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ListingImage::class, 'listing_id', 'id');
    }
    
    public function image(): HasOne
    {
        return $this->hasOne(ListingImage::class, 'listing_id', 'id');
    }
}
