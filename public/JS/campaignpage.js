// --- 1. Featured Success Slider Logic ---
const slider = document.querySelector('.featured-slider');
if (slider) {
    const track = slider.querySelector('.slider-track');
    const slides = Array.from(track.children);
    const nextButton = slider.querySelector('.slider-btn.next');
    const prevButton = slider.querySelector('.slider-btn.prev');

    if (slides.length > 0) {
        let currentIndex = 0;

        const moveToSlide = (targetIndex) => {
            const slideWidth = slides[0].getBoundingClientRect().width;
            track.style.transform = `translateX(-${targetIndex * slideWidth}px)`;
            currentIndex = targetIndex;
        };

        const updateButtons = () => {
            prevButton.disabled = currentIndex === 0;
            nextButton.disabled = currentIndex === slides.length - 1;
        };

        nextButton.addEventListener('click', () => {
            if (currentIndex < slides.length - 1) {
                moveToSlide(currentIndex + 1);
                updateButtons();
            }
        });

        prevButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                moveToSlide(currentIndex - 1);
                updateButtons();
            }
        });

        window.addEventListener('resize', () => moveToSlide(currentIndex));
        updateButtons();
    }
}

// --- 2. Main Feed Tab Navigation Logic ---
const tabLinks = document.querySelectorAll('.feed-tab');
const tabPanels = document.querySelectorAll('.feed-panel');

tabLinks.forEach(link => {
    link.addEventListener('click', () => {
        const tabId = link.getAttribute('data-tab');

        tabLinks.forEach(item => item.classList.remove('active'));
        link.classList.add('active');

        tabPanels.forEach(panel => {
            panel.classList.toggle('active', panel.id === tabId);
        });
    });
});

// --- 3. "Load More" Button Logic ---
const loadMoreButtons = document.querySelectorAll('.btn-load-more');
loadMoreButtons.forEach(button => {
    button.addEventListener('click', () => {
        const panel = button.closest('.feed-panel');
        if (!panel) return;

        const hiddenCards = panel.querySelectorAll('.card.hidden-card');
        const cardsToShow = 3;

        for (let i = 0; i < cardsToShow && i < hiddenCards.length; i++) {
            hiddenCards[i].classList.remove('hidden-card');
        }

        // Re-check remaining hidden cards and hide button if none are left
        if (panel.querySelectorAll('.card.hidden-card').length === 0) {
            button.style.display = 'none';
        }
    });
});

// Initial check to hide "Load More" button if there are no hidden cards
tabPanels.forEach(panel => {
    if (panel.querySelectorAll('.card.hidden-card').length === 0) {
        const button = panel.querySelector('.btn-load-more');
        if (button) {
            button.style.display = 'none';
        }
    }
});

// Add styles for disabled slider buttons
const style = document.createElement('style');
style.innerHTML = `.slider-btn:disabled { cursor: not-allowed; opacity: 0.4; }`;
document.head.appendChild(style);