@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <img src="{{ $movie->cover_image }}" alt="{{ $movie->title }}" class="img-fluid rounded">
    </div>
    <div class="col-md-8">
        <h2>{{ $movie->title }}</h2>
        <p><strong>Kategori:</strong> {{ $movie->category->category_name }}</p>
        <p><strong>Tahun:</strong> {{ $movie->year }}</p>
        <p><strong>Pemeran:</strong> {{ $movie->actors }}</p>
        <p><strong>Sinopsis:</strong><br>{{ $movie->synopsis }}</p>
        <a href="/" class="btn btn-secondary mt-3">← Kembali</a>
    </div>
</div>
@endsection
