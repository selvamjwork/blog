<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\personal_details;
use App\scrollingmessage;
use App\caste;
use App\subcaste;
use App\graduate;
use App\professional;
use App\mothers_tongue;
use App\marital_status;
use App\district;
use Auth;
use App\Sms;

class ProfileController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
		$this->middleware('isMobileVerified');
		$this->middleware('verified');
	}

	public function selectSubsect($id,$selectedSubsect = '')
	{
		$caste = new caste;
		return $caste->selectSubsect($id,$selectedSubsect);
	}

    public function personal1()
    {
    	$user = \Auth::user();
    	$scrollingmessage = scrollingmessage::where('active','=','1')->get();

    	#caste dropdown
		$caste = caste::orderBy('caste_name','ASC')->get();
		$casteArray = array();
		foreach ($caste as $value) {
			$casteArray[$value['id']] =ucfirst($value['caste_name']);
		}    	

    	return view('profile.personal1',compact('scrollingmessage','user','casteArray','graduateArray','professionalArray','mothers_tongueArray','marital_statusArray'));
    }

    public function personalStore1(Request $request)
    {
    	if (!empty($request->othersubsect)) {
			$subcaste = subcaste::create([
				'subcaste_name' => $request->othersubsect,
				'caste_id' => $request->caste,
			]);
		}
		$user = new User;
		$formValue = $request->all();
		$validator = $user->updateValidate($formValue);
		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);  
		}
		if ($request['subsect'] == 'others') {
			$formValue['subsect'] = $subcaste->id;
		}
		$user = \Auth::user();
		$user->update($formValue);
        return redirect('/personal2');
    }

    public function personal2()
    {
    	$id = \Auth::user()->id;
    	$user = personal_details::findOrFail($id);
    	
    	$scrollingmessage = scrollingmessage::where('active','=','1')->get();

    	#graduate dropdown
		$graduate = graduate::orderBy('id','dec')->get();
		$graduateArray = array();
		foreach ($graduate as $value) {
			$graduateArray[$value['id']] =ucfirst($value['graduate_name']);
		}

		#professional dropdown
		$professional = professional::orderBy('id','ASC')->get();
		$professionalArray = array();
		foreach ($professional as $value) {
			$professionalArray[$value['id']] =ucfirst($value['professional_name']);
		}

		#mother Tongue dropdown
		$mothers_tongue = mothers_tongue::orderBy('id','ASC')->get();
		$mothers_tongueArray = array();
		foreach ($mothers_tongue as $value) {
			$mothers_tongueArray[$value['id']] =ucfirst($value['language_name']);
		}

		#marital Status dropdown
		$marital_status = marital_status::orderBy('id','ASC')->get();
		$marital_statusArray = array();
		foreach ($marital_status as $value) {
			$marital_statusArray[$value['id']] =ucfirst($value['marital_statuse']);
		}

		#district dropdown
        $district = district::orderBy('id','ASC')->get();
        $districtArray = array();
        foreach ($district as $value) {
            $districtArray[$value['id']] =ucfirst($value['name']);
        }

		return view('profile.personal2',compact('scrollingmessage','user','graduateArray','professionalArray','mothers_tongueArray','marital_statusArray','districtArray'));
    }

    public function personalStore2(Request $request)
    {
    	$user = new personal_details;
		$formValue = $request->all();
		$id = \Auth::user()->id;
		$user = personal_details::findOrFail($id);
    	// dd($user,$id,$formValue);
		$user->update($formValue);
        return redirect('/familydetails');

    }
}
