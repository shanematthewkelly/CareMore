<?php

use Illuminate\Database\Seeder;
use App\Doctor;
use App\Patient;
use App\Role;
use App\User;
use App\Visit;


class VisitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //within the run function it creates a new visit which is seeded into the DB
      $visit = new Visit();
      $visit->date = '2019-08-08';
      $visit->time = '12PM';
      $visit->duration = '1 hours';
      $visit->cost = '12.00';
      $visit->patient_id = '1';
      $visit->doctor_id = '1';
      $visit->save();

      $visit = new Visit();
      $visit->date = '2019-12-12';
      $visit->time = '11AM';
      $visit->duration = '3 hours';
      $visit->cost = '12.00';
      $visit->patient_id = '2';
      $visit->doctor_id = '2';
      $visit->save();

      $visit = new Visit();
      $visit->date = '2019-08-08';
      $visit->time = '9PM';
      $visit->duration = '6 hours';
      $visit->cost = '32.00';
      $visit->patient_id = '3';
      $visit->doctor_id = '3';
      $visit->save();

      $visit = new Visit();
      $visit->date = '2019-08-08';
      $visit->time = '11PM';
      $visit->duration = '2 hours';
      $visit->cost = '62.00';
      $visit->patient_id = '4';
      $visit->doctor_id = '4';
      $visit->save();

      $visit = new Visit();
      $visit->date = '2019-08-08';
      $visit->time = '10PM';
      $visit->duration = '1 hour';
      $visit->cost = '52.00';
      $visit->patient_id = '5';
      $visit->doctor_id = '5';
      $visit->save();




    }
}
