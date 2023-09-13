@extends('templates.TemplateAdmins.master')
@section('title', 'users list')
@section('content')
    <div class="main-body">
    <div class="container">
    <div class="row">
        <div class="responsive-table m-auto">

        <h2 class="text-center">Users List</h2>
        @if( session()->has('success') )
            <div class="px-1 py-1 mt-2 alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table-bordered">
        <thead class="text-center">
            <tr>
            <th>ID</th>
            <th>Img</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>option</th>
            </tr>
        </thead>
            <tbody class="text-center">

                @isset($users)
                    @forelse ( $users as $user )
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><img src="{{ url('admin/assets/images/users_images/' . $user->img ) }}" width="50"></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" class="btn btn-danger custom-btn" value="delete">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-info">there is no users yet</div>
                    @endforelse
                @endisset

            </tbody>
        </table>
        </div>
    </div>


    <div class="row">
        <div class="col-12 mt-5">
            @if ($users->hasPages())
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                    <li class="page-item {{ $users->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
                        <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                        <span class="sr-only"> {{ ('lang.Previous') }} </span>
                        </a>
                    </li>
                    @foreach ( $users->getUrlRange(1, $users->lastPage()) as $pageLink)
                    @php
                        //fuck you php iam mohamed seabeai
                        $pageString = strstr($pageLink, 'page=' , false);
                        $rev = strrev($pageString);
                        $pageNum = strstr($rev, '=' , true);
                        $pageNum = strrev($pageNum);
                    @endphp
                        <li class="page-item {{ substr($pageLink, -1) == $users->currentPage() ? 'active': '' }}">
                            <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                            </a>
                        </li>
                    @endforeach
                    <li class="page-item {{  $users->currentPage() == $users->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
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
