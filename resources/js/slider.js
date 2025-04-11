    // let currentReviewIndex = 0;
    // const reviews = document.querySelectorAll('#review');

    // function showReview(index) {
    //     reviews.forEach((review, i) => {
    //         if (i === index) {
    //             review.classList.remove('hidden');
    //             review.classList.add('block');
    //         } else {
    //             review.classList.remove('block');
    //             review.classList.add('hidden');
    //         }
    //     });
    // }

    // function prevReview() {
    //     currentReviewIndex = (currentReviewIndex - 1 + reviews.length) % reviews.length;
    //     showReview(currentReviewIndex);
    // }

    // function nextReview() {
    //     currentReviewIndex = (currentReviewIndex + 1) % reviews.length;
    //     showReview(currentReviewIndex);
    // }

    // // Tampilkan review pertama saat load
    // showReview(currentReviewIndex);

    // // Event listeners untuk tombol
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
    