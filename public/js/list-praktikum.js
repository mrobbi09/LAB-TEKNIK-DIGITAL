function showContent(tab) {
    // Sembunyikan semua konten
    document.querySelectorAll('.content').forEach(el => el.classList.add('hidden'));

    // Tampilkan konten sesuai tab
    document.getElementById(`${tab}-content`).classList.remove('hidden');
}

// Opsional: Tampilkan kosong dulu saat awal load
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.content').forEach(el => el.classList.add('hidden'));
});

function showContent(tab) {
  // Sembunyikan semua konten
  document.querySelectorAll('.content').forEach(el => el.classList.add('hidden'));
  document.getElementById(`${tab}-content`).classList.remove('hidden');

  // Hilangkan 'active' dari semua tombol
  document.querySelectorAll('.tabs button').forEach(btn => btn.classList.remove('active'));
  // Tambahkan 'active' ke tombol yang diklik
  document.querySelector(`.tabs button[onclick="showContent('${tab}')"]`).classList.add('active');
}
