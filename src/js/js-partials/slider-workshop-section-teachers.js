import * as $ from 'jquery';

const BP_MEDIUM = 767;

export const sliderWorkshopSectionTeachers = () => {
      //Slider for text card in teachers section section

  if ($(".content-card").hasClass("instrument-1")) {
    $(".instrument-1").removeClass("content-card__hidden--reverse ");
    $(`#instrument-1`).addClass("side-links__item--active");
    $(`.instrument-1`).addClass("content-card__visible--teachers");

    $(window).on("resize", function () {
      if ($(".workshop__teachers").length > 0) {
        if ($(window).width() <= BP_MEDIUM) {
          const currentBoxHeight = $(
            ".content-card__visible--teachers"
          ).outerHeight();

          $(`.workshop__teachers`).css(
            "padding-bottom",
            `${currentBoxHeight + 30}px`
          );
        } else if ($(window).width() > BP_MEDIUM) {
          $(`.workshop__teachers`).css("padding-bottom", `0`);
        }
      }
    });

    $(".side-link--target-instrument").on("click", function (e) {
      e.preventDefault();
      const changeHeightOfEllementOnChangeOfCardTarget = $(
        ".workshop__teachers"
      );
      const activeClass = $(".content-card__visible--teachers").attr(
        "data-instrument"
      );

      const targetClass = $(this).attr("id");

      const nextDiv = $(`*[data-instrument="${targetClass}"]`);
      const nextDivHeight = nextDiv.height();
      console.log(nextDivHeight);

      $(`.${targetClass}`).removeClass("content-card__hidden--reverse");
      $(`.${targetClass}`).addClass("content-card__visible--teachers");
      $(`#${targetClass}`).addClass("side-links__item--active");
      $(`.${activeClass}`).removeClass("content-card__visible--teachers");
      $(`.${activeClass}`).addClass("content-card__hidden--reverse");
      $(`#${activeClass}`).removeClass("side-links__item--active");

      if ($(window).width() <= BP_MEDIUM) {
        changeHeightOfEllementOnChangeOfCardTarget.css(
          "padding-bottom",
          nextDivHeight + 150
        );
      } else {
        changeHeightOfEllementOnChangeOfCardTarget.css(
          "padding-bottom",
          nextDivHeight - $(".side-links__list").height() + 20
        );
      }
    });
  }
}