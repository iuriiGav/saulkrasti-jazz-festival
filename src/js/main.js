jQuery(function ($) {
  const BP_MEDIUM = 767;

  // init Swiper:
  const swiper = new Swiper(".swiper-container", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    slidesPerView: "auto",

    // If we need pagination
    pagination: {
      el: ".swiper-pagination",
    },

    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    // And if we need scrollbar
    scrollbar: {
      el: ".swiper-scrollbar",
    },
  });

  // open all the submenu in footer

  if ($(".ig-footer-navbar").length > 0) {
    // $('.ig-footer-navbar li.menu-item-has-children a').addClass('show');
    // $('.ig-footer-navbar li.menu-item-has-children a').attr('diabled');
    // $('.ig-footer-navbar li.menu-item-has-children ul').addClass('show');

    $(".ig-footer-navbar li.menu-item-has-children ul").removeClass(
      "dropdown-menu"
    );
    $(".ig-footer-navbar li.menu-item-has-children ul").addClass(
      "former-dropdown-menu"
    );
  }

  //Slider for text card in application section

  if ($(".content-card__text").length > 0) {
    if ($(".application-section-1").length > 0) {
      $(".application-section-1").addClass("content-card__visible");
      $(".application-section-1").removeClass("content-card__hidden");
      $("#application-section-1").addClass("side-links__item--active");

      if ($(window).width() <= BP_MEDIUM) {
        const currentBoxHeight = $(".content-card__visible").outerHeight();
        $(`.main-footer`).css("margin-top", `${currentBoxHeight + 30}px`);
      }
      $(window).on("resize", function () {
        if ($(window).width() <= BP_MEDIUM) {
          console.log($(window).width());
          const currentBoxHeight = $(".content-card__visible").outerHeight();

          $(`.main-footer`).css("margin-top", `${currentBoxHeight + 30}px`);
        } else if ($(window).width() > BP_MEDIUM) {
          $(`.main-footer`).css("margin-top", `0`);
        }
      });
    }

    $(".side-link--target").on("click", function (e) {
      e.preventDefault();

      const activeClass = $(".content-card__visible").attr("data-application");
      const targetClass = $(this).attr("id");
      const currentBoxHeight = $(`.${targetClass}`).outerHeight();

      // console.log(currentBoxHeight);

      $(`.${activeClass}`).removeClass("content-card__visible");
      $(`.${activeClass}`).addClass("content-card__hidden");
      $(`#${activeClass}`).removeClass("side-links__item--active");

      $(`.${targetClass}`).addClass("content-card__visible");

      if ($(window).width() <= BP_MEDIUM) {
        const currentBoxHeight = $(".content-card__visible").outerHeight();
        $(`.main-footer`).css("margin-top", `${currentBoxHeight + 30}px`);
      }
      $(`#${targetClass}`).addClass("side-links__item--active");

      $(`.${targetClass}`).removeClass("content-card__hidden");
    });
  }

  //Slider for text card in teachers section section

  if ($(".content-card").hasClass("instrument-1")) {
    $(".instrument-1").removeClass("content-card__hidden--reverse ");
    $(`#instrument-1`).addClass("side-links__item--active");
    $(`.instrument-1`).addClass("content-card__visible--teachers");
    if ($(window).width() <= BP_MEDIUM) {
      const currentBoxHeight = $(
        ".content-card__visible--teachers"
      ).outerHeight();
      $(`.workshop__teachers`).css(
        "padding-bottom",
        `${currentBoxHeight + 20}px`
      );
    }

    $(window).on("resize", function () {
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
    });

    $(".side-link--target-instrument").on("click", function (e) {
      e.preventDefault();

      const activeClass = $(".content-card__visible--teachers").attr(
        "data-instrument"
      );
      console.log(activeClass);
      const targetClass = $(this).attr("id");
      $(`.${targetClass}`).removeClass("content-card__hidden--reverse");
      $(`.${targetClass}`).addClass("content-card__visible--teachers");
      $(`#${targetClass}`).addClass("side-links__item--active");
      $(`.${activeClass}`).removeClass("content-card__visible--teachers");
      $(`.${activeClass}`).addClass("content-card__hidden--reverse");
      $(`#${activeClass}`).removeClass("side-links__item--active");
      if ($(window).width() <= BP_MEDIUM) {
        const currentBoxHeight = $(
          ".content-card__visible--teachers"
        ).outerHeight();
        $(`.workshop__teachers`).css(
          "padding-bottom",
          `${currentBoxHeight + 20}px`
        );
      }
    });
  }

  //modal popup

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
    $(".modal").on("click", function () {
      console.log("clicked");
      if ($(".modal").hasClass("is-open")) {
        $(".modal__close").triggerHandler("click");
      }
    });
  }

  // $("#ig-sort-by-venue").on("click", function (e) {
  //   e.preventDefault();
  //   if ($(".sort-by-venue").hasClass("sort-by-menu--off-screen")) {

  //     if($("#sort-by-date").hasClass("sort-by-menu--on-screen")) {
  //       $("#sort-by-date").removeClass("sort-by-menu--on-screen");
  //     }
  //     $('.sort-by-venue').css("display", 'flex');
  //     $(".sort-by-venue").removeClass("sort-by-menu--off-screen");
  //     $(".sort-by-venue").addClass("sort-by-menu--on-screen");

  //   }
  // });

  /////////////////////////////////AJAX FILTERS/////////////////////////

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

  $(".sort-by-options").on("click", function (e) {});

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

  $(".sort-by-venue-js-ajax").on("click", function (e) {
    e.preventDefault();
    $(".js-hide-div-on-ajax").hide();
    if ($(".sort-by-options__link").hasClass("sort-by-options__link--active")) {
      $(".sort-by-options__link").removeClass("sort-by-options__link--active");
    }
    $(this).addClass("sort-by-options__link--active");
    const venueID = $(this).data("venue-id");

    $.ajax({
      url: wpAjax.ajaxUrl,
      data: { action: "filter", venueID: venueID },
      type: "POST",
      success: function (data) {
        $(".ajax-js-change-events-target").html(data);
      },
      error: function (error) {
        console.warn(error);
      },
    });
  });

  $(".show-all-concerts-js-ajax").on("click", function (e) {
    e.preventDefault();
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

    $.ajax({
      url: wpAjax.ajaxUrl,
      data: { action: "filter", venueID: null },
      type: "POST",
      success: function (data) {
        $(".ajax-js-change-events-target").html(data);
      },
      error: function (error) {
        console.warn(error);
      },
    });
  });



$('.sort-by-date-js-ajax').on('click', function (e) {
  e.preventDefault();
  const datechoice = $(this).data('concert-date');
  console.log(datechoice);
  
      $.ajax({
        url: wpAjax.ajaxUrl,
        data: { action: "filter", venueID: 'non-venue-choice', datechoice: datechoice, dateFromAjax: true },
        type: "POST",
        success: function (data) {
          $(".ajax-js-change-events-target").html(data);
        },
        error: function (error) {
          console.warn(error);
        },
      });
})

///////////////////////////////////HISTORY AJAX = GET SPECIFIED YEAR STATS, ARTISTS AND GALLERY


$('.festival-year-toggler-js-ajax').on('click', function (e) {
  e.preventDefault();
  const festivalQueryYear = $(this).data('festival-year');
  $('.extra-year-info-js').text(festivalQueryYear)
  if($('.festival-year-toggler-js-ajax').hasClass('sort-by-toggler__active')) {
    $('.festival-year-toggler-js-ajax').removeClass('sort-by-toggler__active');
  }
 $(this).addClass('sort-by-toggler__active')
  $.ajax({
    url: wpAjax.ajaxUrl,
    data: { action: "getHistory", festivalQueryYear },
    type: "POST",
    success: function (data) {
      $(".history-wrapper").html(data);
      console.log(data)
    },
    error: function (error) {
      console.warn(error);
    },
  });
})


});
