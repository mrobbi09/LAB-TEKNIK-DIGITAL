<x-base-layout title="Galeri">
  @push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/galeri.css') }}" />
  @endpush

  <div class="container">
    <div class="slide">
      @foreach ($daftar_galeri as $galeri)
        <div class="item" style="background-image: url({{ Storage::url($galeri->url_gambar) }});">
          <div class="content">
            <div class="name">{{ $galeri->judul }}</div>
            <div class="des">{{ $galeri->deskripsi }}</div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="button">
      <button class="prev"><i class="fa-solid fa-arrow-left"></i></button>
      <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
    </div>

  </div>

  @foreach ($daftar_praktikum as $praktikum)
    <div class="section">
      <h2>{{ $praktikum->nama_praktikum }}</h2>
      <div class="gallery-row">
        @foreach ($praktikum->galeri as $galeri)
          <img src="{{ Storage::url($galeri->url_gambar) }}" alt="{{ $galeri->judul }}">
        @endforeach
      </div>
    </div>
  @endforeach
</x-base-layout>
