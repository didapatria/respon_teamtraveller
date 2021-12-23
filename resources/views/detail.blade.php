@extends('layouts.main')

@section('container')
<div class="container">
  <h1 class="my-4">Detail Review Smartphone</h1>
  <div class="card my-3">
    <div class="card-header bg-orange text-light"><h4><b><a href="/?brand={{ $post->brand->slug }}" class="text-decoration-none text-light">{{ $post->brand->name }}</a> {{ $post->title }}</b></h4></div>
      <div class="row g-0">
        <div class="col-md-5 align-self-center">
          <img src="{{ asset('storage/' . $post->image) }}" class="rounded-start mx-1" style="height: 650px" alt="{{ $post->brand->name }}">
        </div>
        <div class="col-md-7 card-detail">
          <div class="row px-3">
            {{--  --}}
            <div class="col-md-8 space my-2">
              <div class="card-body">
                <p class="card-text mb-1"><span data-feather="calendar"></span> Released {{ $post->status }}</p>
                <p class="card-text mb-1"><span data-feather="smartphone"></span> {{ $post->weight }}</p>
                <p class="card-text mb-1"><span data-feather="code"></span> {{ $post->os }}</p>
                <p class="card-text mb-1"><span data-feather="cpu"></span> {{ $post->internal }}</p>
              </div>
            </div>
            {{--  --}}
            <div class="col-md-4 space my-2">
              <div class="card-body">
                <span data-feather="square"></span>
                <h1 class="card-title mb-1"><b>{{ $post->size }}"</b></h1>
                <p class="card-text mb-1">{{ $post->resolution }}</p>
              </div>
            </div>
            {{--  --}}
            <div class="col-md-4 space my-2">
              <div class="card-body">
                <span data-feather="aperture"></span>
                <h1 class="card-title mb-1"><b>{{ $post->photo }}<span class="h5" style="font-weight: 800;">MP</span></b></h1>
                <p class="card-text mb-1">{{ $post->video }}p</p>
              </div>
            </div>
            {{--  --}}
            <div class="col-md-4 space my-2">
              <div class="card-body">
                <span data-feather="cpu"></span>
                <h1 class="card-title mb-1"><b>{{ $post->ram }}<span class="h5" style="font-weight: 800;">GB RAM</span></b></h1>
                <p class="card-text mb-1">{{ $post->chipset }}</p>
              </div>
            </div>
            {{--  --}}
            <div class="col-md-4 space my-2">
              <div class="card-body">
                <span data-feather="battery"></span>
                <h1 class="card-title mb-1"><b>{{ $post->capacity }}<span class="h5" style="font-weight: 800;">mAh</span></b></h1>
                <p class="card-text mb-1">{{ $post->technology }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="card-footer bg-orange">
      <a href="/" class="btn bg-respon text-light"><span data-feather="arrow-left"></span><span data-feather="home"></span></a>
    </div>
  </div>
</div>
@endsection