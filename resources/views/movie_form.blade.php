@extends('layouts.template')

@section('title', 'Form input movie')

@section('content')
  <div class="container mt-4">
    <div class="card shadow rounded">
      <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Form Data Movie</h4>
      </div>
      <div class="card-body">

        <div class="mb-3">
          <a href="{{ route('dataMovie') }}" class="btn btn-outline-primary">Data Movie</a>
        </div>

        <form action="/movie/store" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
          @csrf

          {{-- Title --}}
          <div class="mb-3 row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required>
              <div class="invalid-feedback">Title wajib diisi.</div>
            </div>
          </div>

          {{-- Synopsis --}}
          <div class="mb-3 row">
            <label for="synopsis" class="col-sm-2 col-form-label">Synopsis</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="synopsis" name="synopsis" rows="5" required></textarea>
              <div class="invalid-feedback">Synopsis wajib diisi.</div>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="category_id" class="col-sm-2 col-form-label">category</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="category_id" name="category_id" required>
              <div class="invalid-feedback">Title wajib diisi.</div>
            </div>
          </div>

          {{-- Category --}}
          {{-- <div class="mb-3 row">
            <label for="category_id" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
              <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                <option value="" selected disabled>-- Pilih Category --</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
              </select>
              <div class="invalid-feedback">Silakan pilih kategori film.</div>
            </div>
          </div> --}}

          {{-- Year --}}
          <div class="mb-3 row">
            <label for="year" class="col-sm-2 col-form-label">Year</label>
            <div class="col-sm-10">
              <select class="form-select" id="year" name="year" required>
                <option value="" disabled selected>Pilih Tahun</option>
                @php
                  $currentYear = date('Y');
                  for ($year = $currentYear; $year >= 1990; $year--) {
                    echo "<option value=\"$year\">$year</option>";
                  }
                @endphp
              </select>
              <div class="invalid-feedback">Tahun wajib dipilih.</div>
            </div>
          </div>

          {{-- Actors --}}
          <div class="mb-3 row">
            <label for="actors" class="col-sm-2 col-form-label">Actors</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="actors" name="actors" placeholder="Contoh: Tom Holland, Zendaya" required>
              <div class="invalid-feedback">Nama aktor wajib diisi.</div>
            </div>
          </div>

          {{-- Cover Image --}}
          <div class="mb-3 row">
            <label for="cover_image" class="col-sm-2 col-form-label">Cover Image</label>
            <div class="col-sm-10">
              <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" accept="image/*" required>
              @error('cover_image')
                <div class="invalid-feedback">{{ $message }}</div>
              @else
                <div class="invalid-feedback">Gambar wajib dipilih.</div>
              @enderror
            </div>
          </div>

          {{-- Submit --}}
          <div class="mb-3 row">
            <div class="col-sm-10 offset-sm-2">
              <button type="submit" class="btn btn-success">Simpan Movie</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  (() => {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  })();
</script>
@endpush
