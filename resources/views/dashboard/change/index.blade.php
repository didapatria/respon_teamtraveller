@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Change Password</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="row">
  <div class="col-md-6">
    <form method="post" action="/dashboard/change" class="mb-5">
      @method('put')
      @csrf
      <div class="row">
        <div class="mb-3 col-md-12">
          <label for="last_password" class="form-label">Last Password</label>
          <input type="password" class="form-control @error('last_password') is-invalid @enderror" id="last_password" name="last_password" required autofocus>
          @error('last_password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3 col-md-12">
          <label for="new_password" class="form-label">New Password</label>
          <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" required">
          @error('new_password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>     

      <button type="submit" class="btn btn-primary mt-3">Update Password</button>
    </form>
  </div>
</div>
@endsection