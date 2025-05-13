@extends('layouts.app')

@section('content')
<h2 class="mb-4">Daftar Film Terbaru</h2>
<div class="row">
    @foreach ($movies as $movie)
    <div class="col-md-3 mb-4">
        <div class="card h-100">
            <img src="{{ $movie->cover_image }}" class="card-img-top" alt="{{ $movie->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $movie->title }}</h5>
                <p class="card-text">{{ Str::limit($movie->synopsis, 70) }}</p>
                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
