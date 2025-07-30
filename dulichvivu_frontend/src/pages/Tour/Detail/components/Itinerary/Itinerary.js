function Itinerary({ timelines }) {
    return (
        <div className="accordion-two mt-25 mb-60" id="faq-accordion-two">
            {timelines.map((timeline, index) => (
                <div key={timeline.id} className="accordion-item">
                    <h5 className="accordion-header">
                        <button
                            className="accordion-button collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target={`#collapseTwo${index + 1}`}
                        >
                            NGÀY {index + 1}: {timeline.title}
                        </button>
                    </h5>
                    <div
                        id={`collapseTwo${index + 1}`}
                        className="accordion-collapse collapse"
                        data-bs-parent="#faq-accordion-two"
                    >
                        <div className="accordion-body">
                            <p dangerouslySetInnerHTML={{ __html: timeline.description }} />
                        </div>
                    </div>
                </div>
            ))}
        </div>
    );
}

export default Itinerary;
