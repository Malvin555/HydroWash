export default function buildRoute(name, params = {}) {
    const routes = {
        transaction: (slug) => `/user/transaction/${slug}`,
        cancel_order: () => `/user/cancel-order`,
        item_types_delete: (id) => `/admin/item-types/${id}`, 
        item_types_update: () => `/admin/item-types`, 
    };

    return routes[name] ? routes[name](params) : null;
}