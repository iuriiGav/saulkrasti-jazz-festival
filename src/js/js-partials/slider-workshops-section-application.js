import * as $ from 'jquery';

const BP_MEDIUM = 767;

export const sliderForApplication = () => {
      if ($(".content-card__text").length > 0) {

      if ($(".application-section-1").length > 0) {
        $(".application-section-1").addClass("content-card__visible");
        $(".application-section-1").removeClass("content-card__hidden");
        $("#application-section-1").addClass("side-links__item--active");
  
        if ($(window).width() <= BP_MEDIUM) {
          const currentBoxHeight = $(".content-card__visible").height();
          $('.content-box').css('height', currentBoxHeight + 150);
          // $(`.main-footer`).css("margin-top", `${currentBoxHeight + 30}px`);
        }
        $(window).on("resize", function () {
          if ($(window).width() <= BP_MEDIUM) {
            const currentBoxHeight = $(".content-card__visible").height();
  
            $('.content-box').css('height', currentBoxHeight + 150);
  
            $(`.main-footer`).css("margin-top", `${currentBoxHeight + 30}px`);
          } 
        });
      }
      
  
      $(".side-link--target").on("click", function (e) {
        e.preventDefault();
  
        const activeClass = $(".content-card__visible").attr("data-application");
        const targetClass = $(this).attr("id");
        const changeHeightOfEllementOnChangeOfCardTarget = $('.content-box')
        const nextDiv = $(`*[data-application="${targetClass}"]`);
        const nextDivHeight = nextDiv.height();
        // console.log(currentBoxHeight);
  
        $(`.${activeClass}`).removeClass("content-card__visible");
        $(`.${activeClass}`).addClass("content-card__hidden");
        $(`#${activeClass}`).removeClass("side-links__item--active");
  
        $(`.${targetClass}`).addClass("content-card__visible");
  
        if ($(window).width() <= BP_MEDIUM) {
          changeHeightOfEllementOnChangeOfCardTarget.css('padding-bottom', nextDivHeight + 150);
  
        } else {
          changeHeightOfEllementOnChangeOfCardTarget.css('padding-bottom', nextDivHeight - $('.side-links__list').height() + 20);
  
        }
        $(`#${targetClass}`).addClass("side-links__item--active");
  
        $(`.${targetClass}`).removeClass("content-card__hidden");
      });
    }
  
}

