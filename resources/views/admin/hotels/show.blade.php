@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Hotel: {{ $hotel->name }}
          </div>
          <div class="card-body">
              <table id="table-hotels" class="table table-hover">
                <tbody>
                  <tr>
                      <td rowspan="8"><img src="{{ asset('storage/images/' . $hotel->image_location) }}" width="150"/></td>
                  </tr>
                  <tr>
                    <td>Name</td>
                    <td>{{ $hotel->name }}</td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td>{{ $hotel->address }}</td>
                  </tr>
                  <tr>
                    <td>Star Rating</td>
                    <td>{{ $hotel->star_rating}}</td>
                  </tr>
                  <tr>
                    <td>Phone Number</td>
                    <td>{{ $hotel->phone_number }}</td>
                  </tr>
                </tbody>
              </table>

              <a href="{{ route('admin.hotels.index') }}" class="btn btn-default">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
