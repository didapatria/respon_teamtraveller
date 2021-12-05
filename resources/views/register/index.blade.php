@extends('lr.layouts.main')

@section('container')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 vh100 d-flex align-content-center flex-wrap">
      <div class="m-auto">
        <div class="row">
          <div class="col">
            <h2 class="header text-light text-center">Registration Form</h2>
          </div>
        </div>
        <div class="card card-form">
          <div class="card-body">
            <form action="/register" method="post">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <div class="input-group">
                  <div class="input-group-text"><span data-feather="type"></span></div>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" autofocus required value="{{ old('name') }}">
                </div>
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
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
                <label for="email" class="form-label">Email address</label>
                <div class="input-group">
                  <div class="input-group-text"><span data-feather="mail"></span></div>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" autofocus required value="{{ old('email') }}">
                </div>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                  <div class="input-group-text"><span data-feather="lock"></span></div>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                </div>
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="row mb-0">
                <div class="col-sm-12 d-flex justify-content-end">
                  <button class="btn btn-success rounded-pill" type="submit" name="submit" value="submit">
                    <span data-feather="check"></span> Register
                  </button>
                </div>
              </div>
              <div class="row mb-0">
                <div class="col-sm-12 d-flex justify-content-end">
                  <small class="d-block mt-3">Alredy registered? <a href="/login">Login</a></small>
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