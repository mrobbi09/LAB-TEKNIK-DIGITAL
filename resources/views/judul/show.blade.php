<x-base-layout title="Judul Praktikum">
  @push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/judul.css') }}" />
  @endpush

  <div class="title">{{ $judul->nama_judul }}</div>

  <div class="section">
    <div class="section-title">Modul</div>
    <iframe src="{{ Storage::url($judul->modul) }}#toolbar=1"></iframe>
    <div class="download-link">
      <a href="{{ Storage::url($judul->modul) }}" download>Unduh di sini</a>
    </div>
  </div>

  @if ($tugas_pendahuluan)
    <div class="section">
      <div class="section-title">Tugas Pendahuluan</div>
      <iframe src="{{ Storage::url($tugas_pendahuluan->soal_tp) }}#toolbar=1"></iframe>
      <div class="download-link">
        <a href="{{ Storage::url($tugas_pendahuluan->soal_tp) }}" download>Unduh di sini</a>
      </div>
    </div>
  @endif

  @if ($tugas_akhir)
    <div class="section">
      <div class="section-title">Tugas Akhir</div>
      <iframe src="{{ Storage::url($tugas_akhir->soal_ta) }}#toolbar=1"></iframe>
      <div class="download-link">
        <a href="{{ Storage::url($tugas_akhir->soal_ta) }}" download>Unduh di sini</a>
      </div>
    </div>
  @endif

  @push('after-scripts')
    <script src="{{ asset('js/ListPraktikum.js') }}"></script>
  @endpush
</x-base-layout>
