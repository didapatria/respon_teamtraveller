@extends('layouts.main')

@section('container')
<section>
  <div class="container mt-3">
    <h1>Brands Smartphone</h1>
    
    <div class="row">
      @if ($brands->count())
        <div class="col-md-8 mb-3">
          <a href="/?brand={{ $brands[0]->slug }}">
            <div class="card bg-dark text-white">
              @if ($brands[0]->image)
                <img src="{{ asset('storage/' . $brands[0]->image) }}" alt="{{ $brands[0]->name }}" class="card-img brands-img">
              @else
                <img src="https://source.unsplash.com/1600x900?{{ $brands[0]->name }}" class="card-img brands-img" alt="{{ $brands[0]->name }}">
              @endif
              <div class="card-img-overlay d-flex align-items-end p-0">
                <h5 class="card-title text-center flex-fill p-2 fs-3" style="background-color: rgba(247, 148, 29, 0.7)">{{ $brands[0]->name }}</h5>
              </div>
            </div>
          </a>
        </div>
      @endif

      @foreach ($brands->skip(1) as $brand)
        <div class="col-md-4 mb-3">
          <a href="/?brand={{ $brand->slug }}">
            <div class="card bg-dark text-white">
              @if ($brand->image)
                <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" class="card-img brands-img">
              @else
                <img src="https://source.unsplash.com/1600x900?{{ $brand->name }}" class="card-img brands-img" alt="{{ $brand->name }}">
              @endif
              <div class="card-img-overlay d-flex align-items-end p-0">
                <h5 class="card-title text-center flex-fill p-2 fs-3" style="background-color: rgba(247, 148, 29, 0.7)">{{ $brand->name }}</h5>
              </div>
            </div>
          </a>
        </div>
      @endforeach

    </div>
  </div>
</section>
@endsection