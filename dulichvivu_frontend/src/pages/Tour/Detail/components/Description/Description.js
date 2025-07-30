function Description({ description }) {
    return (
        <div className="tour-details-content">
            <h3>Tổng quan</h3>
            <p dangerouslySetInnerHTML={{ __html: description }} />
            {/* <div className="row pb-55">
                <div className="col-md-6">
                    <div className="tour-include-exclude mt-30">
                        <h5>Bao gồm</h5>
                        <ul className="list-style-one check mt-25">
                            <li>
                                <i className="far fa-check"></i> Dịch vụ đón và tiễn
                            </li>
                            <li>
                                <i className="far fa-check"></i> Một bữa ăn mỗi ngày
                            </li>
                            <li>
                                <i className="far fa-check"></i> Sự kiện âm nhạc
                            </li>
                            <li>
                                <i className="far fa-check"></i> Tham quan 7 địa điểm tốt nhất trong thành phố
                            </li>
                            <li>
                                <i className="far fa-check"></i> Nước đóng chai trên xe buýt
                            </li>
                            <li>
                                <i className="far fa-check"></i> Xe buýt du lịch hạng sang
                            </li>
                        </ul>
                    </div>
                </div>
                <div className="col-md-6">
                    <div className="tour-include-exclude mt-30">
                        <h5>Không bao gồm</h5>
                        <ul className="list-style-one mt-25">
                            <li>
                                <i className="far fa-times"></i> Tiền tip
                            </li>
                            <li>
                                <i className="far fa-times"></i> Dịch vụ đón và tiễn khách sạn
                            </li>
                            <li>
                                <i className="far fa-times"></i> Bữa trưa, Thức ăn & Đồ uống
                            </li>
                            <li>
                                <i className="far fa-times"></i> Tùy chọn nâng cấp lên ly
                            </li>
                            <li>
                                <i className="far fa-times"></i> Dịch vụ bổ sung
                            </li>
                            <li>
                                <i className="far fa-times"></i> Bảo hiểm
                            </li>
                        </ul>
                    </div>
                </div>
            </div> */}
        </div>
    );
}

export default Description;
