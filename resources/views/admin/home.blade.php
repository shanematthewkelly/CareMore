@extends('admin.layout')

@section('content')

<section id="showcase">
<div class="container-header">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Administrator Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  <h1>  Welcome <font color="orange"> <strong> {{Auth::user()->name}}, </strong></font color></h1> <br> <h4>You are now logged in as one of our Administrators! </h4>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!------------------------------------------------------------------------------------------------------------------>
<section id="service">
      <div class="container-shane">
        <div class="box">

          <h3 class="service-label">Manage: <font color="orange">Doctors</font></h3>
          <div class="hline_2"></div>
          <p class = "service-desc">Manage all your doctors within the hospital here! You can create, view, edit and delete doctors.</p>

          <p class="service-desc">You can also view which patients are asigned to what doctor</p>

          <a href="{{ route('admin.doctors.index') }}">
          <button type="submit" class="button_2">MANAGE</button></a>
        </div>
        <div class="service-image">
         <a href="{{ route('admin.doctors.index') }}">
          <img src="/images/doctors.jpg">
          </a>
        </div>
      </div>
    </section>
<!------------------------------------------------------------------------------------------------------------------>
    <section id="about">
      <div class="container-about">
        <div class="box">
          <h3 class="service-label">Manage: <font color="orange">Patients</font></h3>
          <div class="hline_2"></div>
          <p class = "about-desc">Manage all of your patients within the hospital here! You can create, view, edit and delete any and all patients</p>

          <p class="about-desc">Remember one doctor can have many patients, so be careful!</p>

          <a href="{{ route('admin.patients.index') }}">
          <button type="submit" class="button_2">MANAGE</button></a>
        </div>
        <div class="about-image">
         <a href="{{ route('admin.patients.index') }}">
          <img src="/images/patient.jpg" alt="Avatar">
          </a>
        </div>
      </div>
    </section>
<!------------------------------------------------------------------------------------------------------------------>
    <section id="service">
          <div class="container-shane">
            <div class="box">

              <h3 class="service-label">Manage: <font color="orange">Visits</font></h3>
              <div class="hline_2"></div>
              <p class = "service-desc">Manage all visits within the hospital here! You can create, view, edit and delete visits.</p>

              <p class="service-desc">When a doctor schedules a visit for a patient, it will be in here! </p>

              <a href="{{ route('admin.visits.index') }}">
              <button type="submit" class="button_2">MANAGE</button></a>
            </div>
            <div class="service-image">
             <a href="{{ route('admin.visits.index') }}">
              <img src="/images/visits.jpg">
              </a>
            </div>
          </div>
        </section>
  @endsection
