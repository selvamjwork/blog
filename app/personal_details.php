<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personal_details extends Model
{
    protected $table = 'personal_details';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'gender', 'age', 'degree', 'profession', 'mother_tongue', 'height', 'weight', 'qualification', 'monthly_income', 'religion', 'gothram', 'marital_status'
    ];
}
