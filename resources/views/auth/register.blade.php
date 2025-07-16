<x-guest-layout>
  @push('after-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
  @endpush

  <div class="card fat">
    <div class="card-body">
      <h4 class="card-title">Registrasi</h4>
      <form method="POST" class="my-login-validation" novalidate="" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
          <label for="nama_lengkap">Nama Lengkap</label>
          <input id="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
            name="nama_lengkap" required autofocus value="{{ old('nama_lengkap') }}">
          @error('nama_lengkap')
            <div class="invalid-feedback">
              Nama lengkap harus diisi!
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="username">Username</label>
          <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
            name="username" required value="{{ old('username') }}">
          @error('username')
            <div class="invalid-feedback">
              Username harus diisi!
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="npm">NPM</label>
          <input id="npm" type="text" class="form-control @error('npm') is-invalid @enderror" name="npm"
            required value="{{ old('npm') }}">
          @error('npm')
            <div class="invalid-feedback">
              NPM harus diisi!
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="email">Alamat E-Mail</label>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            required value="{{ old('email') }}">
          @error('email')
            <div class="invalid-feedback">
              Email anda tidak valid!
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="password">Kata Sandi</label>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" data-eye>
          @error('password')
            <div class="invalid-feedback">
              Kata sandi dibutuhkan!
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="password_confirmation">Konfirmasi Kata Sandi</label>
          <input id="password_confirmation" type="password"
            class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
            data-eye>
          @error('password_confirmation')
            <div class="invalid-feedback">
              Konfirmasi Kata sandi dibutuhkan!
            </div>
          @enderror
        </div>

        <div class="form-group m-0">
          <button type="submit" class="btn btn-primary btn-block">
            Registrasi
          </button>
        </div>
        <div class="mt-4 text-center">
          Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
        </div>
      </form>
    </div>
  </div>

  @push('after-scripts')
    <script src="{{ asset('js/login.js') }}"></script>
  @endpush
</x-guest-layout>
