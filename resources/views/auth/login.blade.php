<x-guest-layout>
  @push('after-styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
  @endpush

  <div class="card fat">
    <div class="card-body">
      <h4 class="card-title">Masuk</h4>
      <form method="POST" class="my-login-validation" novalidate="" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
          <label for="email">Alamat E-Mail</label>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autofocus>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="password">Kata Sandi
            <a href="{{ route('password.request') }}" class="float-right">
              Kata Sandi?
            </a>
          </label>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required data-eye>
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <div class="custom-checkbox custom-control">
            <input type="checkbox" name="remember" id="remember" class="custom-control-input">
            <label for="remember" class="custom-control-label">Ingat saya</label>
          </div>
        </div>

        <div class="form-group m-0">
          <button type="submit" class="btn btn-primary btn-block">
            Masuk
          </button>
        </div>
        <div class="mt-4 text-center">
          Belum punya akun? <a href="{{ route('register') }}">Buat akun</a>
        </div>
      </form>
    </div>
  </div>

  @push('after-scripts')
    <script src="{{ asset('js/login.js') }}"></script>
  @endpush
</x-guest-layout>
