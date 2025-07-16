<x-base-layout title="{{ $praktikum->nama_praktikum }}">
  @push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/prak-td.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  @endpush

  <div class="main-content">
    <h1 class="section-title">PRAKTIKUM TEKNIK DIGITAL (PTD)</h1>

    <div class="praktikum-grid">
      <div class="praktikum-card available" onclick="openModal('kombinasiLogika')">
        <div class="card-icon">
          <i class="fas fa-microchip"></i>
        </div>
        <h3 class="card-title">KOMBINASI LOGIKA</h3>
        <span class="card-status status-available">Tersedia</span>
      </div>

      <div class="praktikum-card locked">
        <div class="card-icon">
          <i class="fas fa-lock"></i>
        </div>
        <h3 class="card-title">FLIP-FLOP</h3>
        <span class="card-status status-locked">Buka: 1/6/2025, 00.00.00</span>
      </div>

      <div class="praktikum-card locked">
        <div class="card-icon">
          <i class="fas fa-lock"></i>
        </div>
        <h3 class="card-title">REGISTER</h3>
        <span class="card-status status-locked">Buka: 6/6/2025, 00.00.00</span>
      </div>

      <div class="praktikum-card locked">
        <div class="card-icon">
          <i class="fas fa-lock"></i>
        </div>
        <h3 class="card-title">COUNTER</h3>
        <span class="card-status status-locked">Buka: 11/6/2025, 00.00.00</span>
      </div>

      <div class="praktikum-card locked">
        <div class="card-icon">
          <i class="fas fa-lock"></i>
        </div>
        <h3 class="card-title">PENGKODEAN</h3>
        <span class="card-status status-locked">Buka: 16/6/2025, 00.00.00</span>
      </div>
    </div>
  </div>

  <!-- Modal for Kombinasi Logika -->
  <div id="kombinasiLogikaModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Kombinasi Logika</h2>
        <span class="close" onclick="closeModal('kombinasiLogika')">&times;</span>
      </div>
      <div class="modal-body">
        <div class="section">
          <div class="section-subtitle">Modul</div>
          <div class="pdf-container">
            <iframe src="pdf/Modul_Pratikum_Teknik_Digital_2025.pdf#toolbar=1"></iframe>
          </div>
          <div class="download-link">
            <a href="pdf/Modul_Pratikum_Teknik_Digital_2025.pdf" download>
              <i class="fas fa-download"></i> Unduh Modul
            </a>
          </div>
        </div>

        <div class="section">
          <div class="section-subtitle">Tugas Pendahuluan</div>
          <div class="pdf-container">
            <iframe src="pdf/Tugas Pendahuluan_Judul_3_Register.pdf#toolbar=1"></iframe>
          </div>
          <div class="download-link">
            <a href="pdf/Tugas Pendahuluan_Judul_3_Register.pdf" download>
              <i class="fas fa-download"></i> Unduh Tugas Pendahuluan
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  @push('after-scripts')
    <script src="{{ asset('js/prak-td.js') }}"></script>
  @endpush
</x-base-layout>
