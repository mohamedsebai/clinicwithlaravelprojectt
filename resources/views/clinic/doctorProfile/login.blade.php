@include('templates.TemplateClinic.clinicDoctors.header')

        <div class="container">



            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home.index') }}">Are You Not Doctor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Doctor login</li>
                </ol>
            </nav>

            <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
                <form class="form" action="{{ route('doctor.login.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        @error('email')
                            <div class="alert alert-danger py-0">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="password">password</label>
                        <input type="text" class="form-control" id="password" name="password">
                        @error('password')
                            <div class="alert alert-danger py-0">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="remember" id="remember" >
                        <label for="remember">{{ __('Remember me') }}</label>
                    </div>

                    <button type="submit" class="btn btn-primary" name="login">Login</button>

                </form>
                <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
                    <span class="fw-bold">if you a doctor ask the owner for your email and password</span>
                </div>
            </div>




        </div>

    </div>
    @include('templates.TemplateClinic.clinicDoctors.footer')
