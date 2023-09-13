
@extends('templates.TemplateClinic.clinicUser.master')
@section('title', 'register')
@section('content')
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">login</li>
                </ol>
            </nav>
            <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
                <form class="form" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Username</label>
                            <input type="text" class="form-control" id="name" name="name">
                            @error('name')
                            <div class="alert alert-danger py-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                            @error('phone')
                            <div class="alert alert-danger py-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @error('email')
                                <div class="alert alert-danger py-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="password">password</label>
                            <input type="text" class="form-control" id="password" name="password">
                            @error('password')
                            <div class="alert alert-danger py-0">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label required-label" for="password_confirmation">password_confirmation</label>
                            <input type="text" class="form-control" id="password_confirmation" name="password_confirmation">
                            @error('password_confirmation')
                            <div class="alert alert-danger py-0">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label required-label" for="Image">Image</label>
                            <input type="file" class="form-control" id="Image" name="image">
                            @error('image')
                            <div class="alert alert-danger py-0">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary" name="create_account">Create account</button>
                </form>
                <div class="d-flex justify-content-center gap-2">
                    <span>already have an account?</span><a class="link" href="./login.php"> login</a>
                </div>
            </div>
        </div>
    </div>
@endsection
