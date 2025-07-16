<x-base-layout title="Open Recruitment">
  @push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/open-recruitment.css') }}" />
  @endpush

  <!-- Main Container -->
  <div class="container">
    <h1 class="page-title">Open Recruitment</h1>

    <!-- Recruitment Info -->
    <div class="recruitment-info">
      <h3>🎯 Bergabunglah dengan Tim Kami!</h3>
      <p>Kami sedang mencari talenta terbaik untuk bergabung dalam tim yang dinamis dan inovatif. Jadilah bagian dari
        perubahan dan wujudkan potensi terbaik Anda bersama kami.</p>
    </div>

    <!-- Success Message -->
    <div id="successMessage" class="success-message">
      ✅ Data berhasil disimpan! File Anda telah tersimpan dengan aman.
    </div>

    <!-- Registration Form -->
    <div class="profile-card">
      <div class="profile-header">
        <div class="profile-avatar">
          📝
        </div>
        <h2>Form Data Peserta</h2>
        <p style="color: #666; margin-top: 0.5rem;">Lengkapi data Anda untuk mendaftar open recruitment</p>
      </div>

      <form id="recruitmentForm">
        <!-- ID OPREC (Auto Generated) -->
        <div class="form-group">
          <label for="id_oprec">ID OPREC <span class="info-badge">Auto Generated</span></label>
          <input type="text" id="id_oprec" name="id_oprec" value="OPREC-2025-001" disabled>
        </div>

        <!-- Nama & Kelas -->
        <div class="form-row">
          <div class="form-group">
            <label for="nama">Nama Lengkap *</label>
            <input type="text" id="nama" name="nama" required maxlength="40"
              placeholder="Masukkan nama lengkap">
          </div>
          <div class="form-group">
            <label for="kelas">Kelas *</label>
            <input type="text" id="kelas" name="kelas" required maxlength="10" placeholder="Contoh: PSTI A">
          </div>
        </div>

        <!-- CV Upload -->
        <div class="form-group">
          <label for="cv">Upload CV *</label>
          <div class="file-upload">
            <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" required>
            <label for="cv" class="file-upload-label">
              <div class="file-upload-icon">📄</div>
              <div>Klik untuk upload CV (PDF, DOC, DOCX)</div>
              <small style="color: #666;">Maksimal 5MB</small>
            </label>
            <div id="cvPreview" class="file-preview">
              <div class="file-info">
                <span id="cvFileName">No file selected</span>
                <span id="cvFileSize" class="file-size"></span>
              </div>
            </div>
          </div>
        </div>

        <!-- Foto Upload -->
        <div class="form-group">
          <label for="foto">Upload Foto *</label>
          <div class="file-upload">
            <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png" required>
            <label for="foto" class="file-upload-label">
              <div class="file-upload-icon">📷</div>
              <div>Klik untuk upload Foto (JPG, PNG)</div>
              <small style="color: #666;">Maksimal 2MB</small>
            </label>
            <div id="fotoPreview" class="file-preview">
              <div class="file-info">
                <span id="fotoFileName">No file selected</span>
                <span id="fotoFileSize" class="file-size"></span>
              </div>
            </div>
          </div>
        </div>

        <!-- KTM Upload -->
        <div class="form-group">
          <label for="ktm">Upload Foto KTM *</label>
          <div class="file-upload">
            <input type="file" id="ktm" name="ktm" accept=".jpg,.jpeg,.png,.pdf" required>
            <label for="ktm" class="file-upload-label">
              <div class="file-upload-icon">🆔</div>
              <div>Klik untuk upload Foto KTM (JPG, PNG, PDF)</div>
              <small style="color: #666;">Maksimal 3MB</small>
            </label>
            <div id="ktmPreview" class="file-preview">
              <div class="file-info">
                <span id="ktmFileName">No file selected</span>
                <span id="ktmFileSize" class="file-size"></span>
              </div>
            </div>
          </div>
        </div>

        <!-- Transkrip Upload -->
        <div class="form-group">
          <label for="transkrip">Upload Transkrip Nilai</label>
          <div class="file-upload">
            <input type="file" id="transkrip" name="transkrip" accept=".pdf,.jpg,.jpeg,.png">
            <label for="transkrip" class="file-upload-label">
              <div class="file-upload-icon">📊</div>
              <div>Klik untuk upload Transkrip (Opsional)</div>
              <small style="color: #666;">PDF, JPG, PNG - Maksimal 3MB</small>
            </label>
            <div id="transkripPreview" class="file-preview">
              <div class="file-info">
                <span id="transkripFileName">No file selected</span>
                <span id="transkripFileSize" class="file-size"></span>
              </div>
            </div>
          </div>
        </div>

        <!-- Angkatan -->
        <div class="form-group">
          <label for="angkatan">Angkatan *</label>
          <select id="angkatan" name="angkatan" required>
            <option value="">Pilih Angkatan</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
          </select>
        </div>

        <!-- Slug OPREC -->
        <div class="form-group">
          <label for="slug_oprec">Slug OPREC <span class="link-badge">Klik untuk Buka Link</span></label>
          <div class="slug-input-container">
            <input type="text" id="slug_oprec" name="slug_oprec" value="oprec-2025-recruitment" disabled>
            <a href="#" id="slugLink" class="slug-link" target="_blank">
              <span class="icon">🔗</span>
              <span>Buka Link</span>
            </a>
          </div>
        </div>

        <!-- Submit Buttons -->
        <div class="button-group">
          <button type="submit" class="btn">
            💾 Simpan Data
          </button>
          <button type="reset" class="btn btn-secondary">
            🔄 Batal
          </button>
        </div>
      </form>
    </div>
  </div>

  @push('after-scripts')
    <script>
      // File upload preview functionality
      function setupFileUpload(inputId, previewId, fileNameId, fileSizeId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const fileName = document.getElementById(fileNameId);
        const fileSize = document.getElementById(fileSizeId);

        input.addEventListener('change', function(e) {
          const file = e.target.files[0];
          if (file) {
            fileName.textContent = file.name;
            fileSize.textContent = formatFileSize(file.size);
            preview.classList.add('show');
          } else {
            fileName.textContent = 'No file selected';
            fileSize.textContent = '';
            preview.classList.remove('show');
          }
        });
      }

      function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
      }

      // Initialize file upload previews
      setupFileUpload('cv', 'cvPreview', 'cvFileName', 'cvFileSize');
      setupFileUpload('foto', 'fotoPreview', 'fotoFileName', 'fotoFileSize');
      setupFileUpload('ktm', 'ktmPreview', 'ktmFileName', 'ktmFileSize');
      setupFileUpload('transkrip', 'transkripPreview', 'transkripFileName', 'transkripFileSize');

      // Slug OPREC link functionality
      function updateSlugLink() {
        const slugInput = document.getElementById('slug_oprec');
        const slugLink = document.getElementById('slugLink');
        const baseUrl = 'https://recruitment.company.com/';

        slugLink.href = baseUrl + slugInput.value;

        // Update link text with current slug
        slugLink.querySelector('span:last-child').textContent = 'Buka: ' + slugInput.value;
      }

      // Form submission
      document.getElementById('recruitmentForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Show success message
        const successMessage = document.getElementById('successMessage');
        successMessage.classList.add('show');

        // Hide success message after 5 seconds
        setTimeout(() => {
          successMessage.classList.remove('show');
        }, 5000);

        // Scroll to top
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      });

      // Auto-generate ID OPREC and update slug
      function generateOprecId() {
        const date = new Date();
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        const random = Math.floor(Math.random() * 1000).toString().padStart(3, '0');

        const oprecId = `OPREC-${year}${month}${day}-${random}`;
        document.getElementById('id_oprec').value = oprecId;

        // Update slug based on ID
        const slug = `oprec-${year}-${month}${day}-${random}`;
        document.getElementById('slug_oprec').value = slug;

        // Update link
        updateSlugLink();
      }

      // Generate ID on page load
      generateOprecId();

      // Update link when page loads
      updateSlugLink();

      // Add click handler for the slug link
      document.getElementById('slugLink').addEventListener('click', function(e) {
        e.preventDefault();
        const url = this.href;

        // Show confirmation
        if (confirm('Apakah Anda ingin membuka link OPREC: ' + url + '?')) {
          // In a real application, this would open the actual recruitment page
          alert('Link OPREC akan dibuka: ' + url +
            '\n\n(Dalam implementasi nyata, ini akan mengarah ke halaman recruitment yang sebenarnya)');
          // window.open(url, '_blank');
        }
      });
    </script>
  @endpush
</x-base-layout>
