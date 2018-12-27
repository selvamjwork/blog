<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
class SmsStatusController extends Controller
{
    //
<<<<<<< HEAD
public function status(Request $request)
=======
    public function status(Request $request)
>>>>>>> c82c4da2bcdd8b07078ce2a3922bd5c9cfcdcee2
    {
    	Storage::append(
    	            'sulekha-response-confirm.txt',
    	            print_r($request->all(),true)
    	        );

<<<<<<< HEAD
=======
    	$smsSend = App\SMS::where("MDSD" ,$request->MID)->first();

    	if (!$smsSend) {
    		
    	}

>>>>>>> c82c4da2bcdd8b07078ce2a3922bd5c9cfcdcee2
    	return "success";
    }



}
