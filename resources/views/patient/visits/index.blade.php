@extends('patient.layout')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
          My Upcoming Visits

          </div>
          <div class="card-body">
              @if (count($visits)=== 0)
              <p> There are no visits!</p>
            @else
              <table id="table-visits" class="table table-hover">
                  <thead>
                    <th>Patient</th>
                    <th>Date</th>
                      <th>Time</th>
                        <th>Duration</th>
                          <th>Cost</th>
                          <th>Doctor</th>
                            <th>Actions</th>
                          </thead>
                          <tbody>
                              @foreach ($visits as $visit)
                                <tr data-id="{{ $visit->id }}">

                                  <td>{{ $visit->patient->user->name}}</td>
                                  <td>{{ $visit->date}}
                                  <td>{{ $visit->time}}</td>
                                  <td>{{ $visit->duration}}</td>
                                  <td>{{ $visit->cost}}</td>
                                  <td>{{ $visit->doctor->user->name}}</td>
                                  <td>
                                    <a href="{{ route('patient.visits.show', $visit->id) }}" class="btn btn-info">View</a>
                                     @if(!$visit->cancelled) <a href="{{ route('patient.visits.cancel', $visit->id) }}" class="btn btn-dark ">Cancel Visit</a> @endif
                                    <td> @if($visit->cancelled) <span class="badge badge-danger" style="padding: 10px;margin: 0 5px">CANCELLED</span> @endif</td>

                                    </td>
                                  </tr>

                              @endforeach
                          </tbody>
                        </table>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>

          @endsection
