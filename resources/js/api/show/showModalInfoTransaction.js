import initializeModal from "../../modal";
import fetchDetailToModal from "./fetchDetailToModal";
import buildRoute from "../../utils/buildRoute";
import { ucFirst } from "../../utils/string";

initializeModal('showModalInfoTransaction', async ({ id }) => {
    await fetchDetailToModal({
        id: id,
        url: "/admin/transaction",
        renderFn: renderModalInfoTransaction,
    });
});

function renderModalInfoTransaction(response) {
    const modal = document.getElementById("modalInformationTransaction");
    const modalContent = modal.querySelector(".modal-data");
    const data = response.data;

    const serviceName = data?.ironing ? 'ironing' : 'laundry';

    if (!data) return;

    modalContent.innerHTML = `
        <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">Pay ${data?.[serviceName]?.[`name_${serviceName}`]}</h2>

        <div class="space-y-4">

            <div>
                <label class="text-sm font-bold text-primary">Detail (${ucFirst(data?.[serviceName]?.status)})</label>
                <div>
                    <img src="${data?.[serviceName]?.item_type?.image_item ? '/storage/' + data?.[serviceName]?.item_type?.image_item : ''}" alt="" class="rounded-md w-full h-75 my-4">
                    <input type="text" disabled class="bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0" 
                    placeholder="${data?.[serviceName]?.amount_item}pcs (${new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                    }).format(data?.[serviceName]?.[`price_${serviceName}`])})"
                    
                    value="${data?.[serviceName]?.amount_item}pcs (${new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                    }).format(data?.[serviceName]?.[`price_${serviceName}`])})">
                </div>
            </div>

            <div>
                <label for="method" class="block text-sm font-bold text-primary mb-4">Transaction Method</label>
                <input type="text" disabled class="col-span-1 bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 rounded-md text-sm outline-0" 
                placeholder="${data?.method.charAt(0).toUpperCase() + data?.method.slice(1)}" 
                value="${data?.method.charAt(0).toUpperCase() + data?.method.slice(1)}">
            </div>

            ${data?.method === 'debit' ? `
                <div class="grid grid-cols-4 gap-2">
                    <input type="text" disabled class="col-span-1 bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0" placeholder="${data?.bank_name}" value="${data?.bank_name}">
                    <input type="text" disabled class="col-span-3 bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0" placeholder="${data?.card_number}" value="${data?.card_number}">
                    <input type="text" disabled class="col-span-4 bg-secondary w-full text-primary placeholder:text-primary placeholder:font-bold px-4 py-2 mt-1 rounded-md text-sm outline-0" placeholder="${data?.postal_code}" value="${data?.postal_code}">
                </div>
                ` : ''}

            <div class="grid grid-cols-2 gap-2 bg-white">
                <div data-close-button
                    class="close-button flex justify-center items-center w-full h-fit px-4 py-2 rounded-md bg-primary text-white font-medium cursor-pointer">
                    Close
                </div>
                <form action="${buildRoute('admin_transaction_delete', data?.id)}" method="POST" class="inline" onsubmit="return confirm('Are you sure to want delete this?')">
                    <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').content}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="flex justify-center items-center w-full px-4 py-2 rounded-md bg-red-600 text-white font-medium cursor-pointer">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    `;
}