const menu = document.getElementById('menu');
const toggle = document.getElementById('menuToggle');

toggle.addEventListener('click', (e) => {
  e.stopPropagation();
  menu.classList.toggle('-translate-x-full');
});

document.addEventListener('click', (e) => {
  const isClickInsideMenu = menu.contains(e.target);
  const isClickOnToggle = toggle.contains(e.target);

  if (!isClickInsideMenu && !isClickOnToggle) {
    menu.classList.add('-translate-x-full');
  }
});
