// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    // var deleteLinks = document.querySelectorAll('.delete');

    // for (var i = 0; i < deleteLinks.length; i++) {
    //     deleteLinks[i].addEventListener('click', function (event) {
    //         event.preventDefault();

    //         var choice = confirm(this.getAttribute('data-confirm'));

    //         if (choice) {
    //             window.location.href = this.getAttribute('href');
    //         }
    //     });
    // }
})

// data confirm alert
$(document).ready(function () {
    var submit_buttons = $("form[data-confirm] button[type='submit']");
    submit_buttons.on('click', function (e) {
        e.preventDefault();
        var button = $(this); // Get the button
        var form = button.closest('form'); // Get the related form
        var msg = form.data('confirm'); // Get the confirm message
        if (confirm(msg)) form.submit(); // If the user confirm, submit the form
    })
})