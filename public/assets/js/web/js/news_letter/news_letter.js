/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!***************************************************************!*\
  !*** ./resources/assets/js/web/js/news_letter/news_letter.js ***!
  \***************************************************************/


$(document).on('submit', '#newsLetterForm', function (event) {
  event.preventDefault();
  var email = $('#mc-email').val();
  var emailExp = new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
  var emailCheck = email == '' ? true : email.match(emailExp) ? true : false;

  if (!emailCheck) {
    displayErrorMessage('Please enter a valid Email');
    return false;
  }

  var loadingButton = jQuery(this).find('#btnLetterSave');
  loadingButton.button('loading');
  $.ajax({
    url: createNewLetterUrl,
    type: 'post',
    data: new FormData($(this)[0]),
    processData: false,
    contentType: false,
    success: function success(result) {
      displaySuccessMessage(result.message);
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      $('#mc-email').val('');
      loadingButton.button('reset');
    }
  });
});
/******/ })()
;