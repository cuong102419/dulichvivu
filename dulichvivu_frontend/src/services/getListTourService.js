import * as httpRequest from '~/utils/httpRequest';

export const getListTour = async (page = 1, perPage, area = '') => {
    try {
        let url = `/tour/list?page=${page}&per_page=${perPage}`;

        if (area) {
            url += `&area=${area}`;
        }

        const response = await httpRequest.get(url);

        return response.data;
    } catch (error) {
        console.error(error);
        return null;
    }
};
