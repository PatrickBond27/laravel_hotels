@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- This is a home page for the admin user -->

                    You are logged in as an Admin user! <a href="{{ route('admin.hotels.index')}}"> View All Hotels</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
