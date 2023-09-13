    <div class="navigation">
        <div class="toggle-menu">
        <i class="fa fa-bars fa-fw fa-lg"></i>
        </div>
        <div class="nav">
        <div class="logo-box">
            <img src="" style="border-radius: 50%"/>
        </div>
        <h5></h5>
        <br>
        <ul class="list-unstyled">
        <h2>Visit Website</h2>
        <li><a href="{{ route('home.index') }}">Visit Website</a></li>
        </ul>
        <ul class="list-unstyled" style="margin-bottom: 20px">
        <h2>Our Menu</h2>
        <li><a href="{{ route('admin.panel.home') }}">Dashboard</a></li>


        <li><a href="{{ route('admin.bookings.index') }}">Booking list</a></li>

        <li><a href="{{ route('majors.index') }}">Major list</a></li>


        <li><a href="{{ route('cities.index') }}">City list</a></li>


        <li><a href="{{ route('admin.doctors.index') }}">Doctors list</a></li>


        <li><a href="{{ route('messages.index') }}">Messages list</a></li>


        <li><a href="{{ route('admin.users.index') }}">Users list</a></li>
        <li><a href="{{ route('admin.admins.index') }}">Admins list</a></li>





        <li><a href="{{ route('admin.logout') }}">logout</a></li>
        </ul>
        </div>
    </div>
    <!-- End Navigation -->

    <!-- Start Header -->
    <div class="header">
    <div class="container">
    <div class="row">
        <div class="title m-auto">
        <a href="{{ route('admin.panel.home') }}">Welcome to admin panel</a>
        </div>
    </div>
    </div>
    </div>
    <!-- End Header -->
