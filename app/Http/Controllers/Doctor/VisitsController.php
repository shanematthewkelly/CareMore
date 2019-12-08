<?php

namespace App\Http\Controllers\Doctor;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visit;
use App\Patient;
use App\Doctor;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;



class VisitsController extends Controller
//check to see if the user is authenticated and their role is a doctor
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:doctor');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = Auth::user();
      $user = Auth::user();

        $visits = Visit::where('doctor_id',$user->doctor->id)->get();

      return view('doctor.visits.index')->with([
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
      //query to get the currently authenticated user
      $user = Auth::user();
      //query to get all patients from the patient table
      $patients = Patient::all();
        //query to get all doctors from the doctors table
      $doctors = Doctor::all();
      //returns the doctor visits create view with an array of doctors and patients
      return view('doctor.visits.create')->with([
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
      //attempts to get the authenticated user who is a doctor with its ID
      $doctor = Doctor::findOrFail(Auth::user()->doctor->id);

      //validates the fields
      $request->validate([
        'patient_id' => 'required',
        'date' => 'required|date|after:tomorrow',
        'time' => 'required',
        'duration' => 'required|max:15',
        'cost' => 'required|numeric|between:0,300',


      ]);
        //create a new visit and requests the values from the visit table migration and saves it into the visit table within the database
      $visit = new Visit();
      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->duration = $request->input('duration');
      $visit->cost = $request->input('cost');
      $visit->patient_id = $request->input('patient_id');
      $visit->doctor_id = $doctor->id;
      $visit->save();
      //flash message passing in a key value, and also a string to display on screen.
      $request->session()->flash('success', 'Visit added successfully!');
      //redirects to the doctor visits index route once the above code within the function has ran
      return redirect()->route('doctor.visits.index');
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
      //returns the doctor visits show view with an array of visits
      return view('doctor.visits.show')->with([
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
     return view('doctor.visits.edit')->with([
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
      //attempts to retieve the currently autheticated user who is a doctor with its ID
      $doctor = Doctor::findOrFail(Auth::user()->doctor->id);

      //validates the fields
    $request->validate([
      'patient_id' => 'required',
      'date' => 'required|date|after:tomorrow',
      'time' => 'required',
      'duration' => 'required|max:15',
      'cost' => 'required|numeric|between:0,300',

    ]);

    //requests the values from the visits table migration and saves them into the visits table within the database
    $visit->date = $request->input('date');
    $visit->time = $request->input('time');
    $visit->duration = $request->input('duration');
    $visit->cost = $request->input('cost');
    $visit->patient_id = $request->input('patient_id');
    $visit->doctor_id = $doctor->id;
    $visit->save();
    //flash message passing in a key value, and also a string to display on screen.
    $request->session()->flash('info', 'Visit updated successfully!');
      //redirects to the doctor visit index route once the above code within the function has ran
    return redirect()->route('doctor.visits.index');
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
        //redirects to the doctor vists index route once the above code within the function has ran
      return redirect()->route('doctor.visits.index');
    }

    public function cancel($id) {
            //attempts to retrieve the id in the visit table and cancels that visit if its set to true, then saves it
            $visit = Visit::findOrFail($id);
            $visit->cancelled = true;
            $visit->save();
              //redirects to the doctor visits index route once the above code within the function has ran
            return redirect()->route('doctor.visits.show', $visit->id);
        }
}
