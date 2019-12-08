<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visit;
use App\Patient;
use App\Doctor;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;

class VisitsController extends Controller
//check to see if the user is authenticated and their role is an patient
{
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

        //gets the visits from the visits table where the field 'patient_id' is the currently logged in user who is a patient (id)
        $visits = Visit::where('patient_id',$user->patient->id)->get();
        //returns the patient visits index view with an array of visits
      return view('patient.visits.index')->with([
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
      //attempts to retrieve the id from the visits table
      $visit = Visit::findOrFail($id);
        //returns the show view with an array of visits
      return view('patient.visits.show')->with([
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function cancel($id) {
        //attempts to retrieve the id in the visit table and cancels that visit if its set to true, then saves it
             $visit = Visit::findOrFail($id);
             $visit->cancelled = true;
             $visit->save();
             //redirects to the patient visits index route once the above code within the function has ran
             return redirect()->route('patient.visits.show', $visit->id);
         }

    //the destroy function is not used for patient visits - however it gave me an error when I removed it 
    public function destroy(Request $request, $id)
    {
      $visit = Visit::findOrFail($id);

      $visit->delete();

      $request->session()->flash('danger', 'Your Visit has been cancelled!');

      return redirect()->route('patient.visits.index');
    }
}
