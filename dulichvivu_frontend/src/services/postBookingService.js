import * as httpRequest from '~/utils/httpRequest';

export const postBooking = async (data) => {
    try {
        const response = await httpRequest.post('/booking/pending', data);

        return response.data;
    } catch (error) {
        console.error(error);

        return null;
    }
};
