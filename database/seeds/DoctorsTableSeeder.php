<?php

use Illuminate\Database\Seeder;
use App\Doctor;
use App\Patient;
use App\Role;
use App\User;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //gets the role user where the field 'name' is 'doctor' and returns only one record
          $role_user = Role::where('name','doctor')->first();

          //for every user where role is user create a new doctor and save it into the doctor table
          foreach ($role_user->users as $user) {
            $doctor = new Doctor();
            $doctor->date_started = '1996/02/02';
            //below it may be patient->id
            $doctor->user_id = $user->id;
            $doctor->save();

    }
  }



}
