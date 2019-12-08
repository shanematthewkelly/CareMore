<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //makes a call to the Seeder classes
         $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(DoctorsTableSeeder::class);
         $this->call(PatientsTableSeeder::class);
         $this->call(VisitsTableSeeder::class);
    }
}
