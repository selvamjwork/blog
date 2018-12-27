<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use DB;
use App\mobile_verify;
use App\Sms;
use App\User;

class MobileVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        if($user->mobile_verified ==0)
        {        
            $result = DB::table('mobile_verify')->where('user_id','=',$user->id)->where('role','user')->first();
            

            if(empty($result->user_id))
            {
                $mobile_verification_num = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );
                $message = 'Your One Time Password is '.$mobile_verification_num.' in PONNU MAAPILLAI for Your Matrimony ID: ' . $user->user_id . ' & Registered Mobile No: '. $user->mobile;
                // dd($message);
                $sms = new Sms;
                $smsStatus = $sms->sendSms($user,$message,'user');
                
                if ($smsStatus) 
                {
                    $mobile = new mobile_verify([
                        'to_mobile_no'=>$user->mobile,
                        'message'=>$message,
                        'user_id'=>$user->id,
                        'verification_code'=>$mobile_verification_num,
                    ]);
                    $mobile->save();

                    session()->flash('success',"Your Verification Code is send to $user->mobile" );
                }
                else
                {
                    session()->flash('error',"Something went wrong. Please Check the given mobile number $user->mobile or contant admin" );
                }           

            }
            // dd('hi');
            return redirect('/mobileVerification');
        }
        return $next($request);
    }
}
