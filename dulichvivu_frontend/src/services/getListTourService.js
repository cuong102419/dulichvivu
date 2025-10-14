import * as httpRequest from '~/utils/httpRequest';

export const getListTour = async (page = 1, perPage, area = '', startDate = '', endDate = '', rating = '', minPrice = '', maxPrice = '') => {
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

        if (rating) {
            url += `&rating=${rating}`;
        }

        if(minPrice !== '' && maxPrice !== '') {
            url += `&min_price=${minPrice}&max_price=${maxPrice}`
        }
        const response = await httpRequest.get(url);

        return response.data;
    } catch (error) {
        console.error(error);
        return null;
    }
};
