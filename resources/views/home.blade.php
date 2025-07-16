<x-base-layout title="Beranda">
  @push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
  @endpush

  <!-- Carousel -->
  <div id="carouselTD" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ Storage::url($daftar_galeri[0]->url_gambar) }}" class="d-block w-100"
          alt="{{ $daftar_galeri[0]->judul }}">
      </div>
      @foreach ($daftar_galeri->skip(1) as $galeri)
        <div class="carousel-item">
          <img src="{{ Storage::url($galeri->url_gambar) }}" class="d-block w-100" alt="{{ $galeri->judul }}">
        </div>
      @endforeach
    </div>
  </div>

  <!-- Tentang Laboratorium -->
  <div class="container">
    <div class="row align-items-center mt-5 g-4">
      <div class="col 4 text-center">
        <img src="{{ asset('image/logo td.png') }}" alt="logo lab_td" height="250px">
        <div class="text-center mt-4">
          <a type="button" class="btn btn-primary" href="open-recruitmen">Daftar Sekarang</a>
        </div>
      </div>
      <div class="col 4">
        Laboratorium Teknik Digital Universitas Lampung merupakan fasilitas praktikum di bawah naungan Jurusan Teknik
        Elektro
        yang berfokus pada pembelajaran dan penerapan sistem digital. Praktikum yang diselenggarakan meliputi Teknik
        Digital,
        Elektronika Digital, dan Embedded System. Di laboratorium ini, mahasiswa dibekali keterampilan mulai dari dasar
        logika
        digital hingga pemrograman mikrokontroler dan sistem tertanam. Didukung dengan berbagai perangkat seperti
        trainer kit,
        sensor, mikrokontroler, serta software simulasi, laboratorium ini menjadi tempat pengembangan kompetensi praktis
        dan
        inovatif dalam menghadapi tantangan teknologi digital masa kini.
      </div>
    </div>

  </div>
  <!-- Tentang Laboratorium end-->

  <!--prestasi-->
  <div class="container my-5">
    <h2>Prestasi</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($daftar_prestasi as $prestasi)
        <div class="col">
          <div class="card h-100">
            <img src="{{ Storage::url($prestasi->gambar_prestasi) }}" class="card-img-top"
              alt="{{ $prestasi->judul_prestasi }}">
            <div class="card-body">
              <a href="{{ route('prestasi.show', $prestasi->slug) }}">
                <h5 class="card-title">{{ $prestasi->judul_prestasi }}</h5>
              </a>
              <p class="card-text">{!! Str::limit($prestasi->deskripsi_prestasi, 90) !!}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="text-center mt-4">
      <a type="button" class="btn btn-outline-primary" href="{{ route('prestasi.index') }}">Selengkapnya</a>
    </div>
  </div>
  <!--Prestasi end-->


  <!-- Galeri -->
  <div class="container my-5">
    <h2>Galeri</h2>
    <div class="d-flex justify-content-between align-items-center mb-2">
    </div>
    <div class="row g-3">
      @foreach ($daftar_galeri as $galeri)
        <div class="col-md-4"><img src="{{ Storage::url($galeri->url_gambar) }}" class="img-fluid" alt="">
        </div>
      @endforeach
    </div>
    <div class="text-center mt-4">
      <a type="button" class="btn btn-outline-primary" href="{{ route('galeri') }}">Selengkapnya</a>
    </div>
  </div>

  <!-- Struktur -->
  <div class="container my-5 struktur">
    <h2 class="text-center mb-4">Structure</h2>
    <div class="d-flex justify-content-center gap-5 mb-4 flex-wrap">
      <div class="text-center">
        <img src="{{ asset('image/pic.jpg') }}" class="struktur-img" alt="">
        <p></p>
        <p><strong>M. Komarudin Unila</strong></p>
        <p>Kepala Lab</p>
      </div>
      <div class="text-center">
        <img src="{{ asset('image/pic.jpg') }}" class="struktur-img" alt="">
        <p></p>
        <p><strong>Aris Untung</strong></p>
        <p>Pranata Lab Pendidikan</p>
      </div>
      <div class="text-center">
        <img src="{{ asset('image/pic.jpg') }}" class="struktur-img" alt="">
        <p></p>
        <p><strong>Handrio</strong></p>
        <p>Koordinator Lab</p>
      </div>
    </div>

    <div class="accordion" id="accordionAsisten">
      <!-- Angkatan 20 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="heading20">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapse20">
            Asisten Lab angkatan 20
          </button>
        </h2>
        <div id="collapse20" class="accordion-collapse collapse" data-bs-parent="#accordionAsisten">
          <div class="accordion-body">
            <ol>
              <li>Aurelina Putri</li>
              <li>Nadhif Ramadhan</li>
              <li>Keira Almeira</li>
              <li>Farrel Dirgantara</li>
              <li>Keira Almeira</li>
              <li>Zhafira Salwa</li>
              <li>Reinaldi Baskoro</li>
              <li>Nayla Zahira</li>
              <li>Daffa Mahendra</li>
              <li>Cintya Anindya</li>
              <li>Alvino Pradipta</li>
              <li>Giselda Amara</li>
              <li>Raka Yudhistira</li>
            </ol>
          </div>
        </div>
      </div>

      <!-- Angkatan 21 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="heading21">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapse21">
            Asisten Lab angkatan 21
          </button>
        </h2>
        <div id="collapse21" class="accordion-collapse collapse" data-bs-parent="#accordionAsisten">
          <div class="accordion-body">
            <ol>
              <li>Aurelina Putri</li>
              <li>Nadhif Ramadhan</li>
              <li>Keira Almeira</li>
              <li>Farrel Dirgantara</li>
              <li>Keira Almeira</li>
              <li>Zhafira Salwa</li>
              <li>Reinaldi Baskoro</li>
              <li>Nayla Zahira</li>
              <li>Daffa Mahendra</li>
              <li>Cintya Anindya</li>
              <li>Alvino Pradipta</li>
              <li>Giselda Amara</li>
              <li>Raka Yudhistira</li>
            </ol>
          </div>
        </div>
      </div>

      <!-- Angkatan 22 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="heading22">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapse22">
            Asisten Lab angkatan 22
          </button>
        </h2>
        <div id="collapse22" class="accordion-collapse collapse" data-bs-parent="#accordionAsisten">
          <div class="accordion-body">
            <ol>
              <li>Aurelina Putri</li>
              <li>Nadhif Ramadhan</li>
              <li>Keira Almeira</li>
              <li>Farrel Dirgantara</li>
              <li>Keira Almeira</li>
              <li>Zhafira Salwa</li>
              <li>Reinaldi Baskoro</li>
              <li>Nayla Zahira</li>
              <li>Daffa Mahendra</li>
              <li>Cintya Anindya</li>
              <li>Alvino Pradipta</li>
              <li>Giselda Amara</li>
              <li>Raka Yudhistira</li>
            </ol>
          </div>
        </div>
      </div>

      <!-- Angkatan 23 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="heading23">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapse23">
            Asisten Lab angkatan 23
          </button>
        </h2>
        <div id="collapse23" class="accordion-collapse collapse" data-bs-parent="#accordionAsisten">
          <div class="accordion-body">
            <ol>
              <li>Aurelina Putri</li>
              <li>Nadhif Ramadhan</li>
              <li>Keira Almeira</li>
              <li>Farrel Dirgantara</li>
              <li>Keira Almeira</li>
              <li>Zhafira Salwa</li>
              <li>Reinaldi Baskoro</li>
              <li>Nayla Zahira</li>
              <li>Daffa Mahendra</li>
              <li>Cintya Anindya</li>
              <li>Alvino Pradipta</li>
              <li>Giselda Amara</li>
              <li>Raka Yudhistira</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-base-layout>
