@extends('layouts.main')

@section('container')
  <img src="/assets/img/cover.png" alt="cover" class="cover w-100">

  <div class="container mt-4">

    {{-- Search --}}
    <div class="row justify-content-end">
      <div class="col-md-6">
        <form action="/">
          @if (request('brand'))
            <input type="hidden" name="brand" value="{{ request('brand') }}">
          @endif
          @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
          @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search">
            <button class="btn bg-orange" type="submit">Search</button>
          </div>
        </form>
      </div>
    </div>

    {{-- Isi content --}}
    <h1>Tolong isi content Home!!</h1>

    {{-- Pagination --}}
    <div class="d-flex justify-content-end">
      {{ $posts->links() }}
    </div>
  </div>
@endsection