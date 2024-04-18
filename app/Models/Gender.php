<?php

namespace App\Models; 
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pet_genders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['gender'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
