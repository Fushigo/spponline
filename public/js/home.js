window.addEventListener("scroll", () => {
    let header = document.getElementById("header");
    header.classList.toggle("active-header", scrollY > 0);
})

let openMenu = document.getElementById("btn_open");
openMenu.addEventListener("click", () => {
    let nav = document.getElementById("nav");
    nav.classList.toggle("active-nav");
});

let closeMenu = document.getElementById("btn_close");
closeMenu.addEventListener("click", () => {
    let nav = document.getElementById("nav");
    nav.classList.remove("active-nav");
});
