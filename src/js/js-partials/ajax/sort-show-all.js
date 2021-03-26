import * as $ from 'jquery';
import {preAjaxSetup} from './components/pre-ajax-setup';
import {animateAjax} from './components/animate-ajax';

export const showAllUpcomingEventsAjaxCall = () => {

    $(".show-all-concerts-js-ajax").on("click", function (e) {
        e.preventDefault();
        $(".js-hide-div-on-ajax").hide();
        if ($(".sort-by-options__link").hasClass("sort-by-options__link--active")) {
          $(".sort-by-options__link").removeClass("sort-by-options__link--active");
        }
        if ($(".sort-by-toggler").hasClass("sort-by-toggler__active")) {
          $(".sort-by-toggler").removeClass("sort-by-toggler__active");
        }
        if ($(".sort-by-venue").hasClass("sort-by-menu--on-screen")) {
          $(".sort-by-venue").removeClass("sort-by-menu--on-screen");
          $(".sort-by-venue").addClass("sort-by-menu--off-screen");
        }
        if ($(".sort-by-date").hasClass("sort-by-menu--on-screen")) {
          $(".sort-by-date").removeClass("sort-by-menu--on-screen");
          $(".sort-by-date").addClass("sort-by-menu--off-screen");
        }
        $(".show-all-concerts-js-ajax").addClass("sort-by-toggler__active");
    
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
          data: { action: "filter", venueID: null, showAll : true },
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