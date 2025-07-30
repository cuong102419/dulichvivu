import axios from 'axios';
import { useEffect, useState } from 'react';

const usePublicIP = () => {
    const [ip, setIP] = useState('');

    useEffect(() => {
        const fetchIP = async () => {
            try {
                const res = await axios.get('https://api.ipify.org?format=json');
                setIP(res.data.ip);
            } catch (error) {
                console.error(error);
            }
        };

        fetchIP();
    }, []);

    return ip;
}

export default usePublicIP;
