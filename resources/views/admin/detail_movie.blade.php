@extends('layouts.template')

@section('title', 'Detail Movie')

@section('content')
  <style>
    body {
      background: linear-gradient(to right, #010301, #0451eb, #010301);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .movie-detail-card {
      max-width: 700px;
      margin: 0 auto;
      background: #f1f8f4;
      border: 2px solid #140076;
      border-radius: 16px;
      box-shadow: 0 6px 12px rgba(76, 175, 80, 0.25);
      padding: 30px;
      background-image: url('https://www.transparenttextures.com/patterns/leaf.png');
      background-repeat: repeat;
    }

    .movie-image {
      width: 140px;
      height: auto;
      object-fit: cover;
      border-radius: 12px;
      box-shadow: 0 4px 12px #023c9b;
    }

    .movie-title {
      color: #000;
      font-weight: bold;
    }

    .movie-info p {
      margin: 8px 0;
      font-size: 1.05rem;
      color: #000;
    }

    .movie-info strong {
      color: #000;
    }

    .movie-synopsis {
      margin-top: 20px;
    }

    .movie-synopsis h5 {
      color: #000;
      font-weight: 600;
    }

    .btn-back {
      background-color: #023c9b;
      border-color: #000;
      font-weight: bold;
    }

    .btn-back:hover {
      background-color: #0062ff;
      border-color: #2e7d32;
    }

    hr {
      border-top: 2px solid #a5d6a7;
      margin: 20px 0;
    }
  </style>

  @if ($movie)
    <h1 class="text-center mb-4 movie-title">Detail Movie</h1>

    <div class="movie-detail-card">
      <div class="text-center mb-3">
        <img src="{{ asset($movie->cover_image) }}" alt="{{ $movie->title }}" class="movie-image">
      </div>

      <div class="text-center">
        <h2 class="movie-title">{{ $movie->title }}</h2>
      </div>

      <div class="movie-info text-center mt-3">
        <p><strong>Category:</strong>
          @if($movie->category)
            <span class="badge bg-success">{{ $movie->category->category_name }}</span>
          @else
            <span class="text-muted">-</span>
          @endif
        </p>
        <p><strong>Actors:</strong> {{ $movie->actors }}</p>
        <p><strong>Year:</strong> {{ $movie->year }}</p>
      </div>

      <hr>

      <div class="movie-synopsis">
        <h5>Synopsis</h5>
        <p>{{ $movie->synopsis ?: 'No synopsis available.' }}</p>
      </div>

      <div class="text-center mt-4">
        <a href="{{ route('dataMovie') }}" class="btn btn-back">← Kembali</a>
      </div>
    </div>
  @else
    <div class="alert alert-warning text-center" role="alert">
      Data movie tidak ditemukan.
    </div>
    <div class="text-center">
      <a href="{{ route('dataMovie') }}" class="btn btn-danger">← Kembali</a>
    </div>
  @endif
@endsection
