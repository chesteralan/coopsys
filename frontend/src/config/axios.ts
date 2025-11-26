import axios from "axios";

const axiosInstance = axios.create({
  baseURL: import.meta.env.VITE_API_BASE_URL, // base API prefix
  timeout: 15000,     // 15s timeout (optional)
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
  },
});

// Optional: Request interceptor
axiosInstance.interceptors.request.use(
  (config) => {
    // Example: attach token if needed
    // const token = localStorage.getItem("token");
    // if (token) config.headers.Authorization = `Bearer ${token}`;

    return config;
  },
  (error) => Promise.reject(error)
);

// Optional: Response interceptor
axiosInstance.interceptors.response.use(
  (response) => response,
  (error) => {
    // Optional: global error logging or toast notifications
    // console.error(error);

    return Promise.reject(error);
  }
);

export default axiosInstance;