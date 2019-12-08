<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //within the run function it creates three new roles, admin, doctor and patients which is seeded into the DB
      //They are all given hardcoded values so that it inserts into the required fields within the DB
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An admin';
        $role_admin->save();

        $role_doctor= new Role();
        $role_doctor->name = 'doctor';
        $role_doctor->description = 'A doctor';
        $role_doctor->save();

        $role_patient= new Role();
        $role_patient->name = 'patient';
        $role_patient->description = 'A patient';
        $role_patient->save();

    }
}
