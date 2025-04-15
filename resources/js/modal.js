const openTriggers = document.querySelectorAll('#openModal');
const modal = document.getElementById('modal');
const closeBtn = document.getElementById('closeModal');
const modalContent = modal.querySelector('div');


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

closeBtn.addEventListener('click', () => {
  modal.classList.remove('opacity-100');
  modal.classList.add('opacity-0');
  modalContent.classList.remove('scale-100');
  modalContent.classList.add('scale-95');

  setTimeout(() => {
    modal.classList.add('hidden');
  }, 300);
});

modal.addEventListener('click', (e) => {
  if (e.target === modal) {
    closeBtn.click();
  }
});

document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
    closeBtn.click();
  }
});
