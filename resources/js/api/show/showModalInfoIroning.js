import initializeModal from "../../modal";
import fetchDetailToModal from "./fetchDetailToModal";
import buildRoute from "../../utils/buildRoute";
import { formatCurrency, formatDate } from "../../utils/formatter";
import { ucFirst } from "../../utils/string";

initializeModal('showModalInfoIroning', async ({ id }) => {
    await fetchDetailToModal({
        id: id,
        url: "/admin/ironing",
        renderFn: renderModalInforIroning,
    });
});

function renderModalInforIroning(response) {
    const modal = document.getElementById("modalInformationIroning");
    const data = response.data;

    if (!data) {
        return;
    }

    const modalContent = modal.querySelector(".modal-data");

    modalContent.innerHTML = `
        <h2 class="text-xl text-center text-primary font-bold tracking-wide mb-4">${data?.name_ironing}</h2>

        <div class="space-y-4">

            ${renderModalHeader(data?.user)}

            <div class="">
                <label class="text-sm font-bold text-primary">Order Information</label>
                <div class="grid grid-cols-2 gap-2">
                    <img src="${'/storage/' + data?.item_type?.image_item}" alt="image ironing">
                    <div class="flex flex-col gap-2 justify-between">
                        <input type="text" disabled name="amount-item" id="amount-item" class="bg-secondary placeholder:text-primary px-4 py-2 w-full rounded-md outline-0" placeholder="${data?.amount_item} Pcs">
                        <input type="text" disabled name="price_laundry" id="price_laundry" class="bg-secondary placeholder:text-primary px-4 py-2 w-full rounded-md outline-0" placeholder="${formatCurrency(data?.price_ironing)}">
                        <input type="text" disabled name="status_transaction" id="status_transaction" class="bg-secondary placeholder:text-primary px-4 py-2 w-full rounded-md outline-0" placeholder="${ucFirst(data?.status_transaction)}">
                    </div>
                </div>
            </div>

            <div>
                <label class="text-sm font-bold text-primary">Retrieval Method</label>
                <input type="text" disabled class="bg-secondary placeholder:text-primary px-4 py-2 w-full rounded-md outline-none text-sm" placeholder="${ucFirst(data?.retrieval_method)}">
            </div>

            ${data?.retrieval_method === 'delivery' ? 
                `
                    <div class="grid grid-cols-1 gap-2">
                        <label for="address" class="text-sm font-bold text-primary">Address Information</label>
                        <div class="flex items-start gap-2 bg-secondary text-primary px-4 py-2 mt-1 rounded-md text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-4 mt-1" viewBox="0 0 576 512">
                                <path fill="currentColor"
                                    d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                            </svg>
                            <input type="text" disabled name="address" id="address" placeholder="${data?.address_taking}"
                                class="bg-transparent focus:outline-none w-full placeholder:text-primary" />
                        </div>
                        <div class="flex items-center gap-2 bg-secondary text-primary px-4 py-2 mt-1 rounded-md text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-4" viewBox="0 0 448 512">
                                <path fill="currentColor"
                                    d="M320 48a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM204.5 121.3c-5.4-2.5-11.7-1.9-16.4 1.7l-40.9 30.7c-14.1 10.6-34.2 7.7-44.8-6.4s-7.7-34.2 6.4-44.8l40.9-30.7c23.7-17.8 55.3-21 82.1-8.4l90.4 42.5c29.1 13.7 36.8 51.6 15.2 75.5L299.1 224l97.4 0c30.3 0 53 27.7 47.1 57.4L415.4 422.3c-3.5 17.3-20.3 28.6-37.7 25.1s-28.6-20.3-25.1-37.7L377 288l-70.3 0c8.6 19.6 13.3 41.2 13.3 64c0 88.4-71.6 160-160 160S0 440.4 0 352s71.6-160 160-160c11.1 0 22 1.1 32.4 3.3l54.2-54.2-42.1-19.8zM160 448a96 96 0 1 0 0-192 96 96 0 1 0 0 192z" />
                            </svg>
                            <input type="text" disabled name="address" id="address" placeholder="${data?.address_delivery}"
                                class="bg-transparent focus:outline-none w-full placeholder:text-primary" />
                        </div>
                    </div>
                ` : ''}

            <div class="flex flex-col">
                <label for="notes" class="text-sm font-bold text-primary mb-1">Notes</label>
                <textarea name="notes" disabled id="notes" placeholder="${data?.notes_ironing}"
                    class="bg-secondary placeholder:text-primary px-4 py-2 w-full h-32 rounded-md resize-none outline-none text-sm"></textarea>
            </div>

            <div class="flex items-center gap-2">
                <p class="text-sm font-bold text-primary">Status</p>
                <div class="py-1 px-6 rounded-md text-sm 
                    ${data?.status === "pending"
                        ? "bg-btn text-[#6D6969]"
                        : data?.status === "process"
                        ? "bg-proccess text-[#9F8D04]"
                        : data?.status === "completed"
                        ? "bg-success text-[#399707]"
                    : ""}
                ">${ucFirst(data?.status)}</div>
            </div>

            <div class="flex items-center gap-2">
                <p class="text-sm font-bold text-primary">Estimation : </p>
                <div class="text-primary font-bold">${formatDate(data?.estimation)}</div>
            </div>

            <div class="grid grid-cols-2 gap-2 bg-white">
                <div data-close-button
                    class="close-button flex justify-center items-center w-full h-fit px-4 py-2 rounded-md bg-primary text-white font-medium cursor-pointer">
                    Close
                </div>
                <form action="${buildRoute('ironing_delete', data?.id)}" method="POST" class="inline" onsubmit="return confirm('Are you sure to want delete this?')">
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

function renderModalHeader(data) {
    return `
        <div class="w-full bg-secondary p-2 px-6 text-primary">
            <p class="text-right mb-2">${data?.email}</p>
            <div class="flex items-center gap-4 mb-2">
                <div class="h-25 w-25 rounded-full bg-white flex items-center border border-primary justify-center text-primary font-medium text-5xl uppercase">
                    ${data?.name.substr(0, 2)}
                </div>
                <div>
                    <h1 class="font-medium text-2xl">${data?.name} (${data?.id})</h1>
                    <p class="text-[.8rem]">${data?.telp ?? 'No Telp'}</p>
                </div>
            </div>
            <p class="text-right">${formatDate(data?.created_at)}</p>
        </div>
    `;
}