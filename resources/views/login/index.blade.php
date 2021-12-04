@extends('lr.layouts.main')

@section('container')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 vh100 d-flex align-content-center flex-wrap text-center bg-respon text-light">
      <div class="m-auto">
        <h2>Selamat Datang</h2>
        <span>Kelola data smartphone dan review smartphone melalui Respon Dashboard</span>
      </div>
    </div>
    <div class="col-sm-6 vh100 d-flex justify-content-end flex-wrap">
      <div class="m-auto">
        
        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if (session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="row">
          <div class="col">
            <h2 class="header text-light text-center">Please Login</h2>
          </div>
        </div>
        <div class="card card-form">
          <div class="card-body">
            <form action="/login" method="post">
              @csrf
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                  <div class="input-group-text"><span data-feather="at-sign"></span></div>
                  <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" autofocus required value="{{ old('username') }}">
                </div>
                @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                  <div class="input-group-text"><span data-feather="lock"></span></div>
                  <input type="password" name="password" class="form-control" id="password" required>
                </div>
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
              </div>
              <div class="row mb-0">
                <div class="col-sm-12 d-flex justify-content-end">
                  <button class="btn btn-success rounded-pill" type="submit" name="submit" value="submit">
                    <span data-feather="check"></span> Login
                  </button>
                  <a href="/" class="btn btn-danger rounded-pill ml-flex" type="submit" name="cancel">
                    <span data-feather="x"></span> Cancel
                  </a>
                </div>
              </div>
              <div class="row mb-0">
                <div class="col-sm-12 d-flex justify-content-end">
                  <small class="d-block mt-3">Not registered? <a href="/register">Register Now!</a></small>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection