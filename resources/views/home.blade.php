@extends('layouts.app')

@section('content')
<h2 class="mb-4">Daftar Film Terbaru</h2>
<div class="row">
    @foreach ($movies as $movie)
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $movie->cover_image }}" class="img-fluid rounded-start" alt="{{ $movie->title }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text">{{ Str::limit($movie->synopsis, 100) }}</p>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div>
        {{ $movies->links() }}
    </div>
</div>
@endsection
