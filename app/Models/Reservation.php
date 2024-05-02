<?php

namespace App\Models;

use App\Traits\FilterByUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;
    use FilterByUser;

    protected $table = 'reservations';

    protected $fillable = [
        'user_id',
        'listing_id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    protected $with = ['user', 'listing'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }

}
