@extends('templates.TemplateAdmins.master')
@section('title', 'admin list')
@section('content')
    <!-- Start Main Body -->

    <div class="main-body">

    <div class="container">

    <div class="row">

        <div class="responsive-table m-auto">

        <h2 class="text-center">admins List</h2>

        <a class="btn btn-danger mb-5" href="{{ route('admin.admins.create') }}">Add new Admin</a>

        @if( session()->has('success') )
        <div class="px-1 py-1 mt-2 alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        <table class="table-bordered">
        <thead class="text-center">
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>created at</th>
            <th>option</th>
            </tr>
        </thead>
            <tbody class="text-center">
                @isset($admins)
                @forelse ( $admins as $admin )
                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->created_at }}</td>
                        <td>
                            <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <input type="submit" class="btn btn-danger custom-btn" value="delete">
                            </form>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">There is no admins yet</div>
                @endforelse
            @endisset

            </tbody>
        </table>

        </div>

        </div>

    </div>

    </div>

    </div>
<!-- End Main Body -->
@endsection
