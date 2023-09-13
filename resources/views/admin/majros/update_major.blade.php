@extends('templates.TemplateAdmins.master')
@section('title', 'update major')
@section('content')

    <!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
        <div class="row">
        <div class="form-box">
            <h2 class="text-center">Update Major</h2>
            <a class="btn btn-danger mb-5" href="{{ route('majors.create') }}">Create New Major</a>
            <a class="btn btn-danger mb-5" href="{{ route('majors.index') }}">Major list</a>

            @if (session()->has('success'))
                <div class="px-1 py-1 mt-2 alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            <form action="{{ route('majors.update', $major->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Name:</label>
                <input class="form-control" type="text" name="title" placeholder="major title" value="{{ $major->title }}">
                @error('title')
                    <div class="px-1 py-1 mt-2 alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Image:</label>
                <input class="form-control" type="file" name="image">
                @error('image')
                    <div class="px-1 py-1 mt-2 alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <input type="submit" class="btn btn-primary" value="update Major" name="update_major">
            </form>
        </div>
        </div>
        </div>
    </div>


<!-- End Main Body -->

@endsection

