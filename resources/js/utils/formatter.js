export function formatCurrency(value) {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    }).format(value);
}

export function formatDate(date) {
    if (!date) return "-";
    return new Date(date).toLocaleDateString("id-ID", {
        day: "2-digit",
        month: "long",
        year: "numeric",
    });
}

// export function formatDate(date) {
//     if (!date) return "-";
//     return new Date(date).toLocaleDateString("id-ID", {
//         day: "2-digit",
//         month: "2-digit",
//         year: "numeric",
//     });
// }
