import * as httpRequest from '~/utils/httpRequest';

export const getBooking = async (code, date) => {
    try {
        const response = await httpRequest.get('/booking', {
            params: {
                code,
                date,
            },
        });

        return response.data;
    } catch (error) {
        console.error(error);
        return null;
    }
};
