const openTriggers = document.querySelectorAll('#openModal');
const modal = document.getElementById('modal');
const closeBtn = document.getElementById('closeModal');
// const cancelBtn = document.getElementById('cancelModal');
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
// cancelBtn.addEventListener('click', closeModal);

modal.addEventListener('click', (e) => {
  if (e.target === modal) {
    closeModal();
  }
});

document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
    closeModal();
  }
});



// function setupModal(openBtnId, modalId, closeBtnId) {
//   const openTriggers = document.querySelectorAll(`#${openBtnId}`);
//   const modal = document.getElementById(modalId);
//   const closeBtn = document.getElementById(closeBtnId);
//   const modalContent = modal.querySelector('div');

//   function openModal() {
//     modal.classList.remove('hidden');
//     setTimeout(() => {
//       modal.classList.remove('opacity-0');
//       modal.classList.add('opacity-100');
//       modalContent.classList.remove('scale-95');
//       modalContent.classList.add('scale-100');
//     }, 10);
//   }

//   function closeModal() {
//     modal.classList.remove('opacity-100');
//     modal.classList.add('opacity-0');
//     modalContent.classList.remove('scale-100');
//     modalContent.classList.add('scale-95');
//     setTimeout(() => {
//       modal.classList.add('hidden');
//     }, 300);
//   }

//   openTriggers.forEach(trigger => {
//     trigger.addEventListener('click', openModal);
//   });

//   if (closeBtn) {
//     closeBtn.addEventListener('click', closeModal);
//   }

//   modal.addEventListener('click', (e) => {
//     if (e.target === modal) {
//       closeModal();
//     }
//   });

//   document.addEventListener('keydown', (e) => {
//     if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
//       closeModal();
//     }
//   });
// }
