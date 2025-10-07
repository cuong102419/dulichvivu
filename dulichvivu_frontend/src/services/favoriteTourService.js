import * as httpRequest from '~/utils/httpRequest';

export const postFavoriteTour = async (data) => {
    try {
        const response = await httpRequest.post('/favorite-tours/create', data);
        return response.data;
    } catch (error) {
        console.error('Error posting favorite tour:', error);
        throw error;
    }
}

export const getFavoriteTours = async (userId) => {
    try {
        const response = await httpRequest.get(`/favorite-tours/${userId}`);
        return response.data;
    } catch (error) {
        console.error('Error fetching favorite tours:', error);
        throw error;
    }
}
