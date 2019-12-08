@extends('doctor.layout')

@section('content')
<section id="showcase">
<div class="container-header">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Doctor Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  <h1>  Welcome <font color="orange"> <strong> {{Auth::user()->name}}, </strong></font color></h1> <br> <h4>You are now logged in as one of our Doctors! </h4>
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

          <h3 class="service-label">My <font color="orange">Profile</font></h3>
          <div class="hline_2"></div>
          <p class = "service-desc">Manage your profile here, all in one place! Make changes if necessary.</p>

          <p class="service-desc">All changes are applied throughout the website</p>

          <a href="{{ route('doctor.profile.index') }}">
          <button type="submit" class="button_2">MANAGE</button></a>
        </div>
        <div class="service-image">
         <a href="{{ route('doctor.profile.index') }}">
          <img src="/images/doctors.jpg">
          </a>
        </div>
      </div>
    </section>
<!------------------------------------------------------------------------------------------------------------------>
    <section id="about">
      <div class="container-about">
        <div class="box">
          <h3 class="service-label">My  <font color="orange">Visits</font></h3>
          <div class="hline_2"></div>
          <p class = "about-desc">Here is where you can find information about your patient's visit with you!</p>

          <p class="about-desc">You have the option to customize, view and cancel a visit if you wish!</p>

          <a href="{{ route('doctor.visits.index') }}">
          <button type="submit" class="button_2">MANAGE</button></a>
        </div>
        <div class="about-image">
         <a href="{{ route('doctor.visits.index') }}">
          <img src="/images/patient.jpg" alt="Avatar">
          </a>
        </div>
      </div>
    </section>

@endsection
