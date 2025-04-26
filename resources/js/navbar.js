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


const sections = document.querySelectorAll('section[id]')
const navLinks = document.querySelectorAll('.nav__link')

const scrollActive = () => {
  const scrollDown = window.scrollY

  sections.forEach((current, index) => {
    const sectionHeight = current.offsetHeight
    const sectionTop = current.offsetTop - 58
    const sectionId = current.getAttribute('id')
    const navLink = navLinks[index]

    if (scrollDown > sectionTop && scrollDown <= sectionTop + sectionHeight) {
      navLink.classList.add('border-b-2', 'border-white')
    } else {
      navLink.classList.remove('border-b-2', 'border-white')
    }
  })
}

window.addEventListener('scroll', scrollActive)
}
