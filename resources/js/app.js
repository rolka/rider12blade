import './bootstrap';

// import Alpine from 'alpinejs';
import 'flowbite';
import { Datepicker } from "flowbite";

// window.Alpine = Alpine;
// Alpine.start();

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

document.addEventListener('DOMContentLoaded', function() {
    const languageToggleBtn = document.getElementById('language-toggle-btn');
    const languageDropdown = document.getElementById('language-dropdown');
    const userToggleBtn = document.getElementById('user-toggle-btn');
    const userDropdown = document.getElementById('user-dropdown');
    const mobileMenuToggleBtn = document.getElementById('mobile-menu-toggle-btn');
    const mobileMenu = document.getElementById('navbar-menu');

    // Toggle visibility for language dropdown
    languageToggleBtn.addEventListener('click', function(event) {
        event.stopPropagation();
        languageDropdown.classList.toggle('hidden');
        if ( userDropdown )
        {
            if (!userDropdown.classList.contains('hidden')) {
                userDropdown.classList.add('hidden');
            }
        }
    });

    // Toggle visibility for user dropdown
    if (userToggleBtn) {
        userToggleBtn.addEventListener('click', function(event) {
            event.stopPropagation();
            userDropdown.classList.toggle('hidden');
            if (!languageDropdown.classList.contains('hidden')) {
                languageDropdown.classList.add('hidden');
            }
        });
    }

    // Toggle visibility for mobile menu
    mobileMenuToggleBtn.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        if (!languageToggleBtn.contains(event.target) && !languageDropdown.contains(event.target)) {
            languageDropdown.classList.add('hidden');
        }
        if ( userToggleBtn )
        {
            if (!userToggleBtn.contains(event.target) && !userDropdown.contains(event.target)) {
                userDropdown.classList.add('hidden');
            }
        }
    });
});


