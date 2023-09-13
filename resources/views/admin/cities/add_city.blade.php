@extends('templates.TemplateAdmins.master')
@section('title', 'add city')
@section('content')

<!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
        <div class="row">
        <div class="form-box">


            <h2 class="text-center">Add New City</h2>

            @if( session()->has('success') )
                <div class="px-1 py-1 mt-2 alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <a class="btn btn-danger mb-5" href="{{ route('cities.index') }}">City list</a>

            <form action="{{ route('cities.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>City Name:</label>
                <input class="form-control" type="text" name="city_name" placeholder="city name" value="{{ old('city_name') }}">
                @error('city_name')
                    <div class="px-1 py-1 mt-2 alert alert-danger">
                        {{$message}}
                    </div>
                @enderror

            </div>
            <input type="submit" class="btn btn-primary" value="add City" name="add_city">
            </form>
        </div>
        </div>
        </div>
    </div>

<!-- End Main Body -->
@endsection
