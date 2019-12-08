<?php

namespace App\Http\Controllers\Visit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      // $this->middleware('role:admin');
  }

    public function index() {

      return view('visit.home');
    }
}
