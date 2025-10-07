import Title from "~/components/Title";

function Error() {
    return (
        <>
            <Title>
                Lỗi - 404 not found
            </Title>
            <section className="error-area pt-70 pb-100 rel z-1">
                <div className="container">
                    <div className="row align-items-center justify-content-between">
                        <div className="col-xl-5 col-lg-6">
                            <div className="error-content rmb-55">
                                <h1>OPPS! </h1>
                                <div className="section-title mt-15 mb-25">
                                    <h2>Có vẻ như trang bạn tìm kiếm không tồn tại</h2>
                                </div>
                                <p>
                                    Bạn có thể tham khảo các trang khác trên website của chúng tôi.
                                </p>
                            </div>
                        </div>
                        <div className="col-xl-5 col-lg-6">
                            <div className="error-images">
                                <img src="/assets/images/newsletter/404.png" alt="404 Error" />
                                </div>
                            </div>
                    </div>
                </div>
            </section>
        </>
    );
}

export default Error;
