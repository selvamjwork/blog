<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Smsstatus;

class SmsStatusController extends Controller
{

    public function status(Request $request)
    {
    	// Storage::append(
    	//             'sulekha-response-confirm.txt',
    	//             print_r($request->all(),true)
    	//         );

        $status = new Smsstatus;
        $user= \Auth::user();

        $status->sender_id = $user->id;
        $status->message_id = $request->MID;
        $status->sent_time = $request->Stime;
        $status->delivered_time = $request->Dtime;
        $status->operator = $request->Operator;
        $status->dest_num = $request->Dest;
        $status->status = $request->Reason;
        $status->status_code = $request->Status;

        $status->save();

    	return "success";
    }



}
