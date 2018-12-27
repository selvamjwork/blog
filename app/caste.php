<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\caste;
use App\subcaste;

class caste extends Model
{
    protected $table = 'castes';

    public $timestamps = false;

    protected $fillable = ['id','caste_name'];

    public function subcaste(){
        return $this->hasMany('App\subcaste');
    }

    public function selectSubsect($id,$selectedSubsect)
    {
        $caste = caste::find($id);
    	$Subsect = subcaste::where('caste_id',$caste->id)->orderBy('subcaste_name','ASC')->get();
    	$subsectOptions = '<option value=""';
    	$subsectOptions.= empty($selectedSubsect)?'selected="selected"':"";
    	$subsectOptions.=' >Select Subsect</option>';
    	foreach ($Subsect as $value) {
    		$subsectOptions .= "<option value='".$value['id']."'";
    		if (!empty($selectedSubsect)) {
    			$subsectOptions .=$value['id'] == $selectedSubsect?'selected="selected"':'';
    		}
    		$subsectOptions.=">". ucfirst($value['subcaste_name'])."</option>";
    	}
    	return $subsectOptions;
    }

    public function User()
    {
        return $this->hasMany('App\User','id');
    }
}
