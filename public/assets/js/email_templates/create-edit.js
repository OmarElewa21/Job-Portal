(()=>{"use strict";$(document).ready((function(){$("#body").summernote({minHeight:200,height:200,dialogsInBody:!0,toolbar:[["style",["style"]],["font",["bold","underline","clear"]],["color",["color"]],["para",["ul","ol","paragraph"]],["table",["table"]],["insert",["link","picture"]],["view",["codeview"]]]}),$(document).on("submit","#editEmailTemplateForm",(function(e){if(!checkSummerNoteEmpty("#body","Body field is required.",1))return e.preventDefault(),!0})),$(document).on("click",".note-link-btn",(function(e){e.preventDefault();var o=$(".note-form-group .note-link-text").val().trim().length,r=$(".note-form-group .note-link-url").val().trim().length;return 0==o?(displayErrorMessage("Text Field is required."),$(".link-dialog").modal("show"),!1):0!=r||(displayErrorMessage("Url Field is required."),$(".link-dialog").modal("show"),!1)})),$(document).on("click",".note-image-btn",(function(e){var o=$(".note-group-image-url .note-image-url").val().trim().length,r=$(".note-modal:eq(1)");return 0==o?(r.show(),r.addClass("show"),displayErrorMessage("Url Field is required."),!1):(r.hide(),r.removeClass("show"),!0)})),$(".note-modal .form-group label").append(' <span class="text-danger">*</span>')}))})();