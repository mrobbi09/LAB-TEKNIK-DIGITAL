<x-guest-layout>
  @push('after-styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
  @endpush

  @if (session('status'))
    <div class="alert alert-primary">
      Link reset password sudah dikirim
    </div>
  @endif

  <div class="card fat">
    <div class="card-body">
      <h4 class="card-title">Lupa Kata Sandi</h4>
      <form method="POST" class="my-login-validation" novalidate="" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group">
          <label for="email">Alamat E-Mail</label>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autofocus>
          @error('email')
            <div class="invalid-feedback">
              Email tidak valid
            </div>
          @enderror
          <div class="form-text text-muted">
            Dengan mengklik "Reset Kata Sandi", kami akan mengirimkan tautan untuk mengatur ulang kata sandi
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
