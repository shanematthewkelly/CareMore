<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{

  //function called users within the Role Model which states that the Role Model has a belongsToMany (MTM) relationship with the User Model and user_role
  public function users()
  {
    return $this->belongsToMany('App\User', 'user_role');
  }
}
