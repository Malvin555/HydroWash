export default function buildRoute(name, params = {}) {
    const routes = {
        transaction: (slug) => `/user/transaction/${slug}`,
        cancel_order: () => `/user/cancel-order`,
        item_types_delete: (id) => `/admin/item-types/${id}`, 
        item_types_update: () => `/admin/item-types`, 
        feedback_admin_delete: (id) => `admin/feedback/${id}`,
        admin_transaction_delete: (id) => `/admin/transaction/${id}`,
        admin_user_delete: (id) => `/admin/users/${id}`,
        manage_users_update: () => `/admin/users`,
    };

    return routes[name] ? routes[name](params) : null;
}