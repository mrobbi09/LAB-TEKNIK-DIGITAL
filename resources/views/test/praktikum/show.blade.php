@extends('layouts.test')

@section('content')
  <div class="container">
    <h2 class="mb-2">Praktikum {{ $praktikum->nama_praktikum }}</h2>
    <a href="{{ route('praktikum.index') }}" class="btn btn-primary mb-3">Kembali</a>
    @foreach ($kebutuhanPraktikum as $kebutuhan)
      <div class="d-flex justify-content-between align-items-center bg-dark text-white rounded p-3 mb-3 shadow">
        <div class="d-flex align-items-center gap-3">
          <!-- Download Icon (Bootstrap compatible SVG) -->
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
            <path d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2"></path>
            <polyline points="7 10 12 15 17 10"></polyline>
            <line x1="12" y1="15" x2="12" y2="4"></line>
          </svg>

          <!-- File name -->
          <a href="{{ Storage::url($kebutuhan) }}" target="_blank" class="text-white text-decoration-none small">
            {{ basename($kebutuhan) }}
          </a>
        </div>

        <!-- File size (optional) -->
        {{-- <small class="text-muted">705 KB</small> --}}
      </div>
    @endforeach
  </div>
@endsection
