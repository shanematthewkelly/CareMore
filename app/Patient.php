<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
protected $fillable = ['medical_insurance', 'insurance_company_name', 'policy_number', 'user_id'];

  //function called user within the Patient Model that states that the Patient Model has a belongsTo (OTO) relationship with the User Model
  public function user(){
    return $this->belongsTo('App\User');
  }
  //function called visits within the Patient Model which states that the Patient Model has a hasMany (OTM) relationship with the Visits Model
  public function visits() {
    return $this->hasMany('App\Visit');
  }


}
