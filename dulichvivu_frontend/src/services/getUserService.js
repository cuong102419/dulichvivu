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