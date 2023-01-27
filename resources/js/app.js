require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    $('form').on('submit', function () {
        $(this).find(':submit').attr('disabled', 'true');
    });
});
