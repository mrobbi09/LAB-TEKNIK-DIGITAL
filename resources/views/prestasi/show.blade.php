<x-base-layout title="Prestasi">
  @push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <style>
      .container {
        max-width: 900px;
        min-height: max-content;
        margin: 2rem auto;
        padding: 1.5rem 1.3rem;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      }

      .article-title {
        font-size: 2rem;
        color: #0d47a1;
        margin-bottom: 0.5rem;
        text-align: left;
      }

      .article-meta {
        font-size: 0.95rem;
        color: #666;
        margin-bottom: 1.5rem;
      }

      .article-image {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 6px;
        margin-bottom: 1.5rem;
      }

      .article-content p {
        line-height: 1.8;
        margin-bottom: 1.2rem;
        text-align: justify;
      }

      footer {
        background-color: #0d47a1;
        color: white;
        padding: 1rem 2rem;
        text-align: center;
        margin-top: 4rem;
      }

      @media (max-width: 600px) {
        header h1 {
          font-size: 1.4rem;
        }

        nav a {
          display: block;
          margin: 0.5rem 0;
        }

        .article-title {
          font-size: 1.5rem;
        }
      }
    </style>
  @endpush

  <main class="container">
    <h2 class="article-title">{{ $prestasi->judul_prestasi }}</h2>
    <p class="article-meta">Dipublikasikan:
      {{ \Carbon\Carbon::parse($prestasi->tanggal_prestasi)->translatedFormat('d F Y') }}</p>
    <img src="{{ Storage::url($prestasi->gambar_prestasi) }}" alt="{{ $prestasi->judul_prestasi }}"
      class="article-image" />

    <div class="article-content">
      {!! $prestasi->deskripsi_prestasi !!}
    </div>
  </main>
</x-base-layout>
