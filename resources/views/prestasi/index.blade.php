<x-base-layout title="Prestasi">
  @push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/prestasi.css') }}" />
  @endpush

  <!-- Main Content -->
  <section class="prestasi-section">
    <h2 class="section-title">Daftar Prestasi</h2>
    <div class="slider-container">
      <button class="nav-btn left" onclick="slideLeft()">&#10094;</button>

      <div class="card-wrapper" id="prestasiWrapper">
        @foreach ($daftar_prestasi as $prestasi)
          <a href="{{ route('prestasi.show', $prestasi->slug) }}" class="prestasi-card-link">
            <img class="prestasi-img" src="{{ Storage::url($prestasi->gambar_prestasi) }}" alt="Gambar Prestasi">
            <div class="prestasi-info">
              <h3>{{ $prestasi->judul_prestasi }}</h3>
              <p class="tahun">Tahun: {{ \Carbon\Carbon::parse($prestasi->tanggal_prestasi)->year }}</p>
              <p>{!! Str::limit($prestasi->deskripsi_prestasi, 90) !!}</p>
            </div>
          </a>
        @endforeach
      </div>

      <button class="nav-btn right" onclick="slideRight()">&#10095;</button>
    </div>
  </section>

  @push('after-scripts')
    <script src="{{ asset('js/prestasi.js') }}"></script>
  @endpush
</x-base-layout>
