import api from "./axios";
import { getUrlParams, updateQueryString } from "../utils/queryStr";
import { hideLoader, showLoader } from "../utils/loader";
import { debounce } from "../utils/debounce";

const historyList = document.getElementById("historyList");
const paginationContainer = document.getElementById('pagination-container');
const searchInput = document.getElementById("search");

async function getHistoryUser(search) {
    const queryString = getUrlParams("search", search);
    showLoader();

    try {
        const response = await api.get(`/user/history${queryString}`);
        if (response.statusText !== "OK") {
            throw new Error(`Error: ${response.statusText}`);
        }

        updateQueryString("search", search);

        if (response.data.status === "success") {
            renderHistoryList(response.data)
        }
    } catch (error) {
        console.error("Error fetching history user:", error);
    } finally {
        hideLoader();
    }
}

const debouncedCallApi = debounce(getHistoryUser, 500);
if (searchInput) {
    searchInput.addEventListener("input", function (e) {
        const searchValue = e.target.value.trim();

        debouncedCallApi(searchValue);
    });
}


function renderHistoryList(data) {
    console.log("History user", data);
    historyList.innerHTML = "";
    paginationContainer.innerHTML = '';

    if (data.data.length === 0) {
        historyList.innerHTML = `
            <div class="w-full bg-secondary rounded-sm flex items-center justify-center py-2 px-6">
                <h1 class="text-primary md:text-lg font-semibold">No History Found</h1>
            </div>
        `;
        return;
    }

    data.data.forEach((item) => {
        historyList.innerHTML += `
            <div data-modal-target="modalInformationUser"
                class="w-full bg-secondary cursor-pointer rounded-sm flex items-center justify-between py-2 px-6"
                    data-id="${item?.id}" data-type="${item?.type}">
                <div>
                    <h1 class="text-primary flex justify-center items-center gap-3 md:text-lg font-semibold">${item?.name}
                        ${item?.isCanceled ? `
                            <p class="text-red-500 text-[.6rem] md:text-sm font-semibold">(This data has been canceled)</p>
                        ` : ''}
                    </h1>
                    <p class="text-[.6rem] md:text-sm flex items-center gap-1">
                    ${
                        !item?.address_delivery
                            ? "No Address"
                            : `<svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" viewBox="0 0 384 512">
                        <path
                            d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                        </svg>${item?.address_delivery}`
                    }
                    </p>
                </div>
                <div class="flex flex-col items-end">
                    <h1 class="w-[6rem] md:w-[60%] rounded-sm text-[.8rem] font-bold py-1 px-4 text-center ${
                        item?.status === "pending"
                            ? "bg-btn text-[#6D6969]"
                            : item?.status === "process"
                            ? "bg-proccess text-[#9F8D04]"
                            : item?.status === "completed"
                            ? "bg-success text-[#399707]"
                            : ""
                    }">
                    ${
                        item?.status
                            ? item?.status.charAt(0).toUpperCase() + item?.status.slice(1)
                            : ""}
                    </h1>
                    <p class="text-[.6rem] md:text-sm flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" viewBox="0 0 448 512">
                        <path
                        d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm80 64c-8.8 0-16 7.2-16 16l0 96c0 8.8 7.2 16 16 16l96 0c8.8 0 16-7.2 16-16l0-96c0-8.8-7.2-16-16-16l-96 0z" />
                    </svg> Submitted at ${new Date(
                        item?.created_at
                    ).toLocaleDateString("id-ID", {
                        day: "2-digit",
                        month: "long",
                        year: "numeric",
                    })}
                    </p>
                </div>
            </div>
        `;
    });


    paginationContainer.innerHTML = data.pagination;
}
