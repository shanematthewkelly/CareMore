<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Role;

class ProfileController extends Controller
{
  //check to see if the user is authenticated and their role is a doctor
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
      //query that gets the currently autheticated user
      $user = Auth::user();
      //returns the doctor profile index view with an array of doctors
      $doctor = Doctor::findOrFail($user->doctor->id);
      return view('doctor.profile.home')->with([
        'doctor' => $doctor
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
      //attempts to retrieve the id from the doctors table
      $doctor = Doctor::findOrFail($id);

      //returns the doctor profile edit view with an array of doctors
      return view('doctor.profile.edit')->with([
        'doctor' => $doctor
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
      //attempts to retrieve the id from the doctors table
      $doctor = Doctor::findOrFail($id);
      //attempts to retrieve the user_id from the doctors table
        $user = User::findOrFail($doctor->user_id);

    //validates the fields
    $request->validate([
      'name' => 'required|max:25|string',
      'address' => 'required|max:70|string',
      'phone' => 'required|max:15|size:10|string',
      'email' => 'required|max:100|unique:users,email,' . $user->id,
      'date_started' => 'required|date|after:tomorrow'
    ]);

    //requests the values from the user table migration and saves them into the user table within the database
    $user->name = $request->input('name');
    $user->address = $request->input('address');
    $user->phone = $request->input('phone');
    $user->email = $request->input('email');
    $user->save();

    //requests the values from the doctor table migration and saves them into the doctor table within the database
    $doctor->date_started = $request->input('date_started');
    $doctor->save();
    //flash message passing in a key value, and also a string to display on screen.
      $request->session()->flash('info', 'Doctor updated successfully!');

      //redirects to the doctor profile index route once the above code within the function has ran
    return redirect()->route('doctor.profile.index');

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
