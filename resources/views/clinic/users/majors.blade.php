

@extends('templates.TemplateClinic.clinicUser.master')
@section('title', 'majors')
@section('content')
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">majors</li>
                </ol>
            </nav>
            <div class="majors-grid">


                @isset($majors)
                    @forelse ($majors as $major)
                        <div class="card p-2" style="width: 18rem;">
                            <img src="{{ url('admin/assets/images/majors/'. $major->img) }}" class="card-img-top rounded-circle card-image-circle"
                                alt="major">
                            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                <h4 class="card-title fw-bold text-center">{{ $major->title }}</h4>
                                <a href="{{ route('front.doctors.index', $major->id) }}" class="btn btn-outline-primary card-button">Browse Doctors</a>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">There is no major yet</div>
                    @endforelse
                @endisset

            </div>



            <div class="row">
                <div class="col-12 mt-5">
                    @if ($majors->hasPages())
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                            <li class="page-item {{ $majors->currentPage() == 1 ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $majors->previousPageUrl() }}" aria-label="Previous">
                                <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                                <span class="sr-only"> {{ ('lang.Previous') }} </span>
                                </a>
                            </li>
                            @foreach ( $majors->getUrlRange(1, $majors->lastPage()) as $pageLink)
                            @php
                                //fuck you php iam mohamed seabeai
                                $pageString = strstr($pageLink, 'page=' , false);
                                $rev = strrev($pageString);
                                $pageNum = strstr($rev, '=' , true);
                                $pageNum = strrev($pageNum);
                            @endphp
                                <li class="page-item {{ substr($pageLink, -1) == $majors->currentPage() ? 'active': '' }}">
                                    <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                    </a>
                                </li>
                            @endforeach
                            <li class="page-item {{  $majors->currentPage() == $majors->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $majors->nextPageUrl() }}" aria-label="Next">
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
