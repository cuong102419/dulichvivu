import * as httpRequest from '~/utils/httpRequest';

export const login = async (data) => {
    try {
        const response = await httpRequest.post('/login', data);

        localStorage.setItem('auth_token', response.data.token);
        window.dispatchEvent(new Event('auth-changed'));

        return response;
    } catch (error) {
        return {
            ...error.response,
            data: {
                ...error.response?.data,
                _error: true,
            },
        };
    }
};
