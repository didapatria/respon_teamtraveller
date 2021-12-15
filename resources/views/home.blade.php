@extends('layouts.main')

@section('container')
  <img src="/assets/img/cover.png" alt="cover" class="cover w-100">

  <div class="container my-4">

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

    <div class="row mb-4">
      <h1 class="mb-4">Latest Post Review Smartphone</h1>
      @if ($posts->count())
      <div class="col-md-6 mb-3">
        <div class="card bg-orange">
          <div class="row">
            <div class="col-md-7">
              @if ($posts[0]->image)
                <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top posts-img" alt="{{ $posts[0]->name }}">
              @endif
            </div>
            <div class="col-md-5">
              <div class="card-body h-100 d-flex align-content-center flex-wrap">
                <h4 class="card-title">{{ $posts[0]->title }}</h4>
                <h5 class="card-subtitle mb-3 text-light">{{ $posts[0]->brand->name }}</h5>
                <p class="card-text mb-1"><small><span data-feather="calendar"></span> Released {{ $posts[0]->status }}</small></p>
                <p class="card-text mb-1"><small><span data-feather="smartphone"></span> {{ $posts[0]->weight }}</small></p>
                <p class="card-text mb-1"><small><span data-feather="code"></span> {{ $posts[0]->os }}</small></p>
                <p class="card-text mb-1"><small><span data-feather="cpu"></span> {{ $posts[0]->internal }}</small></p>
                <a href="/detail/{{ $posts[0]->slug }}" class="btn bg-respon text-light mt-3">Detail Specification Smartphone</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif

      @foreach ($posts->skip(1) as $post)
        <div class="col-md-3 mb-3">
          <div class="card">
            @if ($post->image)
              <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top post-img" alt="{{ $post->name }}">
            @endif
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <a href="/detail/{{ $post->slug }}" class="btn bg-orange">Detail Specification Smartphone</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-end">
      {{ $posts->links() }}
    </div>

  </div>
    
    <div class="bg-orange">
      <div class="container">
        <div class="row">
          <h1 class="my-4">Popular Prand</h1>
          @foreach ($brands as $brand)
            <div class="col-md-2 mb-3">
              <a href="/?brand={{ $brand->slug }}">
                <div class="card bg-dark text-white">
                  @if ($brand->image)
                    <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" class="card-img brand-img ratio">
                  @else
                    <img src="https://source.unsplash.com/1600x900?{{ $brand->name }}" class="card-img brand-img ratio" alt="{{ $brand->name }}">
                  @endif
                  <div class="card-img-overlay d-flex align-items-end p-0">
                    <h5 class="card-title text-center flex-fill p-2 fs-3" style="background-color: rgba(30, 30, 30, 0.7)">{{ $brand->name }}</h5>
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        </div>
        {{-- Pagination --}}
        <div class="d-flex justify-content-end pb-4">
          {{ $brands->links() }}
        </div>
      </div>
    </div>
@endsection