
@extends('templates.TemplateClinic.clinicDoctors.master')
@section('title', 'Doctor-Home')
@section('content')

        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home.index') }}"
                            index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">doctors</li>
                </ol>
            </nav>
            <div class="filteration d-flex gap-3 mb-3 flex-wrap justify-content-center justify-content-lg-start justify-content-md-start">

            <a href="{{ route('front.doctors.index') }}" class="btn btn-danger">All</a>

                <div class="dropdown">
                    <button class="btn bg-blue btn-primary align-items-center d-flex gap-2 dropdown-toggle"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        city
                    </button>

                        <ul class="dropdown-menu">
                            @isset($cities)
                            @forelse ($cities as $city)
                                <li><a class="dropdown-item" href="{{ route('front.doctors.filterByCity',['city_id' => $city->id]) }}">{{ $city->city_name }}</a></li>
                                @empty
                                <li>Nothing</li>
                            @endforelse
                            @endisset
                        </ul>

                </div>

                <div class="dropdown">
                    <button class="btn bg-blue btn-primary align-items-center d-flex gap-2 dropdown-toggle"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        major
                    </button>
                    <ul class="dropdown-menu">
                        @isset($majors)
                        @forelse ($majors as $major)
                            <li><a class="dropdown-item" href="{{ route('front.doctors.index',$major->id) }}">{{ $major->title }}</a></li>
                            @empty
                            <li>Nothing</li>
                        @endforelse
                        @endisset
                    </ul>
                </div>

            </div>
            <div class="doctors-grid">

                @isset($doctors)
                    @forelse ($doctors as $doctor)
                    <div class="card p-2" style="width: 18rem;">
                        <img src="{{ url('admin/assets/images/doctors/' .  $doctor->img  ) }}" class="card-img-top rounded-circle card-image-circle"
                                            alt="major">
                        <div class="card-body d-flex flex-column gap-1 justify-content-center">
                            <h4 class="card-title fw-bold text-center">{{ $doctor->name }}</h4>
                            <h6 class="card-title fw-bold text-center">{{ $doctor->major->title }}</h6>
                            <a href="{{ route('front.doctors.show', $doctor->id) }}" class="btn btn-outline-primary card-button">Book an
                                appointment</a>
                        </div>
                    </div>
                @empty
                        <div class="alert alert-danger">There is no doctors yet</div>
                    @endforelse
                @endisset

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
@endsection


