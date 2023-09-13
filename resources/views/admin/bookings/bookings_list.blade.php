@extends('templates.TemplateAdmins.master')
@section('title', 'booking list')
@section('content')
<!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
    <div class="row">
        <div class="responsive-table m-auto">
        <h2 class="text-center">bookings List</h2>
        <a class="btn btn-primary mb-2" href="{{ route('admin.bookings.index') }}">All Doctors</a>
            <div class="dropdown mb-5">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Doctors
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @isset($doctors)
                    @forelse ( $doctors as $doctor )
                        <a class="dropdown-item" href="{{ route('admin.bookings.index', $doctor->id) }}">{{ $doctor->name }}</a>
                    @empty
                        <span class="dropdown-item"> None </span>
                    @endforelse
                @endisset
            </div>
            </div>


            <a class="btn btn-danger mb-5" href="{{ route('admin.bookings.create') }}">Add new booking</a>

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
                <th>Phone</th>
                <th>Email</th>
                <td>doctor name</td>
                <td>major</td>
                <th>created at</th>
                <th>Status</th>
                <th>option</th>
                </tr>
            </thead>
                <tbody class="text-center">
                    @isset($bookings)
                    @forelse ( $bookings as $booking )
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->phone }}</td>
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->doctor->name }}</td>
                            <td>{{ $booking->doctor->major->title }}</td>
                            <td>{{ $booking->created_at }}</td>
                            <td>
                            <a href="{{ route('admin.bookings.update.status', ['booking' => $booking->id, 'status' =>  $booking->status == 1 ? 0 : 1 ]) }}"
                                class="btn btn-{{ $booking->status == 1 ? 'success' : 'danger' }}  custom-btn">
                                {{ $booking->status == 1 ? 'Complated' : 'Not Complated' }}
                            </a>
                            </td>
                            <td>
                            <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-success custom-btn"><i class="fa fa-edit"></i>Edit</a>
                                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" class="btn btn-danger custom-btn" value="delete">
                                </form>
                                </td>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">There is no bookings yet</div>
                    @endforelse
                @endisset
            </tbody>
        </table>

        </div>

        </div>

        <div class="row">
            <div class="col-12 mt-5">
                @if ($bookings->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                        <li class="page-item {{ $bookings->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $bookings->previousPageUrl() }}" aria-label="Previous">
                            <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                            <span class="sr-only"> {{ ('lang.Previous') }} </span>
                            </a>
                        </li>
                        @foreach ( $bookings->getUrlRange(1, $bookings->lastPage()) as $pageLink)
                        @php
                            //fuck you php iam mohamed seabeai
                            $pageString = strstr($pageLink, 'page=' , false);
                            $rev = strrev($pageString);
                            $pageNum = strstr($rev, '=' , true);
                            $pageNum = strrev($pageNum);
                        @endphp
                            <li class="page-item {{ substr($pageLink, -1) == $bookings->currentPage() ? 'active': '' }}">
                                <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                </a>
                            </li>
                        @endforeach
                        <li class="page-item {{  $bookings->currentPage() == $bookings->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $bookings->nextPageUrl() }}" aria-label="Next">
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
    </div>
<!-- End Main Body -->
@endsection
