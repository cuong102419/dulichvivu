import * as httpRequest from '~/utils/httpRequest';

export const register = async (data) => {
    try {
        const response = await httpRequest.post('/signup', data);

        return response.data;
    } catch (error) {
        console.error(error);

        return null;
    }
};
