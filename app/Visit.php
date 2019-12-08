<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
  //function called patient within the Visit Model that states that the Visit has a belongsTo (OTO) relationship with the Patient Model
  public function patient() {
    return $this->belongsTo('App\Patient');
  }
  //function called doctor within the Visit Model that states that the Visit has a belongsTo (OTO) relationship with the Doctor Model
  public function doctor() {
    return $this->belongsTo('App\Doctor');
  }

}
