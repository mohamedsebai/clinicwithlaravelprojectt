@extends('templates.TemplateClinic.clinicUser.master')
@section('title', 'login')
@section('content')


<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">login</li>
                    </ol>
                </nav>

                <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
                    <form class="form" action="{{ route('login') }}" method="POST">
                        @csrf
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

                        <div class="form-group">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">{{ __('Remember me') }}</label>
                        </div>

                        <button type="submit" class="btn btn-primary" name="login">Login</button>


                    </form>
                    <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
                        <span>don't have an account?</span><a class="link" href="{{ route('register') }}">create account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
