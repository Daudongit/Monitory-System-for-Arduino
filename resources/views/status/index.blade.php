@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row"> 
          <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading text-center"><h4>Select Device</h4></div>
                  {{-- <div class="panel-body">
                    
                  </div> --}}
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      Device Status
                  </div>
                  <div class="panel-body">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Status</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($status as $stus)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $stus->status }}</td>
                                <td>{{ $stus->created_at->diffforhumans() }}</td>
                            </tr> 
                          @endforeach
                        </tbody>
                      </table>
                      <div class="text-center">{{$status->links()}}</div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection