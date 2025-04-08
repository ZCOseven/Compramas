function toggleMenu() {
    const body = document.body;
    const mobileMenu = document.getElementById('mobileMenu');
    
    mobileMenu.classList.toggle('mobile-menu--active');
    body.classList.toggle('menu-open');
}