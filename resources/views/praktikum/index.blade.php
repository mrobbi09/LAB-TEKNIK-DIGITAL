<x-base-layout title="List Praktikum">
  @push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/list-praktikum.css') }}" />
  @endpush

  <div class="tabs">
    @foreach ($daftar_praktikum as $praktikum)
      <button onclick="showContent('{{ $praktikum->slug }}')">{{ $praktikum->nama_praktikum }}</button>
    @endforeach
  </div>


  @foreach ($daftar_praktikum as $praktikum)
    <div id="{{ $praktikum->slug }}-content" class="content hidden">
      @if (optional($user_praktikum)->id_praktikum !== $praktikum->id_praktikum)
        <div class="locked-info">
          <img src="{{ asset('image/lock.png') }}" alt="locked" />
          <p>Bukan Praktikum yang Anda Ikuti</p>
        </div>
      @else
        @foreach ($praktikum->judul as $judul)
          <div class="box link-box" target="_blank">
            <h5>{{ $judul->nama_judul }}</h5>

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
                    <a href="{{ route('judul.show', $judul->slug) }}" class="btn btn-success btn-sm">
                      <i class="fas fa-eye"></i> Lihat Judul
                    </a>
                  @else
                    <img src="{{ asset('image/lock.png') }}" class="icon" />
                    <p class="status">Buka: {{ $hMinus3->translatedFormat('d F Y, H:i:s') }}</p>
                  @endif
                </div>
              </div>
            @empty
              <p class="text-muted">Belum ada jadwal untuk judul ini.</p>
            @endforelse
          </div>
        @endforeach
      @endif
    </div>
  @endforeach

  @push('after-scripts')
    <script src="{{ asset('js/list-praktikum.js') }}"></script>
  @endpush
</x-base-layout>
