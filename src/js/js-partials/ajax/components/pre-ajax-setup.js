import * as $ from 'jquery';


export const preAjaxSetup = (targetDiv) => {
        if ($(targetDiv).length > 0) {
          return $(targetDiv).height();
        }
      };