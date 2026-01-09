/*!
* Start Bootstrap - Grayscale v7.0.6
*/

// Scripts
window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink');
        } else {
            navbarCollapsible.classList.add('navbar-shrink');
        }
    };

    // Shrink the navbar 
    navbarShrink();

    // ---------------------------------------------
    // HIDE / SHOW NAVBAR WHEN SCROLLING
    // ---------------------------------------------

    let lastScroll = 0;
    const nav = document.getElementById("mainNav");

    window.addEventListener("scroll", () => {
        const currentScroll = window.pageYOffset;

        // hide on scroll down
        if (currentScroll > lastScroll) {
            nav.style.top = "-80px";
        } 
        // show on scroll up
        else {
            nav.style.top = "0";
        }

        lastScroll = currentScroll;

        // also handle shrink effect
        navbarShrink();
    });

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});
