<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  //function called user within the Doctor Model that states that the Doctor Model has a belongsTo (OutOfRangeException) relationship with the User Model
public function user(){
  return $this->belongsTo('App\User');
}
//function called visits within the Doctor Model which states that the Doctor Model has a hasMany (OTM) relationship with the Visits Model
public function visits() {
  return $this->hasMany('App\Visit');
}
}
