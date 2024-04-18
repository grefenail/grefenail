<?php

namespace App\Models;

use App\Traits\FilterByUser;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;
    use FilterByUser;

    protected $table = 'reservation';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'listing_id',
        'start_date',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'start_date' => 'date',
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    protected $with = ['listing'];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }

}
