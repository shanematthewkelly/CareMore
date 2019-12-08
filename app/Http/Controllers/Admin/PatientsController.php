<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\User;
use App\Role;

class PatientsController extends Controller
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
        //query to fetch all patients from the patient table
      $patients = Patient::all();
//returns the index view with an array of patients
      return view('admin.patients.index')->with([
        'patients' => $patients
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //returns the create view with an array of patients
          return view('admin.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //gets the patient role where the database table field 'name' is 'patient' and return only one record.
        $role_patient = Role::where('name', 'patient')->first();
        //validates the fields
      $request->validate([
        'name' => 'required|max:25|string',
        'address' => 'required|max:70|string',
        'phone' => 'required|max:15|size:10|string',
        'email' => 'required|max:100|unique:users',
        'medical_insurance' => 'required|string',
        'insurance_company_name' => 'max:100|string|nullable',
        'policy_number' => 'nullable|digits:10',

      ]);
      //create a new user and requests the values from the user table migration and saves it into the user table within the database with a role patient attached
      $user = new User();
      $user->name = $request->input('name');
      $user->address = $request->input('address');
      $user->phone = $request->input('phone');
      $user->email = $request->input('email');
      $user->password = bcrypt('secret');
      $user->save();
      $user->roles()->attach($role_patient);
      //creates a new Patient and requests the values from the patient table migration ans saves it into the patient table within the database
      $patient = new Patient();
      $patient->medical_insurance = $request->input('medical_insurance');
      $patient->insurance_company_name = $request->input('insurance_company_name');
      $patient->policy_number = $request->input('policy_number');

      //gets the user_id field in the patients table and equals it to the id in the user table
      $patient->user_id = $request->input('user_id');
      $patient->user_id = $user->id;
      $patient->save();
      //flash message passing in a key value, and also a string to display on screen.
      $request->session()->flash('success', 'Patient added successfully!');
        //redirects to the patient index route once the above code within the function has ran
      return redirect()->route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //attempts to retrieve the id from the patients table
    public function show($id)
    {
      $patient = Patient::findOrFail($id);
      //returns the show view with an array of patients
      return view('admin.patients.show')->with([
        'patient' => $patient
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
      //attempts to retrieve the id from the patients table
      $patient = Patient::findOrFail($id);
      //returns the edit view with an array of patients
      return view('admin.patients.edit')->with([
        'patient' => $patient
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
              //attempts to retrieve the id from the patients table
              $patient = Patient::findOrFail($id);
                //attempts to retrieve the user_id from the patients table
              $user = User::findOrFail($patient->user_id);
              //validates the fields
            $request->validate([
              'name' => 'required|max:25|string',
              'address' => 'required|max:70|string',
              'phone' => 'required|max:15|size:10|string',
              'email' => 'required|max:100|unique:users,email,' . $user->id,
              'medical_insurance' => 'required|string',
              'insurance_company_name' => 'max:100|string|nullable',
              'policy_number' => 'nullable|digits:10',
            ]);
            //requests the values from the user table migration and saves them into the user table within the database
            $user->name = $request->input('name');
            $user->address = $request->input('address');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->save();
            //requests the values from the patient table migration and saves them into the patient table within the database
            $patient->medical_insurance = $request->input('medical_insurance');
            $patient->insurance_company_name = $request->input('insurance_company_name');
            $patient->policy_number = $request->input('policy_number');
            $patient->save();
            //flash message passing in a key value, and also a string to display on screen.
            $request->session()->flash('info', 'Patient updated successfully!');
            //redirects to the patient index route once the above code within the function has ran
            return redirect()->route('admin.patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //attempts to retrieve the id in the user table and deletes that user
      $user = User::findOrFail($id);
      $user->delete();
        //flash message passing in a key value, and also a string to display on screen.
      $request->session()->flash('danger', 'Patient was deleted!');

      //redirects to the patient index route once the above code within the function has ran
      return redirect()->route('admin.patients.index');
    }
}
