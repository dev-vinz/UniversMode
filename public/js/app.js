'use strict';

window.addEventListener('load', (event) => {
    /* * * * * * * * * * * * * * * * * * * * * * * * *\
    |*   Footer: Put the "Copyright" line at least   *|
    |*           at the bottom of the window         *|
    \* * * * * * * * * * * * * * * * * * * * * * * * */

    let copyrightItems = document.getElementsByClassName('um-footer-copyright');

    if (copyrightItems.length == 1) {
        let marginForCopyright = window.innerHeight - copyrightItems[0].offsetTop;
        if (marginForCopyright > 0) {
            // Copyright in Footer is too high
            copyrightItems[0].style.marginTop = marginForCopyright + 'px';
        }
    }
});
