import * as httpRequest from '../utils/httpRequest';

export const getTour = async (slug) => {
    try {
        let url = `/tour/${slug}`;

        const response = await httpRequest.get(url);

        return response.data;
    } catch (error) {
        console.error(error);

        return null;
    }
};

export const getTourHistory = async (user, page = 1) => {
    try {
        let url = `/booking/history?user_id=${user}&page=${page}`;

        const response = await httpRequest.get(url);

        return response.data;
    } catch (error) {
        console.error(error);

        return null;
    }
};

export const getTourSuggest = async () => {
    try {
        let url = '/tour/suggest';

        const response = await httpRequest.get(url);

        return response.data;
    } catch (error) {
        console.error(error);

        return null;
    }
};
