import * as httpRequest from '~/utils/httpRequest';

export const getRating = async (code) => {
    try {
        let url = `/rating/${code}`;

        const response = await httpRequest.get(url);
        return response.data;
    } catch (error) {
        console.log(error);
        return null;
    }
};

export const postReview = async (data) => {
    try {
        const response = await httpRequest.post('/rating/store', data);

        return response.data;
    } catch (error) {
        console.log(error);
        return null;
    }
};

export const getListReview = async (tourId) => {
    try {
        let url = `/reviews/${tourId}`;
        const response = await httpRequest.get(url);
        return response.data;
    } catch (error) {
        console.log(error);
        return null;
    }
};
