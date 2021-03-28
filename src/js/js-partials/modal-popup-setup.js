import * as $ from 'jquery';


export const modalPopupSetup = () => {
    if ($(".modal").length > 0) {
        $(".modal-trigger-js").on("click", function (e) {
          e.preventDefault();
    
          //case for baltic drummers league finalists
    
          const modalTarget = $(this).attr("id");
          $(".modal").addClass("is-open");
          $(`[data-modalnum=${modalTarget}]`).removeClass("modal__hidden");
          $("html").addClass("no-overflow");
          $(`[data-modalcontent=${modalTarget}]`).addClass(
            "modal__content--on-screen"
          );
    
          setTimeout(() => {
            $(`[data-modalcontent=${modalTarget}]`).removeClass(
              "modal__content--off-screen"
            );
          }, 10);
        });
        $(".modal__close").on("click", function () {
          $(".modal__content--on-screen").addClass("modal__content--off-screen");
          $(".modal__content--on-screen").removeClass("modal__content--on-screen");
          setTimeout(() => {
            $(".modal").addClass("modal__hidden");
            $("html").removeClass("no-overflow");
          }, 500);
        });

     
      }
    
      if ($(".modal").length > 0) {
        // $(".modal").on("click", function () {
        //   console.log("clicked");
        //   if ($(".modal").hasClass("is-open")) {
        //     $(".modal__close").triggerHandler("click");
        //   }
        // });
      } 
}