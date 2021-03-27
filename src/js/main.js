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
});
