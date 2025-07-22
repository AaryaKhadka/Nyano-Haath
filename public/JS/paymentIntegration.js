document.addEventListener('DOMContentLoaded', () => {
    togglePasswordVisibility();
    
});

function togglePasswordVisibility() {
    const anonymousCheckbox = document.getElementById('anonymous');
    const passwordSection = document.getElementById('password-section');

    if (!anonymousCheckbox || !passwordSection) return;

    function toggle() {
        passwordSection.style.display = anonymousCheckbox.checked ? 'none' : 'block';
    }

    toggle();
    anonymousCheckbox.addEventListener('change', toggle);
}


