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
            <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
            <button class="btn bg-orange" type="submit">Search</button>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <h2 class="mb-5 pb-2 border-bottom">Latest Post Review Smartphone</h2>
      @if ($posts->count())
        <div class="col-md-12 col-lg-6 mb-4">
          <div class="card bg-orange rounded-5">
            <div class="row">
              <div class="col-md-7">
                @if ($posts[0]->image)
                  <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top posts-img rounded-5" alt="{{ $posts[0]->name }}">
                @endif
              </div>
              <div class="col-md-5">
                <div class="card-body h-100 d-flex align-content-center flex-wrap">
                  <h4 class="card-title col-md-12">{{ $posts[0]->title }}</h4>
                  <a href="/?brand={{ $posts[0]->brand->slug }}" class="text-decoration-none"><h5 class="card-subtitle mb-3 text-light col-md-12">{{ $posts[0]->brand->name }}</h5></a>
                  <p class="card-text mb-1 col-md-12"><small><span data-feather="calendar"></span> Released {{ $posts[0]->status }}</small></p>
                  <p class="card-text mb-1 col-md-12"><small><span data-feather="smartphone"></span> {{ $posts[0]->weight }}</small></p>
                  <p class="card-text mb-1 col-md-12"><small><span data-feather="code"></span> {{ $posts[0]->os }}</small></p>
                  <p class="card-text mb-1 col-md-12"><small><span data-feather="cpu"></span> {{ $posts[0]->internal }}</small></p>
                  <a href="/detail/{{ $posts[0]->slug }}" class="btn bg-respon text-light mt-3">Detail Specification Smartphone</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        @foreach ($posts->slice(1, 4) as $post)
          <div class="col-md-6 col-lg-3 mb-4">
            <div class="card rounded-5">
              @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top post-img rounded-5" alt="{{ $post->name }}">
              @endif
              <div class="card-body">
                <h4 class="card-title text-orange">{{ $post->title }}</h4>
                <a href="/?brand={{ $post->brand->slug }}" class="text-decoration-none"><h5 class="card-subtitle mb-3 text-respon">{{ $post->brand->name }}</h5></a>
                <a href="/detail/{{ $post->slug }}" class="btn bg-orange">Detail Specification Smartphone</a>
              </div>
            </div>
          </div>
        @endforeach

        @if ($posts[5] !== null)
          <div class="col-md-12 col-lg-6 mb-4">
            <div class="card bg-respon rounded-5">
              <div class="row text-orange">
                <div class="col-md-7">
                  @if ($posts[5]->image)
                    <img src="{{ asset('storage/' . $posts[5]->image) }}" class="card-img-top posts-img rounded-5" alt="{{ $posts[5]->name }}">
                  @endif
                </div>
                <div class="col-md-5">
                  <div class="card-body h-100 d-flex align-content-center flex-wrap">
                    <h4 class="card-title col-md-12">{{ $posts[5]->title }}</h4>
                    <a href="/?brand={{ $posts[5]->brand->slug }}" class="text-decoration-none"><h5 class="card-subtitle mb-3 text-light col-md-12">{{ $posts[5]->brand->name }}</h5></a>
                    <p class="card-text mb-1 col-md-12"><small><span data-feather="calendar"></span> Released {{ $posts[5]->status }}</small></p>
                    <p class="card-text mb-1 col-md-12"><small><span data-feather="smartphone"></span> {{ $posts[5]->weight }}</small></p>
                    <p class="card-text mb-1 col-md-12"><small><span data-feather="code"></span> {{ $posts[5]->os }}</small></p>
                    <p class="card-text mb-1 col-md-12"><small><span data-feather="cpu"></span> {{ $posts[5]->internal }}</small></p>
                    <a href="/detail/{{ $posts[5]->slug }}" class="btn bg-orange text-light mt-3">Detail Specification Smartphone</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif
        
    </div>
      @else
        <p class="text-center fs-4">No post found.</p>
      @endif


    {{-- Pagination --}}
    <div class="d-flex justify-content-end">
      {{ $posts->links() }}
    </div>

  </div>
    
  <div class="b-example-divider"></div>

  <div class="bg-orange">
    <div class="container py-5">
      <h2 class="mb-5 pb-2 border-bottom">Popular Brand</h2>
      <div class="row row-cols-2 row-cols-lg-6 g-2 g-lg-3">
        @foreach ($brands as $brand)
          <div class="col mb-1">
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
      <div class="d-flex justify-content-end pb-4 mt-3">
        {{ $brands->links() }}
      </div>
    </div>
  </div>

  <div class="b-example-divider"></div>

  <div class="bg-respon">
    <div class="container py-5" id="custom-cards">
      <h2 class="pb-2 border-bottom text-light">Custom cards</h2>

      <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <div class="col">
          <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('/assets/img/unsplash/unsplash-photo-1.jpg');">
            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
              <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Short title, long jacket</h2>
              <ul class="d-flex list-unstyled mt-auto">
                <li class="me-auto">
                  <img src="/assets/img/respon-logo.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                </li>
                <li class="d-flex align-items-center me-3">
                  <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"/></svg>
                  <small>Earth</small>
                </li>
                <li class="d-flex align-items-center">
                  <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
                  <small>3d</small>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('/assets/img/unsplash/unsplash-photo-2.jpg');">
            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
              <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Much longer title that wraps to multiple lines</h2>
              <ul class="d-flex list-unstyled mt-auto">
                <li class="me-auto">
                  <img src="/assets/img/respon-logo.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                </li>
                <li class="d-flex align-items-center me-3">
                  <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"/></svg>
                  <small>Pakistan</small>
                </li>
                <li class="d-flex align-items-center">
                  <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
                  <small>4d</small>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('/assets/img/unsplash/unsplash-photo-3.jpg');">
            <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
              <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Another longer title belongs here</h2>
              <ul class="d-flex list-unstyled mt-auto">
                <li class="me-auto">
                  <img src="/assets/img/respon-logo.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                </li>
                <li class="d-flex align-items-center me-3">
                  <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"/></svg>
                  <small>California</small>
                </li>
                <li class="d-flex align-items-center">
                  <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
                  <small>5d</small>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="b-example-divider"></div>

  <div class="container py-5" id="custom-cards">
    <h2 class="pb-2 border-bottom te">Concept Logo</h2>
    <div class="row d-flex justify-content-center g-4 pt-5">
      <div class="col-md-8">
        <div class="card border-0" style="background-color: transparent">
          <img src="/assets/img/respon-logo.png" alt="respon-logo" class="card-img w-50 align-self-center">
          <h2 class="fw-bold text-center text-white text-shadow-1 mt-4">Respon</h2>
          <p class="text-center text-shadow-1 text-white">(Review Smartphone)</small></p>
        </div>
      </div>
    </div>
    <div class="row row-cols-3 row-cols-lg-6 g-4 g-lg-4 d-flex justify-content-around" style="margin-top: -220px">
      <div class="col d-flex align-content-end flex-wrap text-center">
        <div class="card border-0" style="background-color: transparent;">
          <img src="/assets/img/response.png" alt="response" class="card-img">
          <h2 class="fw-bold text-center text-white text-shadow-1 mt-4">Bubble Chat</h2>
          <p class="text-center text-shadow-1 text-white">(Response)</small></p>
        </div>
      </div>
      <div class="col d-flex align-content-end flex-wrap text-center">
        <div class="card border-0" style="background-color: transparent;">
          <img src="/assets/img/review.png" alt="review" class="card-img">
          <h2 class="fw-bold text-center text-white text-shadow-1 mt-4">5 Star</h2>
          <p class="text-center text-shadow-1 text-white">(Review)</p>
        </div>
      </div>
      <div class="col d-flex align-content-end flex-wrap text-center">
        <div class="card border-0" style="background-color: transparent;">
          <img src="/assets/img/smartphone.png" alt="smartphone" class="card-img">
          <h2 class="fw-bold text-center text-white text-shadow-1 mt-4">iPhone</h2>
          <p class="text-center text-shadow-1 text-white">(Smartphone)</small></p>
        </div>
      </div>
    </div>
  </div>
@endsection