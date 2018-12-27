<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sms';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['to_mobile_no', 'message', 'sender_id', 'response_mgs_id','role'];

    public static function sendSms($userDetail,$message)
    {
        $url = config('sms.transactional.sendsmsurl');
         $data = array(
            'username' => config('sms.transactional.username'),
            'password' => config('sms.transactional.password'),            
            'to' => $userDetail->mobile,
            'message' => urlencode($message),
            'sender' => config('sms.transactional.senderid'),
        );


        $params = '';
        foreach ($data as $key => $value)
            $params .= $key . '=' . $value . '&';

        $params = trim($params, '&');
        $url = "$url" . '?' . "$params";
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result=curl_exec($ch);
        curl_close($ch);
        $has_error= true;
        // dd($result,$url,$has);

        if ($has_error===false) {
            // $has_error= strpos(strtolower($result),'id');
        }

        if ($has_error==false) {
            return false;           
        }
        else {
            $requestData['message'] = $message;
            $requestData['to_mobile_no'] = $userDetail->mobile;
            $requestData['response_mgs_id'] = $result;
            $requestData['sender_id'] = $userDetail->id;
            $requestData['role'] = 'user';
            $sms = Sms::create($requestData);           
            return true;
        }      
    }
}
