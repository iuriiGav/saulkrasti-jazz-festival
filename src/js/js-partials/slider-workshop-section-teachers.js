import * as $ from 'jquery';

const BP_MEDIUM = 767;

export const sliderWorkshopSectionTeachers = () => {
      //Slider for text card in teachers section section

  if ($(".content-card").hasClass("instrument-1")) {
    $(".instrument-1").removeClass("content-card__hidden--reverse ");
    $(`#instrument-1`).addClass("side-links__item--active");
    $(`.instrument-1`).addClass("content-card__visible--teachers");

  
    $(".side-link--target-instrument").on("click", function (e) {
      e.preventDefault();
     
      const activeClass = $(".content-card__visible--teachers").attr(
        "data-instrument"
      );

      const targetClass = $(this).attr("id");

      

      $(`.${targetClass}`).removeClass("content-card__hidden--reverse");
      $(`.${targetClass}`).addClass("content-card__visible--teachers");
      $(`#${targetClass}`).addClass("side-links__item--active");
      $(`.${activeClass}`).removeClass("content-card__visible--teachers");
      $(`.${activeClass}`).addClass("content-card__hidden--reverse");
      $(`#${activeClass}`).removeClass("side-links__item--active");

   
    });
  }
}