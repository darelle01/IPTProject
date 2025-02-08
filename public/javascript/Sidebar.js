function toggleMenu() {
    var menu = document.getElementById("NavBarArea");
    var labels = document.querySelectorAll(".ButtonName");
   if (window.innerWidth <= 768) {
    menu.classList.remove("active");
    menu.classList.display("none");
    labels.forEach(label => label.style.display = "inline");
   } else {
        if (menu.classList.contains("active")) {
            menu.classList.remove("active");
            labels.forEach(label => label.style.display = "inline");
        } else {
            menu.classList.add("active");
            labels.forEach(label => label.style.display = "none");
        }
   }
}
