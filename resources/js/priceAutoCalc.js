document.addEventListener("DOMContentLoaded", function () {
    let price = 0;
    const amountInput = document.querySelector('input[name="amount"]');
    const priceTotalInput = document.querySelector('input[name="price-total"]');
    const retrivalMethodInput = document.querySelector(
        'select[name="retrival-method"]'
    );
    const deliveryAddressBox = document.querySelector(".delivery-address-box");

    document.addEventListener("click", function (e) {
        if (e.target.closest('input[name="type"]')) {
            price = e.target.closest('input[name="type"]')?.dataset.price ?? 0;
            amountInput.disabled = false;

            const elemInputs = document.querySelectorAll('input[name="type"]');
            elemInputs.forEach(elem => {
                elem.closest("label").style.border = "4px solid transparent";
            });

            e.target.closest('input[name="type"]').closest("label").style.border = "4px solid #00879E";

            setPriceTotal();
        }
    });

    amountInput.addEventListener("input", function () {
        setPriceTotal();
    });

    function setPriceTotal() {
        let amount = amountInput.value * price;
        if (isNaN(amount)) {
            amount = 0;
        }

        priceTotalInput.value = `Rp ${amount.toLocaleString("id-ID")}`;
    }

    retrivalMethodInput.addEventListener("change", function () {
        toggleDeliveryAddressBox();
    });

    toggleDeliveryAddressBox();

    function toggleDeliveryAddressBox() {
        if (retrivalMethodInput.value === "delivery") {
            deliveryAddressBox.classList.add("flex");
            deliveryAddressBox.classList.remove("hidden");
        } else {
            deliveryAddressBox.classList.add("hidden");
            deliveryAddressBox.classList.remove("flex");
        }
    }
});
