const btnBarMenu = document.querySelector(".admin-sidebar-img");
const menuSidebar = document.querySelector(".admin-sidebar");
btnBarMenu.addEventListener("click", function(){
    menuSidebar.classList.toggle("active");
});