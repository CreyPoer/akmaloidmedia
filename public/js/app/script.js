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
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
