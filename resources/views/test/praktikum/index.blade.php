@extends('layouts.test')

@section('content')
  <div class="container">
    <h1 class="mb-4">Daftar Praktikum</h1>

    <div class="card mb-4">
      <div class="card-header bg-primary text-white">
        <a href="{{ route('praktikum.show', $praktikum->slug) }}" class="text-white">{{ $praktikum->nama_praktikum }}</a>
        {{-- Nama Praktikum --}}
      </div>
      <div class="card-body">
        @forelse($praktikum->judul as $judul)
          <div class="mb-3 p-3 border rounded">
            <h6 class="mb-2">{{ $judul->nama_judul }}</h6> {{-- Judul Praktikum --}}

            @forelse($judul->jadwal as $jadwal)
              @php
                $tanggalMulai = \Carbon\Carbon::parse($jadwal->tanggal_waktu);
                $today = \Carbon\Carbon::today();
                $hMinus3 = $tanggalMulai->copy()->subDays(3);
                
                $userKelompokId = auth()->user()->kelompok->id_kelompok ?? null;
                $isUserInKelompok = $jadwal->kelompok->id_kelompok === $userKelompokId;
                $isAccessible = $isUserInKelompok && $today->greaterThanOrEqualTo($hMinus3);
              @endphp

              <div class="d-flex justify-content-between align-items-center py-1 border-bottom">
                <div>
                  <strong>Jadwal:</strong> {{ $tanggalMulai->format('d M Y') }}
                  <br>
                  <strong>Kelompok:</strong> {{ $jadwal->kelompok->nama_kelompok }}
                </div>
                <div>
                  @if ($isAccessible)
                    <a href="{{ Storage::url($judul->modul) }}" class="btn btn-success btn-sm" target="_blank">
                      <i class="fas fa-eye"></i> Lihat Judul
                    </a>
                  @else
                    <span class="text-muted">
                      <i class="fas fa-lock"></i> Belum Bisa Diakses (H-3)
                    </span>
                  @endif
                </div>
              </div>
            @empty
              <p class="text-muted">Belum ada jadwal untuk judul ini.</p>
            @endforelse
          </div>
        @empty
          <p class="text-muted">Tidak ada judul dalam praktikum ini.</p>
        @endforelse
      </div>
    </div>
  </div>
@endsection
