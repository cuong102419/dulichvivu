import * as httpRequest from '~/utils/httpRequest';

export const getHomeTour = async () => {
    try {
        const response = await httpRequest.get('/most-popular');

        return response.data;
    } catch (error) {
        console.error(error);
        return null;
    }
};
