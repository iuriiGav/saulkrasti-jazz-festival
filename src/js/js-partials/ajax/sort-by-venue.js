import * as $ from 'jquery';
import {preAjaxSetup} from './components/pre-ajax-setup';
import {animateAjax} from './components/animate-ajax';

export const sortByVenueAjaxCall = () => {
    $(".sort-by-venue-js-ajax").on("click", function (e) {
        e.preventDefault();
        $(".js-hide-div-on-ajax").hide();
        
        if ($(".sort-by-options__link").hasClass("sort-by-options__link--active")) {
          $(".sort-by-options__link").removeClass("sort-by-options__link--active");
        }
    
        $(".target-div-for-modal-and-spinner-js")
          .hide()
          .append(
            `<div class="ig_loading-spinner   ">
    </div>`
          )
          .fadeIn(200);
        $(this).addClass("sort-by-options__link--active");
        const venueID = $(this).data("venue-id");
        const currentContainerHeight = preAjaxSetup(
          ".ajax-js-change-events-target"
        );
        $(".page-upcoming-concerts").css("min-height", currentContainerHeight);
    
        $.ajax({
          url: wpAjax.ajaxUrl,
          data: { action: "filter", venueID: venueID },
          type: "POST",
          success: function (data) {
            $(".ig_loading-spinner").fadeOut(function () {
              $(".ig_loading-spinner").remove();
            });
    
            animateAjax(
              ".ajax-js-change-events-target",
              "history-wrapper__on-screen",
              "history-wrapper__off-screen",
              data,
              ".page-upcoming-concerts"
            );
          },
          error: function (error) {
            console.warn(error);
          },
        });
      });
}