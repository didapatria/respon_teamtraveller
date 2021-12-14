@extends('dashboard.layouts.main')
@section('container')
<div class="card my-3" style="max-width: 100vh;">
  <div class="card-header bg-orange text-light"><h4><b>{{ $post->brand->name }} {{ $post->title }}</b></h4></div>
    <div class="row g-0">
      <div class="col-md-3">
        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded-start m-1" alt="{{ $post->brand->name }}">
      </div>
      <div class="col-md-9 card-detail">
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
              <h1 class="card-title mb-1"><b>{{ $post->photo }}<span class="h3" style="font-weight: 800;">MP</span></b></h1>
              <p class="card-text mb-1">{{ $post->video }}p</p>
            </div>
          </div>
          {{--  --}}
          <div class="col-md-4 space my-2">
            <div class="card-body">
              <span data-feather="cpu"></span>
              <h1 class="card-title mb-1"><b>{{ $post->ram }}<span class="h3" style="font-weight: 800;">GB RAM</span></b></h1>
              <p class="card-text mb-1">{{ $post->chipset }}</p>
            </div>
          </div>
          {{--  --}}
          <div class="col-md-4 space my-2">
            <div class="card-body">
              <span data-feather="battery"></span>
              <h1 class="card-title mb-1"><b>{{ $post->capacity }}<span class="h3" style="font-weight: 800;">mAh</span></b></h1>
              <p class="card-text mb-1">{{ $post->technology }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="card-footer bg-orange">
    <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all posts</a>
    <a href="
    {{-- /dashboard/posts/{{ $posts->slug }}/edit --}}
    " class="btn btn-warning text-light"><span data-feather="edit"></span> Edit</a>
    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
      @method('delete')
      @csrf
      <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="delete"></span> Delete</button>
    </form>
  </div>
</div>
@endsection