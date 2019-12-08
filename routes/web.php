<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//gets the root directory and also runs a function which returns the welcome view
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Home Routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/patient/home', 'Patient\HomeController@index')->name('patient.home');
Route::get('/doctor/home', 'Doctor\HomeController@index')->name('doctor.home');
Route::get('/visit/home', 'Visit\HomeController@index')->name('visit.home');

//-------------------------------------------------------------------------------------------------------------//

//Admin - Doctors (CRUD)
Route::get('/admin/doctors', 'Admin\DoctorsController@index')->name('admin.doctors.index');
Route::get('/admin/doctors/create', 'Admin\DoctorsController@create')->name('admin.doctors.create');
Route::get('/admin/doctors/{id}', 'Admin\DoctorsController@show')->name('admin.doctors.show');
Route::post('/admin/doctors/store', 'Admin\DoctorsController@store')->name('admin.doctors.store');
Route::get('/admin/doctors/{id}/edit', 'Admin\DoctorsController@edit')->name('admin.doctors.edit');
Route::put('/admin/doctors/{id}', 'Admin\DoctorsController@update')->name('admin.doctors.update');
Route::delete('/admin/doctors/{id}', 'Admin\DoctorsController@destroy')->name('admin.doctors.destroy');

//-------------------------------------------------------------------------------------------------------------//

//Admin - Patients (CRUD)
Route::get('/admin/patients', 'Admin\PatientsController@index')->name('admin.patients.index');
Route::get('/admin/patients/create', 'Admin\PatientsController@create')->name('admin.patients.create');
Route::get('/admin/patients/{id}', 'Admin\PatientsController@show')->name('admin.patients.show');
Route::post('/admin/patients/store', 'Admin\PatientsController@store')->name('admin.patients.store');
Route::get('/admin/patients/{id}/edit', 'Admin\PatientsController@edit')->name('admin.patients.edit');
Route::put('/admin/patients/{id}', 'Admin\PatientsController@update')->name('admin.patients.update');
Route::delete('/admin/patients/{id}', 'Admin\PatientsController@destroy')->name('admin.patients.destroy');

//-------------------------------------------------------------------------------------------------------------//

//Admin - Visits (CRUD)
Route::get('/admin/visits', 'Admin\VisitsController@index')->name('admin.visits.index');
Route::get('/admin/visits/create', 'Admin\VisitsController@create')->name('admin.visits.create');
Route::get('/admin/visits/{id}', 'Admin\VisitsController@show')->name('admin.visits.show');
Route::post('/admin/visits/store', 'Admin\VisitsController@store')->name('admin.visits.store');
Route::get('/admin/visits/{id}/edit', 'Admin\VisitsController@edit')->name('admin.visits.edit');
Route::put('/admin/visits/{id}', 'Admin\VisitsController@update')->name('admin.visits.update');
Route::delete('/admin/visits/{id}', 'Admin\VisitsController@destroy')->name('admin.visits.destroy');
Route::get('/admin/visits/cancel/{id}', 'Admin\VisitsController@cancel')->name('admin.visits.cancel');

//-------------------------------------------------------------------------------------------------------------//

//Doctor - Visits
Route::get('/doctor/visits/', 'Doctor\VisitsController@index')->name('doctor.visits.index');
Route::get('/doctor/visits/create', 'Doctor\VisitsController@create')->name('doctor.visits.create');
Route::get('/doctor/visits/{id}', 'Doctor\VisitsController@show')->name('doctor.visits.show');
Route::post('/doctor/visits/store', 'Doctor\VisitsController@store')->name('doctor.visits.store');
Route::get('/doctor/visits/{id}/edit', 'Doctor\VisitsController@edit')->name('doctor.visits.edit');
Route::put('/doctor/visits/{id}', 'Doctor\VisitsController@update')->name('doctor.visits.update');
Route::delete('/doctor/visits/{id}', 'Doctor\VisitsController@destroy')->name('doctor.visits.destroy');
Route::get('/doctor/visits/cancel/{id}', 'Doctor\VisitsController@cancel')->name('doctor.visits.cancel');

//-------------------------------------------------------------------------------------------------------------//

//Doctor - Profile
Route::get('/doctor/profile/', 'Doctor\ProfileController@index')->name('doctor.profile.index');
Route::get('/doctor/profile/{id}/edit', 'Doctor\ProfileController@edit')->name('doctor.profile.edit');
Route::put('/doctor/profile/{id}', 'Doctor\ProfileController@update')->name('doctor.profile.update');

//-------------------------------------------------------------------------------------------------------------//

//Patient - Visits
Route::get('/patient/visits/', 'Patient\VisitsController@index')->name('patient.visits.index');
Route::get('/patient/visits/{id}', 'Patient\VisitsController@show')->name('patient.visits.show');
Route::delete('/patient/visits/{id}', 'Patient\VisitsController@destroy')->name('patient.visits.destroy');
Route::get('/patient/visits/cancel/{id}', 'Patient\VisitsController@cancel')->name('patient.visits.cancel');


//-------------------------------------------------------------------------------------------------------------//
//Patient - Profile
Route::get('/patient/profile/', 'Patient\ProfileController@index')->name('patient.profile.index');
Route::get('/patient/profile/{id}/edit', 'Patient\ProfileController@edit')->name('patient.profile.edit');
Route::put('/patient/profile/{id}', 'Patient\ProfileController@update')->name('patient.profile.update');
