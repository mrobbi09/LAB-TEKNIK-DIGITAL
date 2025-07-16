<x-guest-layout>
  @push('after-styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
  @endpush

  <div class="card fat">
    <div class="card-body">
      <h4 class="card-title">Atur Ulang Kata Sandi</h4>
      <form method="POST" class="my-login-validation" novalidate="" action="{{ route('password.store') }}">
        <div class="form-group">
          @csrf
          <input type="hidden" name="token" value="{{ $request->route('token') }}">

          <div>
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
              name="email" required value="{{ old('email', $request->email) }}" readonly>
            @error('email')
              <div class="invalid-feedback">
                Email tidak valid
              </div>
            @enderror
          </div>

          <div class="mt-3">
            <label for="password">Kata Sandi Baru</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
              name="password" required autofocus data-eye>
            @error('password')
              <div class="invalid-feedback">
                Kata sandi dibutuhkan
              </div>
            @enderror
          </div>

          <div class="mt-3">
            <label for="password_confirmation">Konfirmasi Kata Sandi</label>
            <input id="password_confirmation" type="password"
              class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
              required data-eye>
            @error('password_confirmation')
              <div class="invalid-feedback">
                Kata sandi tidak sesuai
              </div>
            @enderror
          </div>

          <div class="form-text text-muted">
            Pastikan kata sandi Anda kuat dan mudah diingat
          </div>
        </div>

        <div class="form-group m-0">
          <button type="submit" class="btn btn-primary btn-block">
            Atur Ulang Kata Sandi
          </button>
        </div>
      </form>
    </div>
  </div>

  @push('after-scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/login.js') }}"></script>
  @endpush
</x-guest-layout>
