import axios from 'axios';

const httpRequest = axios.create({
    baseURL: process.env.REACT_APP_BASE_URL,
});

httpRequest.interceptors.request.use((config) => {
    const token = localStorage.getItem('auth_token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});

export const get = async (path, options = {}) => {
    const response = await httpRequest.get(path, options);

    return response;
};

export const post = async (path, data = {}, options = {}) => {
    const response = await httpRequest.post(path, data, options);

    return response;
};

export const put = async (path, data = {}, options = {}) => {
    const response = await httpRequest.put(path, data, options);

    return response;
};

export const del = async (path, options = {}) => {
    const response = await httpRequest.delete(path, options);

    return response;
};

export default httpRequest;
