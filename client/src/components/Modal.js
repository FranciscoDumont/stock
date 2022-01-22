import './Modal.css'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faTimes } from '@fortawesome/free-solid-svg-icons';

function Modal({ showModal, setShowModal }) {
  if (showModal){
    return (
      <div className="modal-background" onClick={() => setShowModal(false)}>
        <div className="modal-wrapper" onClick={(e) => e.stopPropagation()}>
          <div className="modal-close-button" onClick={() => setShowModal(false)}>
            <FontAwesomeIcon icon={faTimes}/>
          </div>
          <div>
            <input type="text"/>
            <p>como estas?</p>
          </div>
          <div>
            <h2>Todo bien</h2>
          </div>
        </div>
      </div>
    )
  } else {
    return <></>
  }
}

export default Modal;
