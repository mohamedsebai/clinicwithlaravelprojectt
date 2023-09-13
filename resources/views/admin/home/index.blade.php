    @extends('templates.TemplateAdmins.master')
    @section('title', 'Home')
    @section('content')
    <!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
    <div class="row">
    <div class="col-md-6 col-lg-3">
    <div class="stat user">
        <div class="d-inline-block text-center">
        <h5>Admins</h5>
        <i class="fa fa-users"></i>
        </div>
        <div class="float-right d-inline-block text-center">
        <h5>Count</h5>
        <span>{{ $adminsCount }}</span>
        <a href="{{ route('admin.admins.index') }}" class="btn btn-primary mb-3">list</a>
        </div>
    </div>
    </div>
    <div class="col-md-6 col-lg-3">
    <div class="stat user">
        <div class="d-inline-block text-center">
        <h5>Users</h5>
        <i class="fa fa-users"></i>
        </div>
        <div class="float-right d-inline-block text-center">
        <h5>Count</h5>
        <span>{{ $usersCount }}</span>
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary mb-3">list</a>
        </div>
    </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat post">
        <div class="d-inline-block text-center">
            <h5>Doctors</h5>
            <i class="fa fa-paste"></i>
        </div>
        <div class="float-right d-inline-block text-center">
            <h5>Count</h5>
            <span>{{ $doctorsCount }}</span>
            <a href="{{ route('admin.doctors.index') }}" class="btn btn-primary mb-3">list</a>
        </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="stat category">
        <div class="d-inline-block text-center">
            <h5>Majors</h5>
            <i class="fa fa-tags"></i>
        </div>
        <div class="float-right d-inline-block text-center">
            <h5>Count</h5>
            <span>{{ $majorsCount }}</span>
            <a href="{{ route('majors.index') }}" class="btn btn-primary mb-3">list</a>
        </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="stat category">
        <div class="d-inline-block text-center">
            <h5>Bookings</h5>
            <i class="fa fa-tags"></i>
        </div>
        <div class="float-right d-inline-block text-center">
            <h5>Count</h5>
            <span>{{ $bookingsCount }}</span>
            <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary mb-3">list</a>
        </div>
        </div>
    </div>


    <div class="col-md-6 col-lg-3">
        <div class="stat category">
        <div class="d-inline-block text-center">
            <h5>Cities</h5>
            <i class="fa fa-tags"></i>
        </div>
        <div class="float-right d-inline-block text-center">
            <h5>Count</h5>
            <span>{{ $citiesCount }}</span>
            <a href="{{ route('cities.index') }}" class="btn btn-primary mb-3">list</a>
        </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="stat category">
        <div class="d-inline-block text-center">
            <h5>Messages</h5>
            <i class="fa fa-tags"></i>
        </div>
        <div class="float-right d-inline-block text-center">
            <h5>Count</h5>
            <span>{{ $messagesCount }}</span>
            <a href="{{ route('messages.index') }}" class="btn btn-primary mb-3">List</a>
        </div>
        </div>
    </div>

    </div>

    <div class="latest-items">
    <div class="row">

    <div class="col-md-12">
        <div class="latest latest-users">
        <h4>Latest Bookings</h4>


        <div class="col-md-12">
            <div class="latest latest-users">
                <h4>Latest Bookings</h4>

                <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary mb-3">Bookings List</a>

                <table class="table-bordered">
                <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <td>doctor</td>
                    <td>doctor Img</td>
                    <td>major</td>
                    <th>created at</th>
                </tr>
                </thead>
                <tbody class="text-center">


            @isset($bookings)
                @forelse ($bookings as $booking)
                    <tr>
                        <td>{{  $booking->id }}</td>
                        <td>{{  $booking->name }}</td>
                        <td>{{  $booking->phone }}</td>
                        <td>{{  $booking->email }}</td>
                        <td>{{  $booking->doctor->name }}</td>
                        <td><img src="{{ url('admin/assets/images/doctors/' . $booking->doctor->img) }}" width="30"></td>
                        <td>{{  $booking->doctor->major->title }}</td>
                        <td>{{  $booking->created_at }}</td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">there is no bookings yet</div>
                    @endforelse
                @endisset

                </tbody>
                </table>

                </div>
            </div>


        </div>
    </div>

    </div>
    </div>

    </div>
    </div>


    @endsection
