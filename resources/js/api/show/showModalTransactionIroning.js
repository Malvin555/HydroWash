import initializeModal from "../../modal";
import fetchDetailToModal from "./fetchDetailToModal";
import buildRoute from "../../utils/buildRoute";
import { strSlug } from "../../utils/string";

initializeModal('showModalTransactionIroning', async ({ slug }) => {
    await fetchDetailToModal({
        id: strSlug(slug),
        url: "/admin/ironing/transaction",
        renderFn: renderModalTransactionIroning,
    });
});

function renderModalTransactionIroning(response) {
    const modal = document.getElementById("modalTransaction");
    const modalContent = modal.querySelector(".modal-data");
    const data = response.data;

    if (!data) return;

    modalContent.querySelector('h2').textContent = `Pay ${data?.name_ironing}`;
    modalContent.querySelector('input[name="service-type"]').value = data?.name_ironing ?? '';
    modalContent.querySelector('img').src = '/storage/' + data?.item_type?.image_item;
    modalContent.querySelector('input#amount').placeholder = `${data?.amount_item}pcs (${new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    }).format(data?.price_ironing)})`;
    modalContent.querySelector('input#amount').value = `${data?.amount_item}pcs (${new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    }).format(data?.price_ironing)})`;
}