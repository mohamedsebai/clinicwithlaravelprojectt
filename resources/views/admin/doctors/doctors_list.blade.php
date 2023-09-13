@extends('templates.TemplateAdmins.master')
@section('title', 'doctor list')
@section('content')
<!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
    <div class="row">
        <div class="responsive-table m-auto">
        <h2 class="text-center">doctors List</h2>

        @if( session()->has('success') )
            <div class="px-1 py-1 mt-2 alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <a class="btn btn-danger mb-5" href="{{ route('admin.doctors.create') }}">Create New Doctor</a>

        <table class="table-bordered">
        <thead class="text-center">
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Summary</th>
            <th>City Name</th>
            <th>Major Name</th>
            <th>created at</th>
            <th>option</th>
            </tr>
        </thead>
            <tbody class="text-center">
            @isset($doctors)
                @forelse ( $doctors as $doctor )
                    <tr>
                        <td>{{ $doctor->id }}</td>
                        <td>{{ $doctor->name }}</td>
                        <td><img src="{{ url('admin/assets/images/doctors/' . $doctor->img) }}" alt="" width="100" height="100"></td>
                        <td>{{ $doctor->phone }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->summary }}</td>
                        <td>{{ $doctor->city->city_name }}</td>
                        <td>{{ $doctor->major->title }}</td>
                        <td>{{ $doctor->created_at }}</td>

                        <td>
                        <a href="{{ route('admin.doctor.change-password', $doctor->id) }}" class="btn btn-success custom-btn"><i class="fa fa-edit"></i>Edit password</a>

                        <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-success custom-btn"><i class="fa fa-edit"></i>Edit</a>
                            <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <input type="submit" class="btn btn-danger custom-btn" value="delete">
                            </form>
                            </td>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">There is no doctors yet</div>
                @endforelse
            @endisset






            </tbody>
        </table>

        </div>

        </div>


        <div class="row">
            <div class="col-12 mt-5">
                @if ($doctors->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                        <li class="page-item {{ $doctors->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $doctors->previousPageUrl() }}" aria-label="Previous">
                            <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                            <span class="sr-only"> {{ ('lang.Previous') }} </span>
                            </a>
                        </li>
                        @foreach ( $doctors->getUrlRange(1, $doctors->lastPage()) as $pageLink)
                        @php
                            //fuck you php iam mohamed seabeai
                            $pageString = strstr($pageLink, 'page=' , false);
                            $rev = strrev($pageString);
                            $pageNum = strstr($rev, '=' , true);
                            $pageNum = strrev($pageNum);
                        @endphp
                            <li class="page-item {{ substr($pageLink, -1) == $doctors->currentPage() ? 'active': '' }}">
                                <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                </a>
                            </li>
                        @endforeach
                        <li class="page-item {{  $doctors->currentPage() == $doctors->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $doctors->nextPageUrl() }}" aria-label="Next">
                            <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                            <span class="sr-only"> {{ ('lang.Next') }} </span>
                        </a>
                        </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>


    </div>

</div>
<!-- End Main Body -->


@endsection
