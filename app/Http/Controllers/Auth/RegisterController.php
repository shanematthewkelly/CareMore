<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Patient;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Role;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
     //redirects the registered user to the root directory
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     //validates the fields
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30', 'size:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'medical_insurance' => ['nullable', 'string'],
              'insurance_company_name' => ['nullable', 'string'],
                'policy_number' => ['nullable', 'string'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      //creates a new user and passes in an array of values from the user migration table to input into the database
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
        //creates a new patient and passes in an array of values from the patient migration table to input into the database, and also makes the fields nullable
        $patient = Patient::create([
          'medical_insurance' => $data['medical_insurance'] ?? null,
          'insurance_company_name' => $data['insurance_company_name'] ?? null,
          'policy_number' => $data['policy_number'] ?? null,
          'user_id' => $user->id,
        ]);
        //attaches the patient role to the user
        $user->roles()->attach(Role::where('name', 'patient')->first());

        return $user;
    }
}
