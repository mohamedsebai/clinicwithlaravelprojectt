<footer class="container-fluid bg-blue text-white py-3">
        <div class="row gap-2">

            <div class="col-sm order-sm-1">
                <h1 class="h1">About Us</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque,
                    laborum
                    saepe
                    enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis consequatur
                    cum
                    iure
                    quod facere.</p>
            </div>
            <div class="col-sm order-sm-2">
                <h1 class="h1">Links</h1>
                <div class="links d-flex gap-2 flex-wrap">
                    <a href="{{ route('home.index') }}" class="link text-white">Home</a>

                    <a href="{{ route('front.majors.index') }}" class="link text-white">Majors</a>
                    <a href="{{ route('front.doctors.index') }}" class="link text-white">Doctors</a>

                    <a href="{{ route('contact.index') }}" class="link text-white">Contact</a>

                    @if (Auth::check())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input type="submit" class="link text-white btn btn-danger py-0 px-0 ml-1" value="logout" />
                        </form>
                    @else
                        <a class="link text-white" href="{{ route('login') }}">login</a>
                        <a href="{{ route('register') }}" class="link text-white">Register</a>
                    @endif

                </div>
            </div>
        </div>
    </footer>
