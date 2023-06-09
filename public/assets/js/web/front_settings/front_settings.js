/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!******************************************************************!*\
  !*** ./resources/assets/js/web/front_settings/front_settings.js ***!
  \******************************************************************/


$(document).on('change', '#advertiseImage', function () {
  $('#validationErrorsBox').addClass('d-none');

  if (isValidAdvertise($(this), '#validationErrorsBox')) {
    displayAdvertiseImage(this, '#advertisePreview');
  }

  $('#validationErrorsBox').delay(5000).slideUp(300);
});

window.displayAdvertiseImage = function (input, selector) {
  var displayPreview = true;

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var image = new Image();
      image.src = e.target.result;

      image.onload = function () {
        if (image.height != 450 || image.width != 630) {
          $('#advertiseImage').val('');
          $('#validationErrorsBox').removeClass('d-none');
          $('#validationErrorsBox').html('The image must be of pixel 450 x 630').show();
          return false;
        }

        $(selector).attr('src', e.target.result);
        displayPreview = true;
      };
    };

    if (displayPreview) {
      reader.readAsDataURL(input.files[0]);
      $(selector).show();
    }
  }
};

window.isValidAdvertise = function (inputSelector, validationMessageSelector) {
  var ext = $(inputSelector).val().split('.').pop().toLowerCase();

  if ($.inArray(ext, ['jpg', 'jpeg', 'png']) == -1) {
    $(inputSelector).val('');
    $(validationMessageSelector).removeClass('d-none');
    $(validationMessageSelector).html('The image must be a file of type: jpg, jpeg, png.').show();
    return false;
  }

  $(validationMessageSelector).hide();
  return true;
};
/******/ })()
;