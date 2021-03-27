import * as $ from "jquery";








export const showSingleArtist = () => {
  if ($(".artist-link-target-js-ajax").length > 0) {
    $(document).on("click", ".artist-link-target-js-ajax"  , function (e) {
        // e.preventDefault();

if($(this).data("type-of-link") === 'full_bio') {
    e.preventDefault();






      $(".target-div-for-modal-and-spinner-js")
      .hide()
      .append(
        `<div class="ig_loading-spinner   ">
</div>`
      )
      .fadeIn(200);

      setTimeout(() => {
        $(".modal").addClass("modal__visible");
        $(".modal").removeClass("modal__invisible");
      }, 200);

  


      $(document).on("click", ".modal__close", function (e) {
       
        $(".single-artist-dynamic-container").fadeOut(200);
        setTimeout(() => {
          $(".single-artist-dynamic-container").remove();
          $(".modal").removeClass("modal__visible");

          $(".modal").addClass("modal__invisible");
        }, 200);
      });

      // modal modal-drummers-league-js is-open

      const queriedArtistID = $(this).data("artist-id");
    
      $.ajax({
        url: wpAjax.ajaxUrl,
        data: { action: "getSingleArtist", queriedArtistID: queriedArtistID },
        type: "POST",
        success: function (data) {
          $(".modal").html(data);
          $(".ig_loading-spinner").fadeOut(function () {
            $(".ig_loading-spinner").remove();
          });
        },
        error: function (error) {
          console.warn(error);
        },
      });
    } else if ($(this).data("type-of-link") === 'no_page') {
        e.preventDefault();
    } else if( $(this).data("type-of-link") === 'no-data' ){  
        
        e.preventDefault();
  





        $(".target-div-for-modal-and-spinner-js")
        .hide()
        .append(
          `<div class="ig_loading-spinner   ">
  </div>`
        )
        .fadeIn(200);
  
        setTimeout(() => {
          $(".modal").addClass("modal__visible");
          $(".modal").removeClass("modal__invisible");
        }, 200);
  
    
  
  
        $(document).on("click", ".modal__close", function (e) {
          $(".single-artist-dynamic-container").fadeOut(200);
          setTimeout(() => {
            $(".single-artist-dynamic-container").remove();
            $(".modal").removeClass("modal__visible");
            $(".modal").addClass("modal__invisible");
          }, 200);
        });
  
        // modal modal-drummers-league-js is-open
  
        const queriedArtistID = $(this).data("artist-id");
      
        $.ajax({
          url: wpAjax.ajaxUrl,
          data: { action: "getSingleArtist", queriedArtistID: queriedArtistID },
          type: "POST",
          success: function (data) {
            $(".modal").html(data);
            $(".ig_loading-spinner").fadeOut(function () {
              $(".ig_loading-spinner").remove();
            });
          },
          error: function (error) {
            console.warn(error);
          },
        });








    } else {

    }










    });
  


}
};
