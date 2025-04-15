const currentPage = document.body.getAttribute('data-page');

if (currentPage === 'landing') {
    document.addEventListener('DOMContentLoaded', () => {
        let currentReview = 0;
        const reviewWrapper = document.getElementById('reviewWrapper');
        const total = reviewWrapper.children.length;
    
        function update() {
            reviewWrapper.style.transform = `translateX(-${currentReview * 100}%)`;
        }
    
        window.nextReview = function () {
            currentReview = (currentReview + 1) % total;
            update();
        }
    
        window.prevReview = function () {
            currentReview = (currentReview - 1 + total) % total;
            update();
        }
    });
    
}