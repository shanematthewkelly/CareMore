@extends('patient.layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
              Visit @if($visit->cancelled) <span class="badge badge-danger float-right" style="padding: 10px;margin: 0 5px">CANCELLED</span> @endif

          </div>
          <div class="card-body">
              <table id="table-visits" class="table table-hover">
                  <tbody>
                    <tr>
                      <td>Patient</td>
                      <td>{{ $visit->patient->user->name }}</td>
                    </tr>
                    <tr>
                      <td>Date</td>
                      <td>{{ $visit->date }}</td>
                    </tr>
                    <tr>
                      <td>Time</td>
                      <td>{{ $visit->time }}</td>
                    </tr>
                    <tr>
                      <td>Duration</td>
                      <td>{{ $visit->duration }}</td>
                    </tr>
                    <tr>
                      <td>Cost</td>
                      <td>{{ $visit->cost }}</td>
                    </tr>
                    <tr>
                      <td>Doctor</td>
                      <td>{{ $visit->doctor->user->name }}</td>
                    </tr>
                      </tbody>
                        </table>

                        <a href="{{ route('patient.visits.index') }}" class="btn btn-info">Back</a>
                     @if(!$visit->cancelled) <a href="{{ route('patient.visits.cancel', $visit->id) }}" class="btn btn-dark float-right">Cancel Visit</a> @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endsection
