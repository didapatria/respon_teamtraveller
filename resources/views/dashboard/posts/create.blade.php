@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="col-md-8">
  <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="mb-3 col-md-6">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
        @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="brands" class="form-label">Brands Smartphone</label>
        <select class="form-select" name="brand_id">
          <option value="{{ old('brands') }}" selected>Choose: -- Brands --</option>
          <option value="{{ old('brands') }}">Apple</option>
          {{-- @foreach ($brands as $brand)
            @if (old('brand_id') == $brand->id)
              <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
            @else
              <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endif
          @endforeach --}}
        </select>
      </div>
      <div class="mb-3 col-md-6">
        <label for="image" class="form-label">Smartphone Image</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
        @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="status" class="form-label">Launch Status</label>
        <input type="date" class="form-control @error('status') is-invalid @enderror" id="status" name="status" required value="{{ old('status') }}">
        @error('status')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="weight" class="form-label">Body Weight</label>
        <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" required value="{{ old('weight') }}">
        @error('weight')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="os" class="form-label">Platform OS</label>
        <input type="text" class="form-control @error('os') is-invalid @enderror" id="os" name="os" required value="{{ old('os') }}">
        @error('os')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="internal" class="form-label">Memory Internal</label>
        <input type="text" class="form-control @error('internal') is-invalid @enderror" id="internal" name="internal" required value="{{ old('internal') }}">
        @error('internal')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="size" class="form-label">Display Size</label>
        <input type="number" step=".1" class="form-control @error('size') is-invalid @enderror" id="size" name="size" required value="{{ old('size') }}">
        @error('size')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="resolution" class="form-label">Display Resolution</label>
        <input type="text" class="form-control @error('resolution') is-invalid @enderror" id="resolution" name="resolution" required value="{{ old('resolution') }}">
        @error('resolution')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="photo" class="form-label">Camera Photo</label>
        <input type="number" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" required value="{{ old('photo') }}">
        @error('photo')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="video" class="form-label">Camera Video</label>
        <input type="number" class="form-control @error('video') is-invalid @enderror" id="video" name="video" required value="{{ old('video') }}">
        @error('video')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="ram" class="form-label">RAM</label>
        <input type="text" class="form-control @error('ram') is-invalid @enderror" id="ram" name="ram" required value="{{ old('ram') }}">
        @error('ram')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="chipset" class="form-label">Chipset</label>
        <input type="text" class="form-control @error('chipset') is-invalid @enderror" id="chipset" name="chipset" required value="{{ old('chipset') }}">
        @error('chipset')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="capacity" class="form-label">Battery Capacity</label>
        <input type="number" class="form-control @error('capacity') is-invalid @enderror" id="capacity" name="capacity" required value="{{ old('capacity') }}">
        @error('capacity')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="technology" class="form-label">Battery Technology</label>
        <select class="form-select" name="technology">
          <option value="{{ old('capacity') }}" selected>Choose: -- Battery --</option>
          <option value="{{ old('capacity') }}">Li-Ion</option>
          <option value="{{ old('capacity') }}">Li-Po</option>
          <option value="{{ old('capacity') }}">Li-Fe</option>
          <option value="{{ old('capacity') }}">NiCd</option>
          <option value="{{ old('capacity') }}">NiMh</option>
        </select>
      </div>
      {{-- <div class="mb-3 col-md-6">
        <label for="body" class="form-label">Body</label>
        @error('body')
          <p class="text-danger">{{ $message }}</p>
        @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>         
      </div> --}}
    </div>
      
      
      <button type="submit" class="btn btn-primary mt-3">Create Post</button>
    </form>
  
</div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  })

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
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