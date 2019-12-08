<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //check to see if the user is authenticated and their role is an admin
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');
  }

    public function index() {
      //returns the admin's home view
      return view('admin.home');
    }
}
