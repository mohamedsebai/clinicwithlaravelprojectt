@extends('templates.TemplateAdmins.master')
@section('title', 'rate list')
@section('content')
<!-- Start Main Body -->
<div class="main-body">
    <div class="container">
    <div class="row">
        <div class="responsive-table m-auto">
        <h2 class="text-center">rates List</h2>


        <table class="table-bordered">
        <thead class="text-center">
            <tr>
            <th>ID</th>
            <th>Doctor Name</th>
            <th>Major Title</th>
            <th> Rate( Count of Voting ) </th>
            <th>Latest Rate At</th>
            </tr>
        </thead>
            <tbody class="text-center">
                @isset($rates)
                    @forelse ( $rates as $rate )
                        <tr>
                            <td>{{ $rate->id }}</td>
                            <td>{{ $rate->doctor_name }}</td>
                            <td>{{ $rate->major_title }}</td>
                            <td>{{ $rate->sum_of_rate }}<span class="fa fa-star" style="color: orange"></span></td>
                            <td>{{ $rate->created_at }}</td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">There is no rating for any doctor yet</div>
                    @endforelse
                @endisset

            </tbody>
        </table>

        </div>

        </div>
    </div>


    <div class="row">
        <div class="col-12 mt-5">
            @if ($rates->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                    <li class="page-item {{ $rates->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $rates->previousPageUrl() }}" aria-label="Previous">
                        <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                        <span class="sr-only"> {{ ('lang.Previous') }} </span>
                        </a>
                    </li>
                    @foreach ( $rates->getUrlRange(1, $rates->lastPage()) as $pageLink)
                    @php
                        //fuck you php iam mohamed seabeai
                        $pageString = strstr($pageLink, 'page=' , false);
                        $rev = strrev($pageString);
                        $pageNum = strstr($rev, '=' , true);
                        $pageNum = strrev($pageNum);
                    @endphp
                        <li class="page-item {{ substr($pageLink, -1) == $rates->currentPage() ? 'active': '' }}">
                            <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                            </a>
                        </li>
                    @endforeach
                    <li class="page-item {{  $rates->currentPage() == $rates->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $rates->nextPageUrl() }}" aria-label="Next">
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
@endsection
