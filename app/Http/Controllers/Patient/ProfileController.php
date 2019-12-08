<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\User;
use App\Patient;
use Illuminate\Support\Facades\Auth;
use App\Role;

class ProfileController extends Controller
{
  //check to see if the user is authenticated and their role is a patient

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:patient');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //makes the user variable equal to the currently authenticated user
      $user = Auth::user();
    //attempts to get the patients id from the users table
      $patient = Patient::findOrFail($user->patient->id);
      //returns the patient profile index view with an array of patients
      return view('patient.profile.home')->with([
        'patient' => $patient
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

      //returns the edit patient profile view with an array of patients
      return view('patient.profile.edit')->with([
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

  //redirects to the patient profile index route once the above code within the function has ran
    return redirect()->route('patient.profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
