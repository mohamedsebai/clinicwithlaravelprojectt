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
            <a type="button" class="btn btn-outline-light navigation--button"
                href="{{ route('front.majors.index') }}">majors</a>
            <a type="button" class="btn btn-outline-light navigation--button"
                href="{{ route('front.doctors.index') }}">Doctors</a>

            @if (Auth::check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type="submit" class="btn btn-outline-light navigation--button" value="logout"/>
                </form>
            @else
                <a type="button" class="btn btn-outline-light navigation--button" href="{{ route('login') }}">login</a>
            @endif

            @if (!Auth::guard('doctor')->check())
                <a type="button" class="btn btn-outline-light navigation--button"
                href="{{ route('doctor.login')}}">Doctor controle</a>
            @else
                <a type="button" class="btn btn-outline-light navigation--button"
                href="{{ route('front.doctorProfile.index')}}">Booking Doctor</a>
            @endif



        </div>
    </div>
</div>
</nav>
