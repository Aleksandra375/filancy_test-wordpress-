document.addEventListener('DOMContentLoaded', () => {
    // const menu = document.querySelector('.menu'),
    // menuItem = document.querySelectorAll('.menu_item'),
    // hamburger = document.querySelector('.hamburger');

    // hamburger.addEventListener('click', () => {
    //     hamburger.classList.toggle('hamburger_active');
    //     menu.classList.toggle('menu_active');
    // });

    // menuItem.forEach(item => {
    //     item.addEventListener('click', () => {
    //         hamburger.classList.toggle('hamburger_active');
    //         menu.classList.toggle('menu_active');
    //     });
    // });

    const menu = $('.menu'),
    menuItem = $('.menu_item'),
    hamburger = $('.hamburger');

    hamburger.on('click', function(){
        if($(window).width() < 992) {
            hamburger.toggleClass('hamburger_active');
            if(menu.hasClass('menu_active')) {
                menu.fadeOut(700);
                menu.removeClass('menu_active');
            } else {
                menu.fadeIn(700);
                menu.addClass('menu_active');
            }
        }
    });

    $(window).on('resize', function() {
        if($(window).width() >= 992 ) {
            menu.removeAttr('style');
            hamburger.removeClass('.hamburger_active');
            menu.removeClass('.menu_active');
        }
    });

});