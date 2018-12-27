<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class mobile_verify extends Model
{
    protected  $table = 'mobile_verify';

	protected $fillable =  [
		'user_id',
		'verification_code',
		'role', 
		'created_at', 
		'updated_at'
	];

	public function User()
	{
	 	return $this->belongsTo(User::class);
	}


	public function Validate(array $data)
    {
        return Validator::make($data, [
            'verification_code'=>'required|integer|min:5|exists:mobile_verify,verification_code,user_id,'.\Auth::user()->id,           
        ]);
    }
}
