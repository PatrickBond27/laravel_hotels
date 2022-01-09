@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Hotels
          </div>
          <div class="card-body">
            @if (count($hotels)=== 0)
              <p>There are no Hotels!</p>
            @else
              <table id="table-hotels" class="table table-hover">
                <thead>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Star Rating</th>
                  <th></th>
                </thead>
                <tbody>
                  @foreach ($hotels as $hotel)
                    <tr data-id="{{ $hotel->id }}">
                      <td>{{ $hotel->name }}</td>
                      <td>{{ $hotel->address }}</td>
                      <td>{{ $hotel->star_rating }}</td>

                      <td>
                        <a href="{{ route('user.hotels.show', $hotel->id) }}" class="btn btn-primary">View</a>
                        </form>
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
