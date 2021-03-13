jQuery(document).ready(function($) { 

   // init Swiper:
   const swiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });


  // open all the submenu in footer

  if($('.ig-footer-navbar').length > 0) {
    // $('.ig-footer-navbar li.menu-item-has-children a').addClass('show');
    // $('.ig-footer-navbar li.menu-item-has-children a').attr('diabled');
    // $('.ig-footer-navbar li.menu-item-has-children ul').addClass('show');

    $('.ig-footer-navbar li.menu-item-has-children ul').removeClass('dropdown-menu');
    $('.ig-footer-navbar li.menu-item-has-children ul').addClass('former-dropdown-menu');
  }

})