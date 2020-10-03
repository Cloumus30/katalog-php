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