import * as $ from 'jquery';

export const animateAjax = (
    targetDiv,
    animationClassOn,
    animationClassOff,
    data,
    removeMinHeightTarget
  ) => {
    if ($(targetDiv).hasClass(animationClassOn)) {
      $(targetDiv).removeClass(animationClassOn);
    }
    $(targetDiv).addClass(animationClassOff);
    setTimeout(() => {
      $(targetDiv).html(data);

      $(targetDiv).removeClass(animationClassOff);
      $(targetDiv).addClass(animationClassOn);
      $(removeMinHeightTarget).css("min-height", "auto");
    }, 500);
  };