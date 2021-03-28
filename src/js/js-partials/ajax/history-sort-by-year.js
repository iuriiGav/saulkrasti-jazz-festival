import * as $ from 'jquery';
import {preAjaxSetup} from './components/pre-ajax-setup';
import {animateAjax} from './components/animate-ajax';

export const sortHistoryByYear = () => {
    $(".festival-year-toggler-js-ajax").on("click", function (e) {
        e.preventDefault();
        const festivalQueryYear = $(this).data("festival-year");
        $(".extra-year-info-js").text(festivalQueryYear);
        if (
          $(".festival-year-toggler-js-ajax").hasClass("sort-by-toggler__active")
        ) {
          $(".festival-year-toggler-js-ajax").removeClass(
            "sort-by-toggler__active"
          );
        }
        $(this).addClass("sort-by-toggler__active");
    
        $(".target-div-for-modal-and-spinner-js")
          .hide()
          .append(
            `<div class="ig_loading-spinner   ">
    </div>`
          )
          .fadeIn(200);
    
        const currentContainerHeight = preAjaxSetup(".history-wrapper");
        $(".current-year-artists__history").css(
          "min-height",
          currentContainerHeight
        );
    
        $.ajax({
          url: wpAjax.ajaxUrl,
          data: { action: "getHistory", festivalQueryYear },
          type: "POST",
          success: function (data) {
            if($('.history-wrapper').length > 0) {
              $('.history-wrapper').remove();
            }
            if ($(".history-by-year-js-ajax-container").html() !== data) {
              animateAjax(
                ".history-by-year-js-ajax-container",
                "history-wrapper__on-screen",
                "history-wrapper__off-screen",
                data,
                ".current-year-artists__history"
              );
              $(".ig_loading-spinner").fadeOut(function () {
                $(".ig_loading-spinner").remove();
              });
             
              console.log($('.history-wrapper__on-screen').html());


            }
          },
          error: function (error) {
            console.warn(error);
          },
        });
      });
}