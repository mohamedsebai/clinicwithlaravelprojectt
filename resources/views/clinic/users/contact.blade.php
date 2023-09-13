

@extends('templates.TemplateClinic.clinicUser.master')
@section('title', 'contact')
@section('content')
            <div class="container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">contact</li>
                    </ol>
                </nav>

                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
                    <form class="form" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="form-items">
                            <div class="mb-3">
                                <label class="form-label required-label" for="name">Name</label>
                                <input type="text" class="form-control" id="name"  name="name" value="{{ Auth::check() ? Auth::user()->name : '' }}">
                                @error('name')
                                    <div class="alert alert-danger mt-2 py-0 px-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label required-label" for="phone">Phone</label>
                                <input type="tel" class="form-control" id="phone"  name="phone" value="{{ Auth::check() ? Auth::user()->phone : '' }}">
                                @error('phone')
                                    <div class="alert alert-danger mt-2 py-0 px-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label required-label" for="email">Email</label>
                                <input type="email" class="form-control" id="email"  name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}">
                                @error('email')
                                    <div class="alert alert-danger mt-2 py-0 px-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label required-label" for="subject">subject</label>
                                <input type="text" class="form-control" id="subject"  name="subject">
                                @error('subject')
                                    <div class="alert alert-danger mt-2 py-0 px-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label required-label" for="message">message</label>
                                <textarea class="form-control" id="message"  name="content"></textarea>
                                @error('content')
                                    <div class="alert alert-danger mt-2 py-0 px-0">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>

            </div>
    </div>
@endsection
