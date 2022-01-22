import './AddItemButton.css'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faPlus } from '@fortawesome/free-solid-svg-icons';
import Modal from './Modal';
import { useState } from 'react';

function AddItemButton(props) {
  const [showModal, setShowModal] = useState(false);

  const openModal = () => {
    setShowModal(!showModal);
  }

  return (
    <>
      <button className='add-item-button' onClick={openModal}>
        <FontAwesomeIcon icon={faPlus}/>
      </button>
      <Modal showModal={showModal} setShowModal={setShowModal}/>
    </>
  )

}

export default AddItemButton;