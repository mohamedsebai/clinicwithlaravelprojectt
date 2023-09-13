@extends('templates.TemplateAdmins.master')
@section('title', 'udpate doctor password')
@section('content')
<div class="container mt-5">
    <h2 class="text-center mt-5">doctor {{ $doctor->name }}</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Chnage Password') }}</div>

                <form action="{{ route('admin.doctor.update-password', $doctor->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="newPasswordInput" class="form-label">New Password</label>
                            <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                placeholder="New Password">
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                            <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                placeholder="Confirm New Password">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button class="btn btn-success">Update password </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- End Main Body -->

@endsection
