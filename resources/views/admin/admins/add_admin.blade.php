@extends('templates.TemplateAdmins.master')
@section('title', 'add admin')
@section('content')

<!-- Start Main Body -->
  <div class="main-body">
   <div class="container">
    <div class="row">
      <div class="form-box">
        <h2 class="text-center">Add New admin</h2>

            <a class="btn btn-danger mb-5" href="{{ route('admin.admins.index') }}">admins list</a>
            @if( session()->has('success') )
                <div class="px-1 py-1 mt-2 alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        <form action="{{ route('admin.admins.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Name:</label>
                <input class="form-control" type="text" name="name" placeholder="admin name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="email" name="email" placeholder="admin email">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>Password:</label>
                <input class="form-control" type="password" name="password" placeholder="admin password">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" class="btn btn-primary" value="add admin">
            </form>
        </div>
        </div>
        </div>
    </div>


<!-- End Main Body -->
@endsection
