import * as $ from 'jquery';

const BP_MEDIUM = 767;

export const sliderForApplication = () => {
      if ($(".content-card__text").length > 0) {

      if ($(".application-section-1").length > 0) {
        $(".application-section-1").addClass("content-card__visible");
        $(".application-section-1").removeClass("content-card__hidden");
        $("#application-section-1").addClass("side-links__item--active");
  
   
      }
      
  
      $(".side-link--target").on("click", function (e) {
        e.preventDefault();
  
        const activeClass = $(".content-card__visible").attr("data-application");
        const targetClass = $(this).attr("id");
      
  
        $(`.${activeClass}`).removeClass("content-card__visible");
        $(`.${activeClass}`).addClass("content-card__hidden");
        $(`#${activeClass}`).removeClass("side-links__item--active");
  
        $(`.${targetClass}`).addClass("content-card__visible");
  
      
        $(`#${targetClass}`).addClass("side-links__item--active");
  
        $(`.${targetClass}`).removeClass("content-card__hidden");
      });
    }
  
}

