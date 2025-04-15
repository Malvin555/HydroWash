const menu = document.getElementById('menu');
const toggle = document.getElementById('menuToggle');
const currentPage = document.body.getAttribute('data-page');

if (currentPage === 'landing') {
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

  document.addEventListener('click', (e) => {
    const isClickInsideMenu = menu.contains(e.target);
    const isClickOnToggle = toggle.contains(e.target);
  
    if (!isClickInsideMenu && !isClickOnToggle) {
      menu.classList.add('-translate-x-full');
    }
  });
  
  // For Blur Effect Navbar:) - Not Active
  // document.addEventListener('DOMContentLoaded', () => {
  //   const nav = document.getElementById('navbar');
  //   const navmenu = document.getElementById('menu');
  
  //   window.addEventListener('scroll', () => {
  //       if (window.scrollY > 10) {
  //           nav.classList.add('bg-primary/35', 'backdrop-blur-2xl');
  //           navmenu.classList.add('bg-primary/35', 'backdrop-blur-2 xl');
  //       } else {
  //           nav.classList.remove('bg-primary/35', 'backdrop-blur-2xl');
  //           navmenu.classList.remove('bg-primary/35', 'backdrop-blur-2xl');
  //       }
  //   });
  // });
}



