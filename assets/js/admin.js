const btnBarMenu = document.querySelector(".admin-sidebar--toggle");
const menuSidebar = document.querySelector(".admin-sidebar");
const adminContent = document.querySelector(".admin-content");
let windowWidth= window.innerWidth;
btnBarMenu.addEventListener("click", function(){
    if (windowWidth < 1025){
        menuSidebar.classList.toggle("active");
        adminContent.classList.toggle("isactive");

    }
    if (windowWidth >= 1025){
        menuSidebar.classList.toggle("active");
        adminContent.classList.toggle("isactive");
    }
});

