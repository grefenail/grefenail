<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vaccination extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vaccinations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'listing_id',
        'vaccine_id',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    protected $with = [
        'vaccine',
        'pet'
    ];

    /**
     * Get the pet that received the vaccination.
     */
    public function pet()
    {
        return $this->belongsTo(Listing::class);
    }

    /**
     * Get the vaccine that was administered.
     */
    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }
}
