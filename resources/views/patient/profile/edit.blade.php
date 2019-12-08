@extends('patient.layout')

@section('content')
<div class="container">
  <script type="text/javascript">

    function yesnoCheck() {
      if(document.getElementById('yesCheck').checked) {
         document.getElementById('ifYes').style.display = 'block';
      } else {
        document.getElementById('ifYes').style.display = 'none';
      }
    }
  </script>
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
            <form method="POST" action="{{ route('patient.profile.update', $patient->id) }}">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="name" class="form-control" id="name" name="name" value="{{ old('name', $patient->user->name) }}" />
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $patient->user->address) }}" />
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $patient->user->phone) }}" />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $patient->user->email) }}" />
              </div>
              <div class="form-group">
                <label for="medical_insurance">Medical Insurance</label> <br>
                 <input id="yesCheck" type="radio" onclick="javascript:yesnoCheck();" name="medical_insurance" value="Yes" {{ old('model') === "1" ? 'checked' : (isset($patient->medical_insurance) && $patient->medical_insurance === '1' ? 'checked' : '') }}> Yes
                 <input id="noCheck" type="radio" onclick="javascript:yesnoCheck();" name="medical_insurance" value="No" {{ old('model') === "0" ? 'checked' : (isset($patient->medical_insurance) && $patient->medical_insurance === '0' ? 'checked' : '') }}> No
              </div>

                <div class="form-group" id="ifYes" style="display:none">
                <br>
                <label for="insurance_company_name">Insurance Company Name <strong><font color="red">(Required if you have medical insurance)</font></strong></label>
                <input type="text" class="form-control" id="insurance_company_name" name="insurance_company_name"/>
                <label for="policy_number">Policy Number <strong><font color="red">(Required if you have medical insurance)</font></strong></label>
                <input type="text" class="form-control" id="policy_number" name="policy_number"/>
              </div>
              <a href="{{ route('patient.profile.index') }}" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
