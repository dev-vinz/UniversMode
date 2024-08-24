'use strict';

window.addEventListener('load', (event) => {
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*   NavBar: Simulation of "hover" for a TouchScreen   *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * */

    // - Remove all hover, if exists
    document.addEventListener('touchstart', (e) => {
        let hoverItems = document.getElementsByClassName('um-navbar-item hover');

        for (let hoverItem of hoverItems) {
            hoverItem.classList.remove('hover');
        }
    });

    // - Activate the involved one
    let menuItems = document.getElementsByClassName('um-navbar-item um-navbar-sub-menu');

    for (let menuItem of menuItems) {
        let submenuItems = menuItem.getElementsByClassName('um-sub-menu');
        if (submenuItems.length == 1) {
            submenuItems[0].addEventListener('touchstart', (e) => {
                if (!menuItem.classList.contains('hover')) {
                    menuItem.classList.add('hover');
                    e.stopPropagation();
                }
            });
        }
    }
});
