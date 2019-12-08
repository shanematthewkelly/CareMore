@extends('doctor.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      @if (Session::has('status'))
      {{ Session::get('status') }}
      @endif
    </div>
    </div>
    </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit My Profile
          </div>
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form method="POST" action="{{ route('doctor.profile.update', $doctor->id) }}">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="name" class="form-control" id="name" name="name" value="{{ old('name', $doctor->user->name) }}" />
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $doctor->user->address) }}" />
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $doctor->user->phone) }}" />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $doctor->user->email) }}" />
              </div>
              <div class="form-group">
                <label for="date_started">Date Started</label>
                <input type="date" class="form-control" id="date_started" name="date_started" value="{{ old('date_started', $doctor->date_started) }}" />
              </div>
              <a href="{{ route('doctor.profile.index') }}" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
