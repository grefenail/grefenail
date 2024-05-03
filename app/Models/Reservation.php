<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'user_id',
        'listing_id',
    ];

    public $timestamps = true;

    protected $with = ['user', 'listing'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }

}
