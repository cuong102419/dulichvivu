import classNames from 'classnames/bind';
import styles from './Note.module.scss';

const cx = classNames.bind(styles);

function Note({ note, setNote }) {
    return (
        <div className="mt-40">
            <div className="title mb-40">
                <h5 className="fw-bold">Ghi Chú</h5>
            </div>
            <div className={cx('content')}>
                <textarea className={cx('note')} value={note} onChange={(e) => setNote(e.target.value)} placeholder="Ghi chú thêm"></textarea>
            </div>
        </div>
    );
}

export default Note;
