<?php
# @Date:   2019-10-22T17:08:27+01:00
# @Last modified time: 2019-10-23T12:03:49+01:00




use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //gets the role admin, doctor and patient where the field 'name' is 'doctor', 'admin' and 'patient' and returns only one record
      $role_admin = Role::where('name','admin')->first();
      $role_patient = Role::where('name','patient')->first();
      $role_doctor = Role::where('name', 'doctor')->first();

      //within the run function it creates several new users which are seeded into the DB
      //They are all given hardcoded values so that it inserts into the required fields within the DB
      //each one is attached a role
      $admin = new User();
      $admin->name = 'Admin 1';
      $admin->email = 'admin@medicalcenter.ie';
      $admin->address = '2 Ballybrack Road';
      $admin->phone = '0891675656';
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $doctor = new User();
      $doctor->name = 'Doctor 1';
      $doctor->email = 'doctor1@medicalcenter.ie';
      $doctor->address = '25A RoadView';
      $doctor->phone = '085888888';
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor = new User();
      $doctor->name = 'Doctor 2';
      $doctor->email = 'doctor2@medicalcenter.ie';
      $doctor->address = '25B TimRed';
      $doctor->phone = '0867564657';
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor = new User();
      $doctor->name = 'Doctor 3';
      $doctor->email = 'doctor3@medicalcenter.ie';
      $doctor->address = '3 Annavile Rd';
      $doctor->phone = '0896753424';
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor = new User();
      $doctor->name = 'Doctor 4';
      $doctor->email = 'doctor4@medicalcenter.ie';
      $doctor->address = '3 Greton Rd';
      $doctor->phone = '0896567687';
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);


      $doctor = new User();
      $doctor->name = 'Doctor 5';
      $doctor->email = 'doctor5@medicalcenter.ie';
      $doctor->address = '32 Maple Avenue, Ballybrack';
      $doctor->phone = '0871684738';
      $doctor->password = bcrypt('secret');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

//------------------------------------------------------------------//
      $patient = new User();
      $patient->name = 'Patient 1';
      $patient->email = 'patient1@medicalcenter.ie';
      $patient->address = '25A RoadView';
      $patient->phone = '085888888';
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $patient = new User();
      $patient->name = 'Patient 2';
      $patient->email = 'patient2@medicalcenter.ie';
      $patient->address = '27 NorthView Road';
      $patient->phone = '0685768596';
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $patient = new User();
      $patient->name = 'Patient 3';
      $patient->email = 'patient3@medicalcenter.ie';
      $patient->address = '36 Annaville Park';
      $patient->phone = '0896758495';
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $patient = new User();
      $patient->name = 'Patient 4';
      $patient->email = 'patient4@medicalcenter.ie';
      $patient->address = 'Greenlee Avenue';
      $patient->phone = '0879973112';
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

      $patient = new User();
      $patient->name = 'Patient 5';
      $patient->email = 'patient5@medicalcenter.ie';
      $patient->address = '2 Temple Road';
      $patient->phone = '0851450552';
      $patient->password = bcrypt('secret');
      $patient->save();
      $patient->roles()->attach($role_patient);

    }
}
