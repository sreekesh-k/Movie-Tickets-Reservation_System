function toggleSlideMenu() {
    document.getElementById("slide-menu").classList.toggle("show");
    document.body.style.overflow =  document.getElementById("slide-menu").classList.contains('show') ? 'hidden' : 'auto';
}
