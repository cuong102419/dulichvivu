import { format, parse, parseISO } from 'date-fns';
import { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import DateInput from '~/components/DateInput';

function Sidebar({ departures, tour }) {
    const [selectedDate, setSelectedDate] = useState(null);
    const allowedDates = departures.map((dep) => dep.start_date);
    const selectedDeparture = selectedDate
        ? departures.find((d) => d.start_date === format(selectedDate, 'yyyy-MM-dd'))
        : null;

    useEffect(() => {
        if (departures && departures.length > 0) {
            setSelectedDate(parseISO(departures[0].start_date));
        }
    }, [departures]);

    return (
        <div className="blog-sidebar tour-sidebar">
            <div className="widget widget-booking">
                <h5 className="widget-title">Đặt Tour</h5>
                <div className="date mb-25">
                    <b>Khởi hành</b>
                    <DateInput
                        value={selectedDate}
                        onChange={setSelectedDate}
                        startDate={[
                            (date) => {
                                const d = format(date, 'yyyy-MM-dd');
                                return !allowedDates.includes(d);
                            },
                        ]}
                    />
                </div>
                <div className="time py-5">
                    <b>Giờ đi:</b>
                    <span>
                        {selectedDeparture
                            ? format(parse(selectedDeparture.departure_time, 'HH:mm:ss', new Date()), 'HH:mm')
                            : '--:--'}
                    </span>
                </div>
                <div className="time py-5">
                    <b>Thời gian:</b>
                    <span>{tour?.duration}</span>
                </div>
                <hr />
                <div className="price mt-40 mb-20 text-center">
                    <h4 className="text-danger fw-bold">
                        {selectedDeparture ? selectedDeparture.price_adult.toLocaleString('vi-VN') + ' VNĐ' : '---'}
                    </h4>
                </div>
                <Link
                    to={`/booking?code=${tour?.code}&date=${selectedDate ? format(selectedDate, 'yyyy-MM-dd') : ''}`}
                    onClick={(e) => {
                        if (!selectedDate) {
                            e.preventDefault();
                        }
                    }}
                    className="theme-btn style-two w-100 mt-15 mb-5"
                >
                    <span data-hover="Đặt ngay">Đặt ngay</span>
                    <i className="fal fa-arrow-right"></i>
                </Link>
            </div>
            <div className="widget widget-contact">
                <h5 className="widget-title">Lưu ý</h5>
                <span>
                    Bạn cần chọn ngày khởi hành trước 1 tuần, đối với tour quốc tế chọn trước 1 tháng để công ty có thời gian
                    chuẩn bị thủ tục.
                </span>
            </div>
        </div>
    );
}

export default Sidebar;
