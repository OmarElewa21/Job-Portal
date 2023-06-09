/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!********************************************************************!*\
  !*** ./resources/assets/js/candidate_profile/candidate_profile.js ***!
  \********************************************************************/
 // open edit user profile model

$(document).on('click', '.editProfileModal', function (event) {
  renderProfileData();
});

window.renderProfileData = function () {
  $.ajax({
    url: profileUrl,
    type: 'GET',
    success: function success(result) {
      if (result.success) {
        var user = result.data;
        var candidate = result.data.candidate;
        $('#editUserId').val(user.id);
        $('#firstName').val(user.first_name);
        $('#lastName').val(user.last_name);
        $('#editEmail').val(user.email);
        $('#editphoneNumber').val(user.phone);

        if (isEmpty(candidate.candidate_url)) {
          $('#editpreviewImage').attr('src', defaultImageUrl);
        } else {
          $('#editpreviewImage').attr('src', candidate.candidate_url);
        }

        $('#editProfileModal').appendTo('body').modal('show');
      }
    }
  });
};

$(document).on('change', '#editprofile', function () {
  if (isValidFile($(this), '#validationErrorsBoxCandidate')) {
    validatePhoto(this, '#editpreviewImage');
  }
});

window.validatePhoto = function (input, selector) {
  var displayPreview = true;

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var image = new Image();
      image.src = e.target.result;

      image.onload = function () {
        if (image.height / image.width !== 1) {
          $('#validationErrorsBoxCandidate').removeClass('d-none');
          $('#validationErrorsBoxCandidate').html(Lang.get('messages.common.image_aspect_ratio')).show();
          $('#btnPrEditSave').prop('disabled', true);
          return false;
        }

        $('#validationErrorsBoxCandidate').addClass('d-none');
        $(selector).attr('src', e.target.result);
        $('#btnPrEditSave').prop('disabled', false);
        displayPreview = true;
      };
    };

    if (displayPreview) {
      reader.readAsDataURL(input.files[0]);
      $(selector).show();
    }
  }
};

$(document).on('submit', '#editProfileForm', function (event) {
  event.preventDefault();
  var loadingButton = jQuery(this).find('#btnPrEditSave');
  loadingButton.button('loading');
  $.ajax({
    url: profileUpdateUrl,
    type: 'post',
    data: new FormData($(this)[0]),
    processData: false,
    contentType: false,
    success: function success(result) {
      $('#editProfileModal').modal('hide');
      location.reload();
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
});
$('#changePasswordModal').on('shown.bs.modal', function () {
  $(this).find('[autofocus]').focus();
});
$(document).on('submit', '#changePasswordForm', function (event) {
  event.preventDefault();
  var isValidate = validatePassword();

  if (!isValidate) {
    return false;
  }

  var loadingButton = jQuery(this).find('#btnPrPasswordEditSave');
  loadingButton.button('loading');
  $.ajax({
    url: changePasswordUrl,
    type: 'post',
    data: new FormData($(this)[0]),
    processData: false,
    contentType: false,
    success: function success(result) {
      if (result.success) {
        $('#changePasswordModal').modal('hide');
        displaySuccessMessage(result.message);
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
});

function validatePassword() {
  var currentPassword = $('#pfCurrentPassword').val().trim();
  var password = $('#pfNewPassword').val().trim();
  var confirmPassword = $('#pfNewConfirmPassword').val().trim();

  if (currentPassword == '' || password == '' || confirmPassword == '') {
    $('#editPasswordValidationErrorsBox').show().html(Lang.get('messages.user.required_field_messages'));
    return false;
  }

  return true;
}

$(document).on('submit', '#changeLanguageForm', function (event) {
  event.preventDefault();
  var loadingButton = jQuery(this).find('#btnLanguageChange');
  loadingButton.button('loading');
  $.ajax({
    url: updateLanguageURL,
    type: 'post',
    data: new FormData($(this)[0]),
    processData: false,
    contentType: false,
    success: function success(result) {
      $('#changePasswordModal').modal('hide');
      displaySuccessMessage(result.message);
      setTimeout(function () {
        location.reload();
      }, 1500);
    },
    error: function error(result) {
      manageAjaxErrors(result, 'editProfileValidationErrorsBox');
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
});
$('#editProfileModal').on('hidden.bs.modal', function () {
  resetModalForm('#editProfileForm', '#validationErrorsBoxCandidate');
  $('#btnPrEditSave').prop('disabled', false);
});
$('#changePasswordModal').on('hidden.bs.modal', function () {
  resetModalForm('#changePasswordForm', '#editPasswordValidationErrorsBox');
});
$('.changePasswordModal').on('click', function () {
  $('#changePasswordModal').appendTo('body').modal('show');
});
$('.changeLanguageModal').on('click', function () {
  $('#changeLanguageModal').appendTo('body').modal('show');
});
$('#changeLanguageModal').on('hidden.bs.modal', function () {
  resetModalForm('#changeLanguageForm', '#editProfileValidationErrorsBox');
  $('#language').trigger('change.select2');
});
$(document).ready(function () {
  $('#language').select2({
    width: '100%'
  });
});
/******/ })()
;