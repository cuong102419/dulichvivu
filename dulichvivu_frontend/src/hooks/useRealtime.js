import { useEffect } from 'react';
import echo from '~/utils/echo';

export default function useRealtime(channelName, eventName, callback) {
    useEffect(() => {
        const channel = echo.channel(channelName);
        channel.listen(`.${eventName}`, (data) => callback(data));

        return () => {
            echo.leave(channelName);
        };
    }, [channelName, eventName, callback]);
}
