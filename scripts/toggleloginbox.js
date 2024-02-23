function toggleLoginBox() {
    const loginBoxContainer = document.getElementById('loginBoxContainer');
    loginBoxContainer.classList.toggle('show');
    // Toggle the overflow property of the body
    document.body.style.overflow = loginBoxContainer.classList.contains('show') ? 'hidden' : 'auto';
}