import * as $ from 'jquery';
import {preAjaxSetup} from './components/pre-ajax-setup';
import {animateAjax} from './components/animate-ajax';
  
export const sortByDateAjaxCall = () => {
    $(".sort-by-date-js-ajax").on("click", function (e) {
        e.preventDefault();
        $(".js-hide-div-on-ajax").hide();
        const datechoice = $(this).data("concert-date");
    
        $(".target-div-for-modal-and-spinner-js")
          .hide()
          .append(
            `<div class="ig_loading-spinner   ">
    </div>`
          )
          .fadeIn(200);
    
        const currentContainerHeight = preAjaxSetup(
          ".ajax-js-change-events-target"
        );
        $(".page-upcoming-concerts").css("min-height", currentContainerHeight);
        $.ajax({
          url: wpAjax.ajaxUrl,
          data: {
            action: "filter",
            venueID: "non-venue-choice",
            datechoice: datechoice,
            dateFromAjax: true,
          },
          type: "POST",
          success: function (data) {
            animateAjax(
              ".ajax-js-change-events-target",
              "history-wrapper__on-screen",
              "history-wrapper__off-screen",
              data,
              ".page-upcoming-concerts"
            );
            $(".ig_loading-spinner").fadeOut(function () {
              $(".ig_loading-spinner").remove();
            });
          },
          error: function (error) {
            console.warn(error);
          },
        });
      });
}