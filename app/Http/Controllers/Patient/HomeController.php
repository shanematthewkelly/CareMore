<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
//check to see if the user is authenticated and their role is an patient
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:patient');
  }

  public function index()
   {
     //returns the patient home view
    return view('patient.home');
  }
}
