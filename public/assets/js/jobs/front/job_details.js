/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************************!*\
  !*** ./resources/assets/js/jobs/front/job_details.js ***!
  \*******************************************************/
$(document).ready(function () {
  isJobAddedToFavourite ? $('.favouriteText').text(removeFromFavorite) : $('.favouriteText').text(addToFavorites);
  $('#jobUrl').val(window.location.href);
  $('#addToFavourite').on('click', function () {
    var userId = $(this).data('favorite-user-id');
    var jobId = $(this).data('favorite-job-id');
    $.ajax({
      url: addJobFavouriteUrl,
      type: 'POST',
      data: {
        '_token': $('meta[name="csrf-token"]').attr('content'),
        'userId': userId,
        'jobId': jobId
      },
      success: function success(result) {
        if (result.success) {
          result.data ? $('.favouriteText').text(removeFromFavorite) : $('.favouriteText').text(addToFavorites);
          displaySuccessMessage(result.message);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      }
    });
  });
  $(document).on('submit', '#reportJobAbuse', function (e) {
    e.preventDefault();
    processingBtn('#reportJobAbuse', '#btnSave', 'loading');
    $.ajax({
      url: reportAbuseUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#reportJobAbuseModal').modal('hide');
          $('.reportJobAbuse').prop('disabled', true);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#reportJobAbuse', '#btnSave');
      }
    });
  }); // email job to friend

  $(document).on('submit', '#emailJobToFriend', function (e) {
    e.preventDefault();
    processingBtn('#emailJobToFriend', '#btnSendToFriend', 'loading');
    $.ajax({
      url: emailJobToFriend,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#friendName,#friendEmail').val('');
          $('#emailJobToFriendModal').modal('hide');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#emailJobToFriend', '#btnSendToFriend');
      }
    });
  });
});
/******/ })()
;