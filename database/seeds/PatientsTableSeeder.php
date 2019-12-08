<?php

use Illuminate\Database\Seeder;
use App\Doctor;
use App\Patient;
use App\Role;
use App\User;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //gets the role user where the field 'name' is 'doctor' and returns only one record
        $role_user = Role::where('name','patient')->first();

          //for every user where role is user create a new patient and save it into the patient table
        foreach ($role_user->users as $user) {
          $patient = new Patient();
          $patient->medical_insurance = 'Yes';
          $patient->insurance_company_name = 'howart';
          $patient->policy_number = '1234567890';
          $patient->user_id = $user->id;
          $patient->save();

          
    }
}
}
