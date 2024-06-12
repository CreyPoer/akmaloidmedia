window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('navbar-scrolled');
        navbar.classList.remove('navbar-default');
    } else {
        navbar.classList.remove('navbar-scrolled');
        navbar.classList.add('navbar-default');
    }
});
$(document).ready(function() {
    $(window).scroll(function() {
        var scrollPosition = $(document).scrollTop();
        $('ul.navbar-nav li a').each(function() {
            var currentLink = $(this);
            var refElement = $(currentLink.attr("href"));
            if (refElement.position().top <= scrollPosition && refElement.position().top +
                refElement.height() > scrollPosition) {
                $('ul.navbar-nav li a').removeClass("active");
                currentLink.addClass("active");
            } else {
                currentLink.removeClass("active");
            }
        });
    });
});

function updateNavbar() {
    const navbar = document.querySelector('.navbar');
    const isScrolled = window.scrollY > 50;
    const isMobile = window.innerWidth <= 992;
    navbar.classList.remove('navbar-default', 'navbar-scrolled', 'navbar-mobile');

    if (isMobile) {
        navbar.classList.add('navbar-mobile');
    } else if (isScrolled) {
        navbar.classList.add('navbar-scrolled');
    } else {
        navbar.classList.add('navbar-default');
    }
}
