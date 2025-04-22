const closeIcons = document.querySelectorAll("[data-close-icon]");
const closeButtons = document.querySelectorAll("[data-close-button]");

closeIcons.forEach((button) => {
    button.addEventListener("click", () => {
        const modal = button.closest(".modal");
        closeModal(modal);
    });
});

closeButtons.forEach((button) => {
    button.addEventListener("click", () => {
        const modal = button.closest(".modal");
        closeModal(modal);
    });
});

/**
 * Initializes the modal functionality and allows for a callback to be executed before showing the modal.
 * @param {Function} callback - A function to execute before showing the modal.
 */
initializeModal(null);
export default function initializeModal(callback) {
    document.addEventListener("click", async (event) => {
        const button = event.target.closest("[data-modal-target]");
        if (button) {
            const modalId = button.getAttribute("data-modal-target");
            const modal = document.getElementById(modalId);
            const modalContent = modal.querySelector(".modal-content");

            // Execute the callback before showing the modal
            if (typeof callback === "function") {
                await callback(event.target.dataset);
            }

            showModal(modal, modalContent);

            // Close modal when clicking outside the modal content
            modal.addEventListener("click", (e) => {
                if (e.target === modal) closeModal(modal);
            });

            // Close modal when pressing the Escape key
            document.addEventListener("keydown", handleEscapeKey(modal));
        }
    });
}
/**
 * Displays the modal with animations.
 * @param {HTMLElement} modal - The modal element to display.
 * @param {HTMLElement} modalContent - The modal content element for scaling animation.
 */
function showModal(modal, modalContent) {
    modal.classList.remove("hidden");
    setTimeout(() => {
        modal.classList.remove("opacity-0");
        modal.classList.add("opacity-100");
        modalContent.classList.remove("scale-95");
        modalContent.classList.add("scale-100");
    }, 10);
}

/**
 * Handles the Escape key press to close the modal.
 * @param {HTMLElement} modal - The modal element to close.
 * @returns {Function} - The event handler function.
 */
function handleEscapeKey(modal) {
    return function (e) {
        if (e.key === "Escape" && !modal.classList.contains("hidden")) {
            closeModal(modal);
        }
    };
}

/**
 * Closes the modal with animations.
 * @param {HTMLElement} modal - The modal element to close.
 */
function closeModal(modal) {
    const modalContent = modal.querySelector(".modal-content");

    modal.classList.remove("opacity-100");
    modal.classList.add("opacity-0");
    modalContent.classList.remove("scale-100");
    modalContent.classList.add("scale-95");

    setTimeout(() => {
        modal.classList.add("hidden");
    }, 300);
}
