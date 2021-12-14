@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">All Brands</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<a href="/dashboard/brands/create" class="btn btn-primary mb-3">Create new brand</a>
<div class="table-responsive col-lg-3">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Brand</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($brands as $brand)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $brand->name }}</td>
        <td>
          @if ($brand->image)
            <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" class="img-fluid brands-img" style="max-height: 100px">
          @else
            <img src="https://source.unsplash.com/1600x900?{{ $brand->name }}" class="img-fluid brands-img" style="max-height: 100px" alt="{{ $brand->name }}">
          @endif
        </td>
        <td>
            <a href="/dashboard/brands/{{ $brand->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/brands/{{ $brand->slug }}" method="post" class="d-inline">
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
{{ $brands->links() }}
@endsection