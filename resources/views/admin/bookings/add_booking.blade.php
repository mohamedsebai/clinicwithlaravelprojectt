@extends('templates.TemplateAdmins.master')
@section('title', 'add booking')
@section('content')
<!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
        <div class="row">
        <div class="form-box">
            <h2 class="text-center">Add New booking</h2>

            <a class="btn btn-danger mb-5" href="{{ route('admin.bookings.index') }}">bookings list</a>

            @if( session()->has('success') )
                <div class="px-1 py-1 mt-2 alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form action="{{ route('admin.bookings.store') }}" method="POST">
                @csrf
            <div class="form-group">
                <label>Name:</label>
                <input class="form-control" type="text" name="name" placeholder="booking name" value="{{ old('name') }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Phone:</label>
                <input class="form-control" type="text" name="phone" placeholder="booking phone" value="{{ old('phone') }}">
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="text" name="email" placeholder="booking email" value="{{ old('email') }}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


                <div class="form-group">
                    <select name="doctor_id" class="form-group">
                    @isset($doctors)
                        @forelse ( $doctors as $doctor )
                            <option  value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @empty
                            <option disabled> None </option>
                        @endforelse
                    @endisset
                    </select>
                </div>


            <input type="submit" class="btn btn-primary" value="add booking">
            </form>
        </div>
        </div>
        </div>
    </div>


<!-- End Main Body -->
@endsection
