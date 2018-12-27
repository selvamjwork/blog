<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\caste;
use App\district;
use App\birth_details;
use App\personal_details;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\scrollingmessage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required','numeric', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        unset($data['_token']);
        unset($data['password_confirmation']);
        $user = User::orderBy('id', 'desc')->first();
        if(!empty($user))
        {
            $str = str_split($user->user_id,1);
            $count = $str[10]+1;
            $date = date("Ynj");
            $id = 'PM'.$date.$count;
        }
        else
        {
            $count = 1;
            $date = date("Ynj");
            $id = 'PM'.$date.$count;
        }
        $data['age'] = Carbon::parse($data['dob'])->age;
        // dd($data,$id);

        $userData = User::create([
            'name' => $data['name'],
            'user_id' => $id,
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'caste' => $data['caste'],
            'password' => bcrypt($data['password']),
            'admin_id' => $data['district'],
            'is_registered_online' => '1',
        ]);
        $personalData = personal_details::create([
            'user_id' => $userData->id,
            'gender' => $data['gender'],
            'age' => $data['age'],
            'district' => $data['district'],
        ]);
        $birthData = birth_details::create([
            'user_id' => $userData->id,
            'dob' => $data['dob'],
        ]);

        return $userData;
    }

    public function showRegistrationForm()
    {
        // $scrollingmessage = scrollingmessage::where('active','=','1')->get();

        #caste dropdown
        $caste = caste::orderBy('caste_name','ASC')->get();
        $casteArray = array();
        foreach ($caste as $value) {
            $casteArray[$value['id']] =ucfirst($value['caste_name']);
        }

        #district dropdown
        $district = district::orderBy('id','ASC')->get();
        $districtArray = array();
        foreach ($district as $value) {
            $districtArray[$value['id']] =ucfirst($value['name']);
        }
        return view('auth.register',compact('districtArray','casteArray'));
    }

    public function register(Request $request)
    {
        $us = new User;        
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );  
        }  
        $requestArray = $request->all();
        $user = $this->create($requestArray);
        Auth::login($user);
        return redirect('/home'); 
    }
}
