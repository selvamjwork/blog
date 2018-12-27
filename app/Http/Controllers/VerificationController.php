<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Str;
use DB;
use App\Sms;
use App\mobile_verify;
use Crypt;

class VerificationController extends Controller
{
    public function __construct()
	{
	   $this->middleware('auth', ['except' => ['verifyCode', 'resendCode']]);      
	}

	public function VerifyMobile(Request $request)
	{
		$verify=User::where('id',\Auth::user()->id)->where('role','user')->where('mobile_verified','=',1)->first();
		if(is_null($verify))
		{
			return view('auth.verification.mobileVerify' ,compact('verificationCode'));
		}
		else
		{
			return redirect('/home'); 
		}
	}

	public function resendCode(Request $request)
	{
		if(\Auth::check())
		{
			$user = \Auth::User();
			$mobile_verification_num = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );
			$message = 'Your One Time Password is '.$mobile_verification_num.' in PONNU MAAPILLAI for Your Matrimony ID: ' . $user->user_id . ' & Registered Mobile No: '. $user->mobile;
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
				 session()->flash('error',"Something went wrong. Please Check the given mobile number $user->mobile" );
			}			
			return view('auth.verification.mobileVerify' ,compact('verificationCode'));
		}
		else
		{
			return view('auth.verification.mobileVerify' ,compact('verificationCode'));
		}

	}

	public function verifyCode(Request $request){

		$mobile = new mobile_verify;
		$validator = $mobile->Validate($request->all());
		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);  
		}   
		$s = $mobile->where('verification_code','=',$request->verification_code)->orderBy('id','desc')->where('role','user')->with('user')->first();

		if(!empty($s->user_id)?$s->user_id:'' === \Auth::User()->id)
		{
            $verified = User::where('id',$s->user_id)->first();
            if($verified->mobile_verified == 1)
            {
            	return redirect('/home')->with('success','You have Already Verified Successfully.');
            }
            else
            {
			#after successfull mobile verification, Updateing the data giving some reward
			DB::table('users')
				->where('id', $s->user_id)
				->update(['mobile_verified' => 1]);
			return redirect('/home')->with('success','Your Account Registration and Mobile Verification Completed Successfully.');
          }
		}
		return redirect('/mobileVerification')->with('error','Invalid Verification');
			
	}
}
