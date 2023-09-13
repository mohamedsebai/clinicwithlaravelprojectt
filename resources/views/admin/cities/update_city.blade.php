@extends('templates.TemplateAdmins.master')
@section('title', 'update city')
@section('content')
<!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
        <div class="row">
        <div class="form-box">

            <h2 class="text-center">Update City</h2>

            @if (session()->has('success'))
                <div class="px-1 py-1 mt-2 alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <a class="btn btn-danger mb-5" href="{{ route('cities.create') }}">Create New City</a>
            <a class="btn btn-danger mb-5" href="{{ route('cities.index') }}">city list</a>
            <form action="{{ route('cities.update', $city->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="city_id" value="">

            <div class="form-group">
                <label>City Name:</label>
                <input class="form-control" type="text" name="city_name" placeholder="City Name" value="{{ $city->city_name }}">
                @error('city_name')
                    <div class="px-1 py-1 mt-2 alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <input type="submit" class="btn btn-primary" value="update City" name="update_city">
            </form>
        </div>
        </div>
        </div>
    </div>


<!-- End Main Body -->

@endsection

