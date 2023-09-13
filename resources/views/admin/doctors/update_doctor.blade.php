@extends('templates.TemplateAdmins.master')
@section('title', 'update doctor')
@section('content')

    <!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
        <div class="row">
        <div class="form-box">
            <h2 class="text-center">Update doctor</h2>

            @if( session()->has('success') )
                <div class="px-1 py-1 mt-2 alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <a class="btn btn-danger mb-5" href="{{ route('admin.doctors.index') }}">doctors list</a>


            <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label>Name:</label>
                <input class="form-control" type="text" name="name" placeholder="doctor name" value="{{ $doctor->name }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Phone:</label>
                <input class="form-control" type="text" name="phone" placeholder="doctor phone" value="{{ $doctor->phone }}">
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="text" name="email" placeholder="doctor email" value="{{ $doctor->email }}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>Summary:</label>
                <input class="form-control" type="text" name="summary" placeholder="doctor summary" value="{{ $doctor->summary }}">
                @error('summary')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <select name="major_id" class="form-group">
                    @isset($majors)
                        @forelse ( $majors as $major )
                            <option {{ $major->id == $doctor->major->id ? 'selected' : '' }} value="{{ $major->id }}">{{ $major->title }}</option>
                        @empty
                            <option disabled> None </option>
                        @endforelse
                    @endisset
                </select>
            </div>

            <div class="form-group">
                <select name="city_id" class="form-group">
                    @isset($cities)
                        @forelse ( $cities as $city )
                            <option {{ $city->id == $doctor->city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->city_name }}</option>
                        @empty
                            <option disabled> None </option>
                        @endforelse
                    @endisset
                </select>
            </div>

            <div class="form-group">
            <label>Image:</label>
            <input class="form-control" type="file" name="image" >
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" class="btn btn-primary" value="update doctor" name="update_doctor">
            </form>
        </div>
        </div>
        </div>
    </div>


<!-- End Main Body -->
@endsection
