@extends('admin.layout')

@section('content')
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Visits
            <a href="{{ route('admin.visits.create') }}" class="btn btn-primary float-right">Add</a>
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
                                  <td>{{ $visit->date}}</td>
                                  <td>{{ $visit->time}}</td>
                                  <td>{{ $visit->duration}}</td>
                                  <td>{{ $visit->cost}}</td>
                                  <td>{{ $visit->doctor->user->name}}</td>
                                  <td>
                                    <a href="{{ route('admin.visits.show', $visit->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
                                        @if(!$visit->cancelled) <a href="{{ route('admin.visits.cancel', $visit->id) }}" class="btn btn-dark">Cancel</a> @endif
                                    <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id) }}">
                                      <input type="hidden" name="_method" value="DELETE">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <button type="submit" class="form-control btn btn-danger">Delete</a>
                                      </form>

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
