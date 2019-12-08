<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
//check to see if the user is authenticated and their role is a doctor
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:doctor');
  }

    public function index() {

      return view('doctor.home');
    }
}
