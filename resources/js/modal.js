const openTriggers = document.querySelectorAll('#openModal');
const modal = document.getElementById('modal');
const closeBtn = document.getElementById('closeModal');
const cancelBtn = document.getElementById('cancelModal'); // <-- Tambahkan ini
const modalContent = modal.querySelector('div');

// Fungsi untuk membuka modal
openTriggers.forEach(trigger => {
  trigger.addEventListener('click', () => {
    modal.classList.remove('hidden');
    setTimeout(() => {
      modal.classList.remove('opacity-0');
      modal.classList.add('opacity-100');
      modalContent.classList.remove('scale-95');
      modalContent.classList.add('scale-100');
    }, 10);
  });
});

// Fungsi untuk menutup modal
function closeModal() {
  modal.classList.remove('opacity-100');
  modal.classList.add('opacity-0');
  modalContent.classList.remove('scale-100');
  modalContent.classList.add('scale-95');

  setTimeout(() => {
    modal.classList.add('hidden');
  }, 300);
}

closeBtn.addEventListener('click', closeModal);
cancelBtn.addEventListener('click', closeModal); // <-- Tambahkan ini juga

// Klik area luar modal
modal.addEventListener('click', (e) => {
  if (e.target === modal) {
    closeModal();
  }
});

// Tutup modal dengan tombol ESC
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
    closeModal();
  }
});
