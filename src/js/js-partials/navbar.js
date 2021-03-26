import * as $ from 'jquery';
export const adjustNavbar = () => {
      // open all the submenu in footer

  if ($(".ig-footer-navbar").length > 0) {
  
    $(".ig-footer-navbar li.menu-item-has-children ul").removeClass(
      "dropdown-menu"
    );
    $(".ig-footer-navbar li.menu-item-has-children ul").addClass(
      "former-dropdown-menu"
    );
  }

  if($('.dropdown-menu').children('.current_page_item').length > 0) {
    $('.current_page_ancestor > a').css('text-decoration', 'underline')
    }

}