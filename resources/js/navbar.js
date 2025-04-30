const menuToggle = document.getElementById("menuToggle");
const mobileMenu = document.getElementById("mobileMenu");
const currentPage = document.body.getAttribute("data-page");
const sections = document.querySelectorAll("section[id]");
const navLinks = document.querySelectorAll(".nav__link");

if (currentPage === "landing") {
    // Mobile menu toggle
    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener("click", function () {
            mobileMenu.classList.toggle("hidden");
        });
    }

    // Navigation Bar Highlight
    const scrollActive = () => {
        const scrollDown = window.scrollY;

        sections.forEach((current, index) => {
            const sectionHeight = current.offsetHeight;
            const sectionTop = current.offsetTop - 58;
            const sectionId = current.getAttribute("id");
            const navLink = navLinks[index];

            if (
                scrollDown > sectionTop &&
                scrollDown <= sectionTop + sectionHeight
            ) {
                navLink.classList.add("border-b-2", "border-white");
            } else {
                navLink.classList.remove("border-b-2", "border-white");
            }
        });
    };

    window.addEventListener("scroll", scrollActive);
}
