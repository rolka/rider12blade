import './bootstrap';

import Alpine from 'alpinejs';
import 'flowbite';
import { Datepicker } from "flowbite";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    // alert('Hello World');
    const today = new Date();
    const datepickerEl = document.getElementById('default-datepicker');
    if (datepickerEl) {
        new Datepicker(datepickerEl, {
            minDate: today,
            buttons: true,
            autoSelectToday: 1,
            autohide: true,
            format: 'dd/mm/yyyy',
        });
    }
});
