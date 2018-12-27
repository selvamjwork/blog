<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class family_details extends Model
{
    protected $table = 'family_details';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'fathers_name', 'fathers_occupation', 'mothers_name', 'mothers_occupation', 'noofbrothers', 'noofbrothersstatus', 'noofsisters', 'noofsistersstatus', 'address'
    ];
}
