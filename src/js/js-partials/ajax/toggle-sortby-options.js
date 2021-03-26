import * as $ from 'jquery';


export const toggleSortByOptions = () => {
    const toggleSortOptions = (
        showToggleName,
        hideToggleName,
        oppositeTogglerId,
        thisToggleId
      ) => {
        if ($(".show-all-concerts-js-ajax").hasClass("sort-by-toggler__active")) {
          $(".show-all-concerts-js-ajax").removeClass("sort-by-toggler__active");
        }
    
        if ($("#ig-sort-show-all").hasClass("ig_gav-invisible")) {
          $("#ig-sort-show-all").removeClass("ig_gav-invisible");
        }
    
        if ($(`.${showToggleName}`).hasClass("sort-by-menu--off-screen")) {
          if ($(`.${hideToggleName}`).hasClass("sort-by-menu--on-screen")) {
            $(`.${hideToggleName}`).removeClass("sort-by-menu--on-screen");
            $(`.${hideToggleName}`).addClass("sort-by-menu--off-screen");
          }
    
          // if($(`#${oppositeTogglerId}`).hasClass('sort-by-toggler__active')) {
          $(`#${oppositeTogglerId}`).removeClass("sort-by-toggler__active");
          // } else {
          $(`#${thisToggleId}`).addClass("sort-by-toggler__active");
    
          // }
          $(`.${showToggleName}`).css("display", "flex");
          $(`.${showToggleName}`).removeClass("sort-by-menu--off-screen");
          $(`.${showToggleName}`).addClass("sort-by-menu--on-screen");
        }
      };
    
      $("#ig-sort-by-venue").on("click", function (e) {
        e.preventDefault();
        toggleSortOptions(
          "sort-by-venue",
          "sort-by-date",
          "ig-sort-by-date",
          "ig-sort-by-venue"
        );
      });
      $("#ig-sort-by-date").on("click", function (e) {
        e.preventDefault();
        toggleSortOptions(
          "sort-by-date",
          "sort-by-venue",
          "ig-sort-by-venue",
          "ig-sort-by-date"
        );
      });
}