<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use DB;
use App\caste;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','user_id', 'password', 'mobile', 'email',  'profile_pic', 'caste', 'subsect', 'email_verified_at', 'mobile_verified', 'payment_completed', 'payment_expired_on', 'profile_completed', 'active', 'admin_id', 'is_registered_online'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function updateValidate(array $data)
    {
        return Validator::make($data, [
            'name' => 'string|max:255',
            'mobile' => 'string|max:255',
            
        ]);
    }
}
