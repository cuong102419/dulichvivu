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
}