import { useEffect, useState } from 'react';
import Swal from 'sweetalert2';
import { postFavoriteTour } from '~/services/favoriteTourService';

function FavoriteTour({ tourId, userId, favorites }) {
    const [isFavorite, setIsFavorite] = useState(false);

    useEffect(() => {
        if (Array.isArray(favorites) && favorites.some((fav) => fav.tour_id === tourId)) {
            setIsFavorite(true);
        } else {
            setIsFavorite(false);
        }
    }, [favorites, tourId]);

    const handleSubmit = async (e) => {
        e.preventDefault();

        if (!userId) {
            Swal.fire({
                icon: 'warning',
                title: 'Vui lòng đăng nhập để sử dụng chức năng này!',
                confirmButtonText: 'OK',
            });
            return;
        }

        try {
            const res = await postFavoriteTour({ user_id: userId, tour_id: tourId });
            if (res?.status) {
                Swal.fire({
                    title: 'Thành công!',
                    text: res.message,
                    icon: 'success',
                    confirmButtonText: 'OK',
                });
            }
        } catch (error) {
            Swal.fire({
                title: 'Thất bại!',
                text: 'Đã có lỗi xảy ra, vui lòng thử lại sau.',
                icon: 'error',
                confirmButtonText: 'OK',
            });
        }
    };

    return (
        <button onClick={handleSubmit} className={`heart ${isFavorite ? 'active' : ''}`}>
            <i className={`fas fa-heart${isFavorite ? '-broken' : ''}`}></i>
        </button>
    );
}

export default FavoriteTour;
