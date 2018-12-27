<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class scrollingmessage extends Model
{
    public $timestamps = false;
	
	protected $table = 'scrollingmessage';
    
    protected $fillable = ['scrolling_message'];
}
