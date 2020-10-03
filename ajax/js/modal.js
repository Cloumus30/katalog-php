const modal = document.querySelectorAll('.modal');
const button = document.querySelectorAll('.modalBtn');
const closeModal = document.querySelectorAll('.closeModal');

// button.addEventListener('click', displayModal);

// function displayModal() {
//     modal.style.display = 'flex';
// }
button.forEach(display);


const displayModal = id => {
    const modals = document.getElementById(id);
    modals.parentElement.style.display = 'block'
    modals.style.display = 'grid';

}


function display(item) {
    item.addEventListener('click', clickEvent => {
        const trigger = clickEvent.target;
        const modalId = trigger.getAttribute('data-modal-id');
        displayModal(modalId);
    })
}

for (let i = 0; i < closeModal.length; i++) {
    closeModal[i].addEventListener('click', (event) => {
        event.target.parentElement.parentElement.style.animation = 'fadeBack 1s forwards';
        event.target.parentElement.parentElement.parentElement.style.animation = 'fadeBack 1s forwards';

        const modalss = event.target;
        setTimeout(noneDis, 1000, modalss);


        // event.target.parentElement.parentElement.style.display = 'none';
        // event.target.parentElement.parentElement.parentElement.style.display = 'none';
    })

    function noneDis(modalss) {
        // modalss.parentElement.parentElement.style.display = 'none';
        // modalss.parentElement.parentElement.style.animation = 'none';
        modalss.parentElement.parentElement.removeAttribute('style');
        // modalss.parentElement.parentElement.parentElement.style.display = 'none';
        // modalss.parentElement.parentElement.parentElement.style.animation = 'none';
        modalss.parentElement.parentElement.parentElement.removeAttribute('style');
    }
}

// const modal = document.querySelector('.modal');
// const button = document.querySelectorAll('.modalBtn');

// for (let i = 0; i < button.length; i++) {
//     button[i].addEventListener('click', event => {
//         event.target.parentElement
//     });

// }