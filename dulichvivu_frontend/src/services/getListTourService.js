import * as httpRequest from '~/utils/httpRequest';

export const getListTour = async (page = 1, perPage, area = '', startDate = '', endDate = '') => {
    try {
        let url = `/tour/list?page=${page}&per_page=${perPage}`;

        if (area) {
            url += `&area=${area}`;
        }

        if (startDate) {
            url += `&start_date=${startDate}`;
        }

        if (endDate) {
            url += `&end_date=${endDate}`;
        }

        const response = await httpRequest.get(url);

        return response.data;
    } catch (error) {
        console.error(error);
        return null;
    }
};
