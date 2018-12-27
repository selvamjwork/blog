<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;

class subcaste extends Model
{
    protected $table="subcastes";

    public $timestamps = false;

    public function caste()
    {
        return $this->belongsTo('App\caste');
    }

    protected $fillable =  ['subcaste_name','caste_id'];

    public function Validate(Request $data)
	{
		return Validator::make($data, [
			'othersubsect' => 'required|exists:subcaste,subcaste_name',
		]);
	}
}
