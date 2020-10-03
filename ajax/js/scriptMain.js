// toggle Bar Menu smartphone mode
const menuBar = document.querySelector('.menuBar');
const ulFlex = document.querySelector('.ul-flex');

menuBar.addEventListener('click', menuBarFunc);

function menuBarFunc() {
    ulFlex.classList.toggle("flexDisplay");
    ulFlex.classList.toggle("reverseFade");
}
// end toggle Bar Menu smartphone mode

// sidebar height same with window height
const sidebar = document.querySelector('.sidebar');
let windowHeight = window.innerHeight;
sidebar.style.height = windowHeight + "px";
// end sidebar height same with window height

// navbar go up and down with scroll
const navbar = document.querySelector('.nav-container');
let prevScrollpos = window.pageYOffset;
window.onscroll = function () {
    let currentScrollPos = window.pageYOffset;
    if (currentScrollPos > prevScrollpos) {
        navbar.style.top = '-200px';
    } else {
        navbar.style.top = '0';
    }
    prevScrollpos = currentScrollPos;
}
// end navbar go up and down with scroll

// side bar toggle
const arrow = document.querySelector('.arrow');
const layout = document.querySelector('.layout');

arrow.addEventListener('click', layoutFunc);

function layoutFunc() {
    layout.classList.toggle("layoutOn");
    arrow.classList.toggle("rotate");
    arrow.classList.toggle("reverseRotate");
}



// AJAX
const content = document.getElementById('idContent');

const submitInput = document.getElementById('submitInput');
submitInput.addEventListener('click', inputData);

const inputForm = {
    image: document.getElementById('imageUpload'),
    name: document.getElementById('productName'),
    price: document.getElementById('price'),
    category: document.getElementById('category'),
    descript: document.getElementById('desc'),
    date: document.getElementById('date')
}

function showData() {
    const xhr = new XMLHttpRequest();
    xhr.open('post', 'showAjax.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (this.status == 200 & this.readyState == 4) {
            document.getElementById('tbodyAjax').innerHTML = this.responseText;
            // console.log(this.responseText);
            deleteDatUp();
        }
    }
    xhr.send()
}

function inputData(e) {
    e.preventDefault();
    const order = 'input';
    const xhr = new XMLHttpRequest();
    const params = `order=${order}&productName=${inputForm.name.value}&price=${inputForm.price.value}&category=${inputForm.category.value}&desc=${inputForm.descript.value}&date=${inputForm.date.value}&image=${inputForm.image.value}`;
    xhr.open('post', 'inputAjax.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (this.status == 200 & this.readyState == 4) {
            alert(this.responseText);
            showData();
            submitInput.parentElement.parentElement.parentElement.parentElement.reset();
        }
    }

    xhr.send(params);
}

deleteDatUp();

function deleteDatUp() {
    const deleteDat = document.querySelectorAll('.deleteBtn');

    deleteDat.forEach(deleteData);
}


function deleteData(e) {
    e.addEventListener('click', function (el) {
        el.preventDefault();
        const imageDelete = e.previousElementSibling;
        const idDelete = imageDelete.previousElementSibling;
        let b = confirm('hapus?');

        if (b) {
            const order = 'delete';
            const params = `order=${order}&idDelete=${idDelete.value}`;
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'inputAjax.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (this.status == 200 & this.readyState == 4) {
                    alert(this.responseText);
                    showData();
                }
            }
            xhr.send(params);
        }
    });

}
















// const deleteBtn = document.querySelectorAll('.deleteBtn');
// deleteBtn.forEach(deleteData);

// function deleteData(item) {
//     const imageDelete = item.previousElementSibling;
//     const idDelete = imageDelete.previousElementSibling;
//     item.addEventListener('click', (e) => {
//         e.preventDefault();
//         // console.log(imageDelete);
//         const imageValue = imageDelete.getAttribute('value');
//         const idValue = idDelete.getAttribute('value');
//         confirm('harpus?');
//         if (confirm) {
//             let xhr = new XMLHttpRequest();
//             xhr.open("POST", "app.php", true);
//             let params = `id=${idValue}&image=${imageValue}`;
//             xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//             xhr.onload = function () {
//                 if (this.status == 200 & this.readyState == 4) {
//                     console.log(this.responseText);
//                 }
//             }
//             xhr.send(params);
//         }
//     })
// }