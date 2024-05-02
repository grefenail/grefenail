<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $fillabe = [
        'reservation_id',
        'question_id',
        'answer_text'
    ];

    protected $with = ['reservation', 'question'];

    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class, 'reservation_id', 'id');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}
