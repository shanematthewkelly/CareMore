<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visit;
use App\Patient;
use App\Doctor;

class VisitsController extends Controller
{
    //check to see if the user is authenticated and their role is an admin
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //query to fetch all visits from the visit table
      $visits = Visit::all();
      //returns the index view with an array of visits
      return view('admin.visits.index')->with([
        'visits' => $visits
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //query to getch all Doctors and Patients from their tables
      $patients = Patient::all();
      $doctors = Doctor::all();
      //returns the create view with an array of doctors and patients
      return view('admin.visits.create')->with([
      'patients' => $patients,
      'doctors' => $doctors
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //validates the fields
      $request->validate([
        'patient_id' => 'required',
        'date' => 'required|date|after:tomorrow',
        'time' => 'required',
        'duration' => 'required|max:15',
        'cost' => 'required|numeric|between:0,300',
        'doctor_id' => 'required'


      ]);
      //create a new visit and requests the values from the visit table migration and saves it into the visit table within the database
      $visit = new Visit();
      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->duration = $request->input('duration');
      $visit->cost = $request->input('cost');
      $visit->patient_id = $request->input('patient_id');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->save();
      //flash message passing in a key value, and also a string to display on screen.
      $request->session()->flash('success', 'Visit added successfully!');
      //redirects to the admin visits index route once the above code within the function has ran
      return redirect()->route('admin.visits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
      {
        //attempts to retrieve the id from the visits table
        $visit = Visit::findOrFail($id);
        //returns the admin visits show view with an array of visits
        return view('admin.visits.show')->with([
          'visit' => $visit
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {
       //querys to get all Doctors and Patients from their tables
        $doctors = Doctor::all();
       $patients = Patient::all();
       //attempts to retrieve the id from the visits table
       $visit = Visit::findOrFail($id);
       //returns the admin visits edit view with an array of visits, doctors and patients
       return view('admin.visits.edit')->with([
         'visit' => $visit,
         'patients' => $patients,
         'doctors' => $doctors
       ]);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //attempts to retrieve the id from the visits table
      $visit = Visit::findOrFail($id);
      //validates the fields
    $request->validate([
      'patient_id' => 'required',
      'date' => 'required|date|after:tomorrow',
      'time' => 'required',
      'duration' => 'required|max:15',
      'cost' => 'required|numeric|between:0,300',
      'doctor_id' => 'required',
    ]);

      //requests the values from the visits table migration and saves them into the visits table within the database
    $visit->date = $request->input('date');
    $visit->time = $request->input('time');
    $visit->duration = $request->input('duration');
    $visit->cost = $request->input('cost');
    $visit->patient_id = $request->input('patient_id');
    $visit->doctor_id = $request->input('doctor_id');
    $visit->save();
    //flash message passing in a key value, and also a string to display on screen.
    $request->session()->flash('info', 'Visit updated successfully!');
      //redirects to the admin visit index route once the above code within the function has ran
    return redirect()->route('admin.visits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //attempts to retrieve the id in the visit table and deletes that visit
      $visit = Visit::findOrFail($id);
      $visit->delete();
      //flash message passing in a key value, and also a string to display on screen.
      $request->session()->flash('danger', 'Visit was deleted!');
      //redirects to the admin vists index route once the above code within the function has ran
      return redirect()->route('admin.visits.index');
    }

    public function cancel($id) {
        //attempts to retrieve the id in the visit table and cancels that visit if its set to true, then saves it
        $visit = Visit::findOrFail($id);
        $visit->cancelled = true;
        $visit->save();
        //redirects to the admin visits index route once the above code within the function has ran
        return redirect()->route('admin.visits.show', $visit->id);
    }
}
