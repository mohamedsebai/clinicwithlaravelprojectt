@include('templates.TemplateClinic.clinicDoctors.header')

<body>
    <div class="page-wrapper">

        {{-- custom navbar for doctors booking  --}}

        <nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
            <div class="container">
                <div class="navbar-brand">
                    <a class="fw-bold text-white m-0 text-decoration-none h3" href="{{ route('home.index') }}">VCare</a>
            </div>
            <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                    <a type="button" class="btn btn-outline-light navigation--button" href="{{ route('home.index') }}">Home</a>
                    @if (Auth::guard('doctor')->check())
                        <form method="POST" action="{{ route('doctor.logout') }}">
                            @csrf
                            <input type="submit" class="btn btn-outline-light navigation--button" value="logout"/>
                        </form>
                    @else
                        <a type="button" class="btn btn-outline-light navigation--button" href="{{ route('doctor.login') }}">login</a>
                    @endif

                </div>
            </div>
        </div>
        </nav>



        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <h2 class="fw-200">{{ Auth::guard('doctor')->user()->name }}</h2>
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item active" aria-current="page">Your Booking history</li>
                </ol>
            </nav>
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">major</th>
                        <th scope="col">location</th>
                        <th scope="col">completed</th>
                    </tr>
                </thead>
                <tbody>
                @isset($bookings)
                    @foreach ($bookings as $booking)
                        @if($booking->doctor_id == Auth::guard('doctor')->user()->id)
                            <tr>
                                <th scope="row">{{ $booking->id }}</th>
                                <td>{{ $booking->created_at }}</td>
                                <td class="d-flex align-items-center gap-2"><img src="{{ url('admin/assets/images/doctors/' . $booking->doctor_img ) }}" alt="" width="25"
                                        height="25" class="rounded-circle">
                                    <a href="../doctors/doctor.php?doctor_id="></a>
                                </td>
                                <td>{{ $booking->major_title }}</td>
                                <td><a href="https://www.eraasoft.com" target="_blank">{{ $booking->location }}</a></td>
                                <td>
                                    {{ $booking->status == 0 ? 'Not Complated' : 'Complated'  }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endisset


                </tbody>
            </table>
        </div>
    </div>
    @include('templates.TemplateClinic.clinicDoctors.footer')
