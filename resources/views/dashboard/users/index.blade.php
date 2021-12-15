@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">All Users</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-3">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">User Name</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>
          <button type="button" class="btn btn-success btn-sm p-0 disabled">
            @if ($user->is_admin == 1)
              <small>Admin</small>
            @else
              <small>User</small> 
            @endif
          </button>
        </td>
        <td>
            <a href="/dashboard/users/{{ $user->username }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/users/{{ $user->username }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge btn-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="delete"></span></button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

{{-- Pagination --}}
{{ $users->links() }}
@endsection