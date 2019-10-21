@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row"> 
          <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading">Select Device</div>
                  <div class="panel-body">
                    <select class="form-control" id="selectdevice">
                        <option value="0" {{ $activeDevice->id == 0?"selected":"" }}>
                          All
                        </option>
                        @foreach($devices as $device)
                            <option value="{{ $device->id }}" 
                              {{ $activeDevice->id == $device->id?"selected":"" }}>
                              {{ $device->name }}
                            </option>
                        @endforeach
                      </select>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading">
                    Detections for {{ $activeDevice->name }} Device
                  </div>
                  <div class="panel-body">
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Alcohol Level</th>
                            <th>Date</th>
                            <th>Map Link</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($maps as $map)
                            <tr>
                                  <td>{{ $loop->index }}</td>
                                  <td>{{ $map->latitude }}</td>
                                  <td>{{ $map->longitude }}</td>
                                  <td>{{ $map->intoxicant_level }}</td>
                                  <td>{{ $map->created_at->diffforhumans() }}</td>
                                  <td>
                                      <a href="https://www.google.com/maps/place/{{$map->latitude}},
                                          {{$map->longitude}}/{{'@'.$map->latitude}},
                                          {{$map->longitude}},17z/data=!3m1!1e3" target="_blank">map
                                      </a>
                                  </td>
                              </tr> 
                          @endforeach
                        </tbody>
                      </table>
                      <div class="text-center">{{$maps->links()}}</div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('js/changedevice.js') }}"></script>
@endpush