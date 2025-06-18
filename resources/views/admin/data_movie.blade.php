@extends('layouts.template')

@section('title', 'Data Movie')

@section('content')
  <div class="container">
    <h1 class="mb-4 fw-bold text-dark">Daftar Movie</h1>

    <div class="table-responsive">
      <table class="table table-hover align-middle shadow-sm rounded">
        <thead class="table-primary text-center">
          <tr>
            <th>No</th>
            <th>Cover</th>
            <th>Title</th>
            <th>Category</th>
            <th>Actors</th>
            <th>Year</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($movies as $index => $movie)
            <tr>
              <td class="text-center">{{ $index + 1 }}</td>

              <td>
                @if($movie->cover_image)
                  <img src="{{ asset($movie->cover_image) }}" alt="{{ $movie->title }}"
                    class="img-thumbnail rounded" style="width: 60px; height: auto;">
                @else
                  <span class="text-muted">No image</span>
                @endif
              </td>

              <td class="fw-semibold">{{ $movie->title }}</td>

              <td>
                @if($movie->category)
                  <span class="badge bg-info text-dark">{{ $movie->category->category_name }}</span>
                @else
                  <span class="text-muted">-</span>
                @endif
              </td>

              <td>
                <span title="{{ $movie->actors }}" style="display: inline-block; max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                  {{ $movie->actors }}
                </span>
              </td>

              <td class="text-center">{{ $movie->year }}</td>

              <td class="text-nowrap">
                @if (auth()->user()->role === 'admin')
                <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                @endif
                @can('delete-movie')
                <form action="{{ url('/movie/' . $movie->id) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger mb-1">Delete</button>
                </form>
                @endcan
                <a href="{{ route('detail', $movie->id) }}" class="btn btn-sm btn-info mb-1 text-white">Detail</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center text-muted py-4">Tidak ada data movie.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      {{ $movies->links() }}
    </div>
  </div>
@endsection
