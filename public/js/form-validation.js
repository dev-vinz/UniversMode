'use strict';

window.addEventListener('load', (_) => {
    /* * * * * * * * * * * * * * * * * * * * * * * * *\
    |*    Form: Verify and validate all the inputs   *|
    |*           from a form with bootstrap          *|
    \* * * * * * * * * * * * * * * * * * * * * * * * */

    // Get all the forms we want to apply Bootstrap validation
    const forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.from(forms).forEach((form) => {
        form.addEventListener(
            'submit',
            (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            },
            false,
        );
    });
});
