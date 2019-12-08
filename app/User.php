<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //function called doctor within the User Model which states that the User Model has a hasOne (OTO) relationship with the Doctor Model
    public function doctor() {
      return $this->hasOne('App\Doctor');
    }
    //function called patient within the User Model which states that the User Model has a hasOne (OTO) relationship with the Patient Model
    public function patient() {
      return $this->hasOne('App\Patient');
    }

    //function called roles within the User Model which states that the User Model has a belongsToMany (MTM) relationship with the Role Model and the user_role
    public function roles() {
      return $this->belongsToMany('App\Role', 'user_role');
    }

    //function called authorizeRoles within the User Model that runs an if statement which passes in an array called roles and returns any roles or returns a 401 error
    public function authorizeRoles($roles)
    {
      if (is_array($roles)) {
        return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorized');
      }
        return $this->hasRole($roles) || abort(401, 'This action is unauthorized');
    }

    //function called hasRole within the User Model that passes in a variable called role and returns null but compares it to the roles table where the field 'name' is the variable role and returns only one record.
    public function hasRole($role) {
      return null !== $this->roles()->where('name', $role)->first();
    }
    //function called hasRole within the User Model that passes in a variable called role and returns null but compares it to the roles table where the field 'name' is the variable role and returns only one record.
    public function hasAnyRole($roles){
      return null !== $this->roles()->whereIn('name', $roles)->first();
    }

}
