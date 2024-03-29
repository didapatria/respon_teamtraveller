@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit User</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
@endif

<form method="post" action="/dashboard/users/{{ $user->username }}" class="mb-5">
  @method('put')
  @csrf
  <h2 class="text-center">{{ old('name', $user->name) }}</h2>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <input type="radio" class="btn-check" name="is_admin" id="is_admin1" autocomplete="off" required value="1">
        <label class="btn ratio ratio-1x1" for="is_admin1"><img src="/assets/img/admin.png" alt="admin"></label>
      </div>
      <div class="col-md-6">
        <input type="radio" class="btn-check" name="is_admin" id="is_admin2" autocomplete="off" required value="0">
        <label class="btn ratio ratio-1x1" for="is_admin2"><img src="/assets/img/user.png" alt="user"></label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3 w-100">Update User</button>
  </div>
</form>
@endsection