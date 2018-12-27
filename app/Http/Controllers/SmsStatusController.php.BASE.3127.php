<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
class SmsStatusController extends Controller
{
    //
    public function status(Request $request)
    {
    	Storage::append(
            'sulekha-response-confirm.txt',
            print_r($request->all(),true)
        );

    	$smsSend = App\SMS::where("MDSD" ,$request->MID)->first();

    	if (!$smsSend) {
    		
    	}

    	return "success";
    }
}
