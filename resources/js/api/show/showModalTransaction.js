import initializeModal from "../../modal";
import fetchDetailToModal from "./fetchDetailToModal";
import buildRoute from "../../utils/buildRoute";
import { strSlug } from "../../utils/string";

initializeModal('showModalTransaction', async ({ slug }) => {
    await fetchDetailToModal({
        id: strSlug(slug),
        url: "/admin/service/transaction",
        renderFn: renderModalTransaction,
    });
});

function renderModalTransaction(response) {
    const modal = document.getElementById("modalTransaction");
    const modalContent = modal.querySelector(".modal-data");
    const data = response.data;
    
    if (!data) return;

    modalContent.querySelector('h2').textContent = `Pay ${data?.name_ironing ?? data?.name_laundry}`;
    modalContent.querySelector('input[name="service-type"]').value = data?.name_ironing ?? data?.name_laundry ?? '';
    modalContent.querySelector('img').src = '/storage/' + data?.item_type?.image_item;
    modalContent.querySelector('input#amount').placeholder = `${data?.amount_item}pcs (${new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    }).format(data?.price_ironing ?? data?.price_laundry)})`;
    modalContent.querySelector('input#amount').value = `${data?.amount_item}pcs (${new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    }).format(data?.price_ironing ?? data?.price_laundry)})`;
}