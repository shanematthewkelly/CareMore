<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\User;
use App\Role;

class DoctorsController extends Controller
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
      //query to fetch all doctors from the doctor table
        $doctors = Doctor::all();
        //returns the index view with an array of doctors
        return view('admin.doctors.index')->with([
          'doctors' => $doctors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //query to fetch all doctors from the doctor table
      $doctors = Doctor::all();
        //returns the create view with an array of doctors
        return view('admin.doctors.create')->with([
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
      //gets the doctor role where the database table field 'name' is 'doctor' and return only one record.
      $role_doctor = Role::where('name', 'doctor')->first();

      //validates the fields
        $request->validate([
          'name' => 'required|max:25|string',
          'address' => 'required|max:70|string',
          'phone' => 'required|max:15|size:10|string',
          'email' => 'required|max:100|unique:users',
          'date_started' => 'required|date|after:tomorrow',
        ]);

        //create a new user and requests the values from the user table migration and saves it into the user table within the database with a role doctor attached
        $user = new User();
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_doctor);

        //creates a new Doctor and requests the values from the doctor table migration ans saves it into the doctor table within the database
        $doctor = new Doctor();
        $doctor->date_started = $request->input('date_started');
        $doctor->user_id = $request->input('user_id');
        //gets the user_id field in the doctors table and equals it to the id in the user table
        $doctor->user_id = $user->id;
        $doctor->save();

        //flash message passing in a key value, and also a string to display on screen.
        $request->session()->flash('success', 'Doctor added successfully!');

        //redirects to the doctor index route once the above code within the function has ran
        return redirect()->route('admin.doctors.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //attempts to retrieve the id from the doctors table
        $doctor = Doctor::findOrFail($id);
        //returns the show view with an array of doctors
        return view('admin.doctors.show')->with([
          'doctor' => $doctor
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
      //attempts to retrieve the id from the doctors table
      $doctor = Doctor::findOrFail($id);

      //returns the edit view with an array of doctors
      return view('admin.doctors.edit')->with([
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
        //attempts to retrieve the user_id from the doctor table
          $user = User::findOrFail($doctor->user_id);

          //validate the fields
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

        //redirects to the doctor index route once the above code within the function has ran
      return redirect()->route('admin.doctors.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      //attempts to retrieve the id in the user table and deletes that user
      $user = User::findOrFail($id);
      $user->delete();
        //flash message passing in a key value, and also a string to display on screen.
      $request->session()->flash('danger', 'Doctor was Deleted!');
      //redirects to the doctor index route once the above code within the function has ran
      return redirect()->route('admin.doctors.index');
    }
}
