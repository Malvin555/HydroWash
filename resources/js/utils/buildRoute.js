export default function buildRoute(name, params = {}) {
    const routes = {
        transaction: (slug) => `/user/transaction/${slug}`,
        cancel_order: () => `/user/cancel-order`,
    };

    return routes[name] ? routes[name](params) : null;
}