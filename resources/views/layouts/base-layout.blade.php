<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $title }} - Laboratorium Teknik Digital</title>

  <!-- font awesome CDN-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Link to Swiper JS CDN-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  @stack('after-styles')
</head>

<body>
  <!--Navbar start-->
  <nav class="navbar">
    <div class="logo">
      <img src="{{ asset('image/logo td.png') }}" alt="Logo Lab">
      Lab Teknik Digital
    </div>
    <ul class="nav-links">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('pra-praktikum') }}">Pra Praktikum</a></li>
      <li class="dropdown">
        <a href="#">Praktikum ▾</a>
        <ul class="dropdown-content">
          <li><a href="{{ route('praktikum.index') }}">Praktikum</a></li>
          @foreach (\App\Models\Praktikum::all() as $praktikum)
            <li><a href="{{ route('praktikum.show', $praktikum->slug) }}">{{ $praktikum->nama_praktikum }}</a></li>
          @endforeach
        </ul>
      </li>
      <li><a href="{{ route('galeri') }}">Galeri</a></li>
      <li><a href="{{ route('prestasi.index') }}">Prestasi</a></li>
      @auth
        <li><a href="{{ route('user.profile.edit') }}">Profil</a></li>
        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-primary" type="submit" style="padding: 6px 16px; font-size: 14px;">Logout</button>
          </form>
        </li>
      @else
        <li><a href="{{ route('login') }}">Masuk</a></li>
      @endauth

    </ul>
  </nav>
  <!--Navbar end-->

  {{-- Main Content --}}
  {{ $slot }}

  <!--footer-->
  <footer class="footer">
    <div class="footer-content">
      <div class="footer-section">
        <h4>Alamat</h4>
        <p>Lab Teknik Digital<br>Universitas Lampung<br>Jl. Prof. Dr. Ir. Sumantri Brojonegoro No.1, Gedong Meneng, Kec.
          Rajabasa, Kota Bandar Lampung</p>
      </div>

      <div class="footer-section">
        <h4>Lokasi (Maps)</h4>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.1547924363897!2d105.24064731476293!3d-5.358493996082309!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40da3b8c3e2dc1%3A0x861bc80cca2ee8c9!2sUniversitas%20Lampung!5e0!3m2!1sid!2sid!4v1638360583891!5m2!1sid!2sid"
          allowfullscreen="" loading="lazy">
        </iframe>
      </div>

      <div class="footer-section">
        <h4>Instagram</h4>
        <p>
          Ikuti kami di Instagram: <br>
          <a href="https://www.instagram.com/lab_td/?igsh=N2VwaWthOHp2cjB0#" target="_blank">@lab_td</a>
        </p>
      </div>
    </div>
  </footer>

  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>

  @stack('after-scripts')
</body>

</html>
