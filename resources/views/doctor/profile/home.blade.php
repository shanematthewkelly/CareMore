@extends('doctor.layout')

@section('content')
<section id="showcase2">
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

                 <tr data-id="{{ $doctor->id }}">
              <a href="{{ route('doctor.profile.edit', $doctor->id) }}" class="btn btn-warning float-right">Edit</a>
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
                <br>
                <hr>
              <h4>Date Started: <font color="orange"> <strong> {{Auth::user()->doctor->date_started}} </strong></font color></h4>

        </div>
      </div>
    </div>
  </div>
</div>



</section>
@endsection
