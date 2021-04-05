import { swiper } from "./js-partials/swiper-config.js";
import { sliderForApplication } from "./js-partials/slider-workshops-section-application";
import { adjustNavbar } from "./js-partials/navbar";
import { sliderWorkshopSectionTeachers } from "./js-partials/slider-workshop-section-teachers";
import { modalPopupSetup } from "./js-partials/modal-popup-setup";
import { toggleSortByOptions } from "./js-partials/ajax/toggle-sortby-options";
import { sortByVenueAjaxCall } from "./js-partials/ajax/sort-by-venue";
import { showAllUpcomingEventsAjaxCall } from "./js-partials/ajax/sort-show-all";
import { sortByDateAjaxCall } from "./js-partials/ajax/sort-by-date";
import { sortHistoryByYear } from "./js-partials/ajax/history-sort-by-year";
import { showSingleArtist } from "./js-partials/ajax/show-single-artist";


jQuery(function ($) {
  const BP_MEDIUM = 767;

  sliderForApplication();
  adjustNavbar();
  sliderWorkshopSectionTeachers();
  modalPopupSetup();


  /////////////////////////////////AJAX FILTERS/////////////////////////

  toggleSortByOptions();
  sortByVenueAjaxCall();
  showAllUpcomingEventsAjaxCall();
  sortByDateAjaxCall();
  sortHistoryByYear();
  showSingleArtist()


  if ($("p:has(iframe)")) {
    // $(p).css({'display' : 'flex', 'justify-content' : 'center'})
  }



  // ad target blank to all external a tags:

  $.expr.pseudos.external = function(obj){
    return !obj.href.match(/^mailto\:/)
           && (obj.hostname != location.hostname)
           && !obj.href.match(/^javascript\:/)
           && !obj.href.match(/^$/)
};
$('a:external').attr('target', '_blank');

$('.top-scrollerx--container').on('click', function(e) {
  e.preventDefault();
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
})

if($(".js-disabled-link")) {
  console.log('here')
  $(".js-disabled-link").css('pointer-events', 'none');
}


if($('#developer-email-link-js').length > 0) {

  function changeDevelopersLink(e) {

    
    e.preventDefault();
    
    console.log('hello')
    $('#developer-email-link-js').hide();
    $('#developer-email-link-js').remove();
    $('.copyright-text').append(` <a id="developer-email-link-js--after" href="mailto: iurii.gavryliuk@gmail.com"></a>`)
    $('#developer-email-link-js--after').hide();
    $('#developer-email-link-js--after').text('iurii.gavryliuk@gmail.com');
    $('#developer-email-link-js--after').css({'color' : 'var(--color-brand)', 'opacity' : 1 })
    $('#developer-email-link-js--after').show('slow');
  }

  $('#developer-email-link-js').on("click", changeDevelopersLink);
  
}

});

