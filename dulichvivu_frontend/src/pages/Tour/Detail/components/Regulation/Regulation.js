function Regulation({ rules }) {
    return (
        <div className="tour-details-content mb-70">
            <h3>Quy định</h3>
            <p dangerouslySetInnerHTML={{ __html: rules }}></p>
        </div>
    );
}

export default Regulation;
