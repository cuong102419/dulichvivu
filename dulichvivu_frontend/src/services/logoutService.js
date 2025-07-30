export const logout = async () => {
    try {
        localStorage.removeItem('auth_token');
        window.dispatchEvent(new Event('auth-changed'));

        return true;
    } catch (error) {
        console.error(error.response?.data);

        return false;
    }
};
