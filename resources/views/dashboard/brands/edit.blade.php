@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Brand</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="row">
  <div class="col-md-6">
    <form method="post" action="/dashboard/brands/{{ $brand->slug }}" class="mb-5" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="row">
        <div class="mb-3 col-md-12">
          <label for="name" class="form-label">Brand Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $brand->name) }}">
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3 col-md-12">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $brand->slug) }}" disabled readonly>
          @error('slug')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3 col-md-12">
          <label for="image" class="form-label">Brand Image</label>
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>     

      <button type="submit" class="btn btn-primary mt-3">Update Brand</button>
    </form>
  </div>
  <div class="col-md-6 mt-4">
    <input type="hidden" name="oldImage" value="{{ $brand->image }}">
      @if ($brand->image)
          <img src="{{ asset('storage/' . $brand->image) }}" class="img-preview img-fluid">
      @else
          <img class="img-preview img-fluid">
      @endif
  </div>
</div>

<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function() {
    fetch('/dashboard/brands/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  })

  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection