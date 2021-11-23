const navbar = document.querySelector('.navbar');
const article = document.querySelectorAll('.article')

window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
        navbar.classList.add('nav-active');
    } else {
        navbar.classList.remove('nav-active')
    }

});

