<x-base-layout title="Profil">
  @push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/edit-profile.css') }}" />
  @endpush

  <div class="container">
    <h1 class="page-title">Profil User</h1>

    <div class="profile-card">
      <div class="profile-header">
        @if (!auth()->user()->foto_profil)
          <div class="profile-avatar" id="avatarDisplay">
            {{ Str::limit(auth()->user()->username, 2) }}
          </div>
        @else
          <img class="profile-avatar" id="avatarDisplay" src="{{ Storage::url(auth()->user()->foto_profil) }}" />
        @endif
        <h2>Informasi Pengguna</h2>
        <p>Kelola informasi profil Anda</p>
      </div>

      <form id="userForm" method="POST" enctype="multipart/form-data" action="{{ route('user.profile.update') }}">
        @csrf
        @method('patch')

        <div class="form-group">
          <label for="npm">NPM</label>
          <input type="text" id="npm" name="npm" maxlength="20" placeholder="Masukkan NPM Anda"
            class="@error('npm') is-invalid @enderror" value="{{ old('npm', auth()->user()->npm) }}" required>
          @error('npm')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" maxlength="20" placeholder="Username"
            class="@error('username') is-invalid @enderror" value="{{ old('username', auth()->user()->username) }}"
            required>
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="nama_lengkap">Nama Lengkap</label>
          <input type="text" id="nama_lengkap" name="nama_lengkap" maxlength="40" placeholder="Nama lengkap Anda"
            class="@error('nama_lengkap') is-invalid @enderror"
            value="{{ old('nama_lengkap', auth()->user()->nama_lengkap) }}" required>
          @error('nama_lengkap')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" maxlength="40" placeholder="email@example.com"
            class="@error('email') is-invalid @enderror" value="{{ old('email', auth()->user()->email) }}" required>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="kelompok">
              Kelompok
              <span class="info-badge">Read Only</span>
            </label>
            <div class="disabled-field">
              <input type="text" id="kelompok" name="kelompok"
                value="{{ auth()->user()->kelompok->nama_kelompok }}" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="praktikum">
              Praktikum
              <span class="info-badge">Read Only</span>
            </label>
            <div class="disabled-field">
              <input type="text" id="praktikum" name="praktikum"
                value="{{ auth()->user()->praktikum->nama_praktikum }}" disabled>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="foto_profil">Foto Profil</label>
          <input type="file" id="foto_profil" name="foto_profil" accept="image/*"
            class="@error('foto_profil') is-invalid @enderror">
          <small style="color: #6c757d; margin-top: 0.5rem; display: block;">Maksimal ukuran file 2MB (JPG, PNG,
            GIF)</small>
          @error('foto_profil')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="button-group">
          <button type="submit" class="btn">Simpan Profil</button>
          <button type="button" class="btn btn-secondary" onclick="resetForm()">Batal</button>
        </div>
      </form>
    </div>
  </div>
</x-base-layout>
