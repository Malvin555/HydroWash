const sidebar = document.getElementById('sidebar');
const sidebarToggle = document.getElementById('sidebarToggle');
const toggleDropdownBtn = document.getElementById('toggleDropdownBtn');
const analyticsDropdown = document.getElementById('analyticsDropdown');
const analyticsArrow = document.getElementById('analyticsArrow');
const profileBtn = document.querySelector('#profileDropdown > button');
const profileMenu = document.getElementById('profileMenu');

const currentPage = document.body.getAttribute('data-page');

if (currentPage === 'admin') {

  sidebarToggle.addEventListener('click', function (e) {
    e.stopPropagation();
    sidebar.classList.toggle('-translate-x-full');
  });
  
  
  window.addEventListener('click', function (e) {
    if (!sidebar.classList.contains('-translate-x-full') && 
        !sidebar.contains(e.target) && 
        !sidebarToggle.contains(e.target)) {
      sidebar.classList.add('-translate-x-full');
    }
  });
  
  
  toggleDropdownBtn.addEventListener('click', function (e) {
    e.stopPropagation();
    analyticsDropdown.classList.toggle('hidden');
    analyticsArrow.classList.toggle('rotate-180');
  });
  
  
  window.addEventListener('click', function (e) {
    if (
      !analyticsDropdown.classList.contains('hidden') &&
      !analyticsDropdown.contains(e.target) &&
      !toggleDropdownBtn.contains(e.target)
    ) {
      analyticsDropdown.classList.add('hidden');
      analyticsArrow.classList.remove('rotate-180');
    }
  });
  
  
  profileBtn.addEventListener('click', function (e) {
    e.stopPropagation();
    profileMenu.classList.toggle('hidden');
  });
  
  
  window.addEventListener('click', function (e) {
    if (!profileMenu.contains(e.target) && !profileBtn.contains(e.target)) {
      profileMenu.classList.add('hidden');
    }
  });
}