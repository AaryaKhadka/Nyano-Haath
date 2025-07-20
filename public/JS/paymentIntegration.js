document.addEventListener('DOMContentLoaded', () => {
    togglePasswordVisibility();
    setupKhaltiPayment();
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

function setupKhaltiPayment() {
    const khaltiBtn = document.getElementById("khalti-pay-btn");
    const donationForm = document.querySelector("form");
    const campaignTitle = document.querySelector('.campaign-title');

    if (!khaltiBtn || !donationForm) return;

    const khaltiTokenInput = document.getElementById('khalti_token');
    const khaltiIdxInput = document.getElementById('khalti_idx');

    const config = {
        publicKey: "e6dbe38f4d4b4eb8b3fcd3517c071f64", // Test public key
        productIdentity: donationForm.action.split('/').pop(),
        productName: campaignTitle?.textContent.trim() || "Donation",
        productUrl: window.location.href,
        eventHandler: {
            onSuccess(payload) {
                console.log("Payment Success", payload);
                khaltiTokenInput.value = payload.token;
                khaltiIdxInput.value = payload.idx;
                donationForm.submit();
            },
            onError(error) {
                console.error("Khalti Error", error);
                alert("Something went wrong with Khalti payment.");
            },
            onClose() {
                console.log("Khalti Checkout closed.");
            }
        }
    };

    const checkout = new KhaltiCheckout(config);

    khaltiBtn.addEventListener("click", () => {
        const amountInput = document.getElementById("amount");
        const amount = parseFloat(amountInput?.value || 0);

        if (!amount || amount <= 0) {
            alert("Enter a valid donation amount.");
            return;
        }

        checkout.show({ amount: amount * 100 }); // amount in paisa
    });
}
