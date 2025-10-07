import * as httpRequest from "~/utils/httpRequest"

export const getUser = async () => {
    try {
        const response = await httpRequest.get('/user');

        return response.data;
    } catch (error) {
        console.error(error);
        return null;
    }
}

export const updateUser = async (id, data) => {
    try {
        const response = await httpRequest.post(`/profile/${id}/update`, data, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        return response.data;
    } catch (error) {
        console.error(error);
        return null;
    }
}