/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************************************!*\
  !*** ./resources/assets/js/candidate/front/candidate-details.js ***!
  \******************************************************************/
$(document).ready(function () {
  'use strict';

  $(document).on('submit', '#reportToCandidate', function (e) {
    e.preventDefault();
    processingBtn('#reportToCandidate', '#btnSave', 'loading');
    $.ajax({
      url: reportToCandidateUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#reportToCandiateModal').modal('hide');
          $('.reportToCandidate').prop('disabled', true);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#reportToCandidate', '#btnSave');
      }
    });
  });
});
/******/ })()
;