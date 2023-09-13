@extends('templates.TemplateAdmins.master')
@section('title', 'major list')
@section('content')
<!-- Start Main Body -->
<div class="main-body">
    <div class="container">
    <div class="row">
        <div class="responsive-table m-auto">
        <h2 class="text-center">Majors List</h2>
        <a class="btn btn-danger mb-5" href="{{ route('majors.create') }}">Create New Major</a>

        @if (session()->has('success'))
            <div class="px-1 py-1 mt-2 alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table-bordered">
        <thead class="text-center">
            <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>created at</th>
            <th>option</th>
            </tr>
        </thead>
            <tbody class="text-center">

                @isset($majors)
                    @forelse ( $majors as $major )
                        <tr>
                            <td>{{ $major->id }}</td>
                            <td>{{ $major->title }}</td>
                            <td>
                            <img src="{{ url("admin/assets/images/majors/$major->img") }}" alt="" width="100" height="100">
                            </td>
                            <td>{{ $major->created_at }}</td>
                            <td>
                            <a href="{{ route('majors.edit', $major->id) }}" class="btn btn-success custom-btn"><i class="fa fa-edit"></i>Edit</a>
                            <form action="{{ route('majors.destroy', $major->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <input type="submit" class="btn btn-danger custom-btn" value="delete">
                            </form>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">There is no majors yet</div>
                    @endforelse
                @endisset

            </tbody>
        </table>

        </div>

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
    </div>
<!-- End Main Body -->
@endsection
