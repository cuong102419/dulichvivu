import * as httpRequest from '~/utils/httpRequest';

const checkEmail = async (email) => {
    try {
        const res = await httpRequest.post('/check-email', { email });

        return res.data.exists;
    } catch (error) {
        console.error(error);
        return false;
    }
};

export default checkEmail;
