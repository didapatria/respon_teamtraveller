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

<form method="post" action="/dashboard/users/{{ $user->username }}" class="mb-5" enctype="multipart/form-data">
  @method('put')
  @csrf
  <h2 class="text-center">{{ old('name', $user->name) }}</h2>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <input type="radio" class="btn-check" name="is_admin" id="option1" autocomplete="off" required value="{{ $user->is_admin = 1 }}" checked>
        <label class="btn ratio ratio-1x1" for="option1"><img src="/assets/img/admin.png" alt="admin"></label>
      </div>
      <div class="col-md-6">
        <input type="radio" class="btn-check" name="is_admin" id="option2" autocomplete="off" required value="{{ $user->is_admin = 0 }}">
        <label class="btn ratio ratio-1x1" for="option2"><img src="/assets/img/user.png" alt="user"></label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3 w-100">Update User</button>
  </div>
</form>
@endsection