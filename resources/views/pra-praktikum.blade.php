<x-base-layout title="Pra Praktikum">
  @push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/pra-praktikum.css') }}" />
  @endpush

  <!--content-->
  <div class="title">Kebutuhan Praktikum {{ $kebutuhan_praktikum->praktikum->nama_praktikum }}</div>

  <!-- Tata Tertib Praktikum -->
  <div class="section">
    <div class="section-title">Tata Tertib Praktikum</div>
    <ul>
      <li>1. Peserta praktikum wajib hadir 10 menit sebelum praktikum dimulai.</li>
      <li>2. Menggunakan pakaian praktikum dan sepatu tertutup.</li>
      <li>3. Membawa modul dan peralatan yang dibutuhkan.</li>
      <li>4. Dilarang menggunakan ponsel selama praktikum berlangsung.</li>
      <li>5. Menjaga kebersihan dan kerapian laboratorium.</li>
      <li>6. Melaksanakan instruksi asisten laboratorium dengan tertib.</li>
      <li>7. Melaporkan setiap kerusakan alat kepada asisten laboratorium.</li>
    </ul>
  </div>

  <div class="section">
    <div class="section-title">Lembar Asistensi</div>
    <iframe src="{{ Storage::url($kebutuhan_praktikum->lembar_asistensi) }}#toolbar=1"></iframe>
    <div class="download-link">
      <a href="{{ Storage::url($kebutuhan_praktikum->lembar_asistensi) }}" download>Unduh di sini</a>
    </div>
  </div>

  <div class="section">
    <div class="section-title">Lembar Tugas Pendahuluan</div>
    <iframe src="{{ Storage::url($kebutuhan_praktikum->lembar_tp) }}#toolbar=1"></iframe>
    <div class="download-link">
      <a href="{{ Storage::url($kebutuhan_praktikum->lembar_tp) }}" download>Unduh di sini</a>
    </div>
  </div>

  <div class="section">
    <div class="section-title">Format Margin</div>
    <iframe src="{{ Storage::url($kebutuhan_praktikum->format_margin) }}#toolbar=1"></iframe>
    <div class="download-link">
      <a href="{{ Storage::url($kebutuhan_praktikum->format_margin) }}" download>Unduh di sini</a>
    </div>
  </div>

  <div class="section">
    <div class="section-title">Format Laprak</div>
    <iframe src="{{ Storage::url($kebutuhan_praktikum->format_laprak) }}#toolbar=1"></iframe>
    <div class="download-link">
      <a href="{{ Storage::url($kebutuhan_praktikum->format_laprak) }}" download>Unduh di sini</a>
    </div>
  </div>

  <div class="section">
    <div class="section-title">Format Absen</div>
    <iframe src="{{ Storage::url($kebutuhan_praktikum->format_absen) }}#toolbar=1"></iframe>
    <div class="download-link">
      <a href="{{ Storage::url($kebutuhan_praktikum->format_absen) }}" download>Unduh di sini</a>
    </div>
  </div>
</x-base-layout>
