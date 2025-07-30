import { useEffect, useState } from 'react';
import { getUser } from '~/services/getUserService';

function useAuth() {
    const [user, setUser] = useState(null);
    const [isLoading, setIsLoading] = useState(true);

    const fetchUser = async () => {
        const token = localStorage.getItem('auth_token');
        if (!token) {
            setUser(null);
            setIsLoading(false);
            return;
        }

        const userData = await getUser();
        setUser(userData);
        setIsLoading(false);
    };

    useEffect(() => {
        fetchUser();

        const handleAuthChange = () => {
            fetchUser();
        };

        window.addEventListener('auth-changed', handleAuthChange);

        return () => {
            window.removeEventListener('auth-changed', handleAuthChange);
        };
    }, []);

    return {
        user,
        isLog: !!user,
        isLoading,
    };
}

export default useAuth;
