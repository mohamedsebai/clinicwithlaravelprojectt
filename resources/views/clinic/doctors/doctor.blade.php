

@extends('templates.TemplateClinic.clinicDoctors.master')
@section('title', 'Home')
@section('content')

        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('front.doctors.index') }}">doctors</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $doctor->name }}</li>
                </ol>
            </nav>

            <div class="d-flex flex-column gap-3 details-card doctor-details">

                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="details d-flex gap-2 align-items-center">
                    <img src="{{ url('admin/assets/images/doctors/' .  $doctor->img ) }}" alt="doctor" class="img-fluid rounded-circle" height="150"
                        width="150">
                    <div class="details-info d-flex flex-column gap-3 ">
                        <h4 class="card-title fw-bold">{{ $doctor->name }}</h4>
                    <!-- include ratign page here for doctor -->
                    @include('templates.TemplateClinic.clinicDoctors.rating')

                <form class="form" action="{{ route('front.booking.store', $doctor->id) }}" method="POST">
                    @csrf
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" name="name"
                            value="{{ Auth::check() ? Auth::user()->name : '' }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input type="tel" name="phone" class="form-control" id="phone" name="phone"
                            value="{{ Auth::check() ? Auth::user()->phone : '' }}">
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" name="email"
                            value="{{ Auth::check() ? Auth::user()->email : '' }}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="booking">Confirm Booking</button>
                </form>

            </div>
        </div>
    </div>
@endsection


