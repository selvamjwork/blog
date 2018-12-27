<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class birth_details extends Model
{
    protected $table = 'birth_details';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'dob', 'tob', 'moonsign', 'pob', 'dosham', 'dosatype', 'dasha_month', 'dasha_day', 'dasha_year', 'aboutyourself'
    ];
}
