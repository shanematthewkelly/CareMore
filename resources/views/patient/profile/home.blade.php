@extends('patient.layout')

@section('content')
<section id="showcase3">
<div class="container-header">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  <h1>My Profile: <font color="orange"> <strong> {{Auth::user()->name}} </strong></font color></h1> <br> <h4>Manage Your Profile Settings here!</h4>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!------------------------------------------------------------------------------------------------------------------>
<section id="service">
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          <!------------------------------------------------------>
                My Details
                 <tr data-id="{{ $patient->id }}">
              <a href="{{ route('patient.profile.edit', $patient->id) }}" class="btn btn-warning float-right">Edit</a>
            </tr>

          <!------------------------------------------------------>
        </div>
        <div class="card-body">
              <h4>Name: <font color="orange"> <strong> {{Auth::user()->name}} </strong></font color></h4>
                <br>
                <hr>
              <h4>Address: <font color="orange"> <strong> {{Auth::user()->address}} </strong></font color></h4>
                <br>
                <hr>
              <h4>Email: <font color="orange"> <strong> {{Auth::user()->email}} </strong></font color></h4>
                <br>
                <hr>
              <h4>Phone: <font color="orange"> <strong> {{Auth::user()->phone}} </strong></font color></h4>

        </div>
      </div>
    </div>
  </div>
</div>
<!-------------------------------------------------------------------------------------------------------------->
<section id="service">
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-2">
      <div class="card">
        <div class="card-header">
          Legal
<br>
</div>
<div class="card-body">
<h4>Medical Insurance: <font color="orange"> <strong> {{Auth::user()->patient->medical_insurance}} </strong></font color></h4>
<br>
<hr>
<h4>Insurance Name: <font color="orange"> <strong> {{Auth::user()->patient->insurance_company_name}} </strong></font color></h4>
<br>
<hr>
<h4>Policy Number: <font color="orange"> <strong> {{Auth::user()->patient->policy_number}} </strong></font color></h4>

</div>
  </div>
    </div>
      </div>

</section>
@endsection
