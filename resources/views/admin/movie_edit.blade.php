@extends('layouts.template')

@section('title', 'Edit Movie')

@section('content')
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold"><i class="bi bi-pencil-square"></i> Edit Movie</h2>
    <a href="{{ route('dataMovie') }}" class="btn btn-outline-primary">
      <i class="bi bi-arrow-left"></i> Kembali ke Data Movie
    </a>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div class="mb-3">
          <label for="title" class="form-label">Judul Film</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
            value="{{ old('title', $movie->title) }}" required>
          <div class="invalid-feedback">Judul film wajib diisi.</div>
        </div>

        {{-- Synopsis --}}
        <div class="mb-3">
          <label for="synopsis" class="form-label">Sinopsis</label>
          <textarea class="form-control" id="synopsis" name="synopsis" rows="5" required>{{ old('synopsis', $movie->synopsis) }}</textarea>
        </div>

        {{-- Category --}}
        <div class="mb-3">
          <label for="category_id" class="form-label">Kategori</label>
          <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
            <option value="" disabled>-- Pilih Kategori --</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ $movie->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->category_name }}
              </option>
            @endforeach
          </select>
          <div class="invalid-feedback">Silakan pilih kategori film.</div>
        </div>

        {{-- Year --}}
        <div class="mb-3">
          <label for="year" class="form-label">Tahun Rilis</label>
          <select class="form-select" id="year" name="year" required>
            <option value="" disabled>-- Pilih Tahun --</option>
            @php
              $currentYear = date('Y');
              for ($year = $currentYear; $year >= 1990; $year--) {
                  $selected = $movie->year == $year ? 'selected' : '';
                  echo "<option value=\"$year\" $selected>$year</option>";
              }
            @endphp
          </select>
        </div>

        {{-- Actors --}}
        <div class="mb-3">
          <label for="actors" class="form-label">Pemeran</label>
          <input type="text" class="form-control" id="actors" name="actors" value="{{ old('actors', $movie->actors) }}" required>
        </div>

        {{-- Cover Image --}}
        <div class="mb-3">
          <label for="cover_image" class="form-label">Cover Image</label>
          <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" accept="image/*">
          @error('cover_image')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror

          @if ($movie->cover_image)
            <div class="mt-3">
              <p class="mb-1">Cover Lama:</p>
              <img src="{{ asset($movie->cover_image) }}" alt="{{ $movie->title }}" width="120" class="img-thumbnail">
            </div>
          @endif
          <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>

        {{-- Submit Button --}}
        <div class="text-end">
          <button type="submit" class="btn btn-success px-4">
            <i class="bi bi-save"></i> Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  (() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>
@endpush
