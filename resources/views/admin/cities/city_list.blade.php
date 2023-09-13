@extends('templates.TemplateAdmins.master')
@section('title', 'City list')
@section('content')
<!-- Start Main Body -->
<div class="main-body">
<div class="container">
<div class="row">
    <div class="responsive-table m-auto">
    <h2 class="text-center">Cities List</h2>

    @if( session()->has('success') )
        <div class="px-1 py-1 mt-2 alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif


    <a class="btn btn-danger mb-5" href="{{ route('cities.create') }}">Create New City</a>

    <table class="table-bordered">
    <thead class="text-center">
        <tr>
        <th>ID</th>
        <th>City_name</th>
        <th>created at</th>
        <th>option</th>
        </tr>
    </thead>
        <tbody class="text-center">

            @isset($cities)
            @forelse ( $cities as $city )
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->city_name }}</td>
                    <td>{{ $city->created_at }}</td>
                    <td>
                    <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-success custom-btn"><i class="fa fa-edit"></i>Edit</a>
                    <form action="{{ route('cities.destroy', $city->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-danger custom-btn" value="delete">
                    </form>
                    </td>
                </tr>
            @empty
                <div class="alert alert-danger">There is no cities yet</div>
            @endforelse
        @endisset

        </tbody>
    </table>

    </div>

    </div>

    <div class="row">
        <div class="col-12 mt-5">
            @if ($cities->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                    <li class="page-item {{ $cities->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cities->previousPageUrl() }}" aria-label="Previous">
                        <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                        <span class="sr-only"> {{ ('lang.Previous') }} </span>
                        </a>
                    </li>
                    @foreach ( $cities->getUrlRange(1, $cities->lastPage()) as $pageLink)
                    @php
                        //fuck you php iam mohamed seabeai
                        $pageString = strstr($pageLink, 'page=' , false);
                        $rev = strrev($pageString);
                        $pageNum = strstr($rev, '=' , true);
                        $pageNum = strrev($pageNum);
                    @endphp
                        <li class="page-item {{ substr($pageLink, -1) == $cities->currentPage() ? 'active': '' }}">
                            <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                            </a>
                        </li>
                    @endforeach
                    <li class="page-item {{  $cities->currentPage() == $cities->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cities->nextPageUrl() }}" aria-label="Next">
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
