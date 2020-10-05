/*jshint esversion: 6 */

mainToggle = document.querySelector('[data-main-menu-toggle]');
mainClose = document.querySelectorAll('[data-main-close]');
mainMenu = document.querySelector('[data-main-menu]');

mainToggle.addEventListener('click', function(e) {
    e.preventDefault();
    mainMenu.classList.remove('hidden');
    mainMenu.classList.add('visible');
});

mainClose.forEach(function(elem) {

    elem.addEventListener('click', function(e) {
        e.preventDefault();
        mainMenu.classList.add('hidden');
        mainMenu.classList.remove('visible');
    });  

});