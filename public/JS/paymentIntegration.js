document.addEventListener('DOMContentLoaded', () => {
    togglePasswordVisibility();
    setupPaymentHandler();
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

function setupPaymentHandler() {
    const form = document.getElementById('donation-form');
    if (!form) return;

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const name = form.querySelector('#name').value.trim();
        const email = form.querySelector('#email').value.trim();
        const amount = form.querySelector('#amount').value.trim();
        const purchaseOrderName = form.querySelector('input[name="purchase_order_name"]').value.trim();
        const campaignId = form.dataset.campaignId;
        const anonymous = form.querySelector('#anonymous').checked;
        const password = form.querySelector('#password').value;

        if (!name && !anonymous) {
            alert('Please enter your full name or choose to donate anonymously.');
            return;
        }
        if (!email && !anonymous) {
            alert('Please enter your email or choose to donate anonymously.');
            return;
        }
        if (!amount || isNaN(amount) || Number(amount) < 1) {
            alert('Please enter a valid donation amount of at least 1 NPR.');
            return;
        }

        try {
            const response = await fetch('/khalti/initiate-payment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    amount: amount,
                    purchase_order_name: purchaseOrderName,
                    return_url: window.location.origin + '/donate/verify',
                    website_url: window.location.origin,
                    campaign_id: campaignId,
                    name: name,
                    email: email,
                    anonymous: anonymous,
                    password: password
                })
            });

            if (!response.ok) {
                const errorData = await response.json();
                alert(errorData.message || 'Error initiating payment. Please try again.');
                return;
            }

            const data = await response.json();

            if (data.payment_url) {
                window.location.href = data.payment_url;
            } else {
                alert('Error initiating payment. Please try again.');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Failed to process donation. Please try again later.');
        }
    });
}
