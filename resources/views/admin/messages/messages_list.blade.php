@extends('templates.TemplateAdmins.master')
@section('title', 'message list')
@section('content')
<!-- Start Main Body -->
<div class="main-body">
 <div class="container">
  <div class="row">
    <div class="responsive-table m-auto">
      <h2 class="text-center">Messages List</h2>
        @if( session()->has('success') )
            <div class="px-1 py-1 mt-2 alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table-bordered">
        <thead class="text-center">
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Subject</th>
            <th>Messge Content</th>
            <th>created at</th>
            <th>option</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @isset($messages)
                @forelse ( $messages as $message )
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>{{ $message->content }}</td>
                        <td>{{ $message->created_at }}</td>
                        <td>
                            <form action="{{ route('messages.destroy', $message->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <input type="submit" class="btn btn-danger custom-btn" value="delete">
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">There is no Messages yet</div>
                @endforelse
            @endisset

            </tbody>
        </table>

        </div>

        </div>

        <div class="row">
            <div class="col-12 mt-5">
                @if ($messages->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                        <li class="page-item {{ $messages->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $messages->previousPageUrl() }}" aria-label="Previous">
                            <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                            <span class="sr-only"> {{ ('lang.Previous') }} </span>
                            </a>
                        </li>
                        @foreach ( $messages->getUrlRange(1, $messages->lastPage()) as $pageLink)
                        @php
                            //fuck you php iam mohamed seabeai
                            $pageString = strstr($pageLink, 'page=' , false);
                            $rev = strrev($pageString);
                            $pageNum = strstr($rev, '=' , true);
                            $pageNum = strrev($pageNum);
                        @endphp
                            <li class="page-item {{ substr($pageLink, -1) == $messages->currentPage() ? 'active': '' }}">
                                <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                </a>
                            </li>
                        @endforeach
                        <li class="page-item {{  $messages->currentPage() == $messages->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $messages->nextPageUrl() }}" aria-label="Next">
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

<!-- End Main Body -->
@endsection
