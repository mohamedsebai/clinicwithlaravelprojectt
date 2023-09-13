@extends('templates.TemplateAdmins.master')
@section('title', 'add major')
@section('content')
<!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
        <div class="row">
        <div class="form-box">
            <h2 class="text-center">Add New Major</h2>

            <a class="btn btn-danger mb-5" href="{{ route('majors.index') }}">Major list</a>

            @if( session()->has('success') )
                <div class="px-1 py-1 mt-2 alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <form action="{{ route('majors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name:</label>
                <input class="form-control" type="text" name="title" placeholder="major title" value="{{ old('title') }}">
                @error('title')
                    <div class="px-1 py-1 mt-2 alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Image:</label>
                <input class="form-control" type="file" name="image" >
                @error('image')
                    <div class="px-1 py-1 mt-2 alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <input type="submit" class="btn btn-primary" value="add Major" name="add_major">
            </form>
        </div>
        </div>
        </div>
    </div>


<!-- End Main Body -->
@endsection
