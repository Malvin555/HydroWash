import axios from "axios";

const api = axios.create({
    baseURL: import.meta.env.VITE_API_BASE_URL,
    headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "Authorization": `Bearer ${localStorage.getItem("api_token")}`,
        'X-USER-ID': localStorage.getItem("ref_id"),
    },
    // withCredentials: true,   
});

export default api;