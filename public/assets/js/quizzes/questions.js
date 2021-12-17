/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************************!*\
  !*** ./resources/assets/js/quizzes/questions.js ***!
  \**************************************************/
/* 
* Helper Functions
*/
function settings_adjust() {
  var last_answer = document.getElementsByClassName('fa-plus-circle');
  var is_true_checkbox = document.getElementsByClassName('is-true');

  for (var i = 0; i < last_answer.length; i++) {
    last_answer[i].classList.remove('last_answer');

    if (i == last_answer.length - 1) {
      last_answer[i].classList.add('last_answer');
    }

    is_true_checkbox[i].setAttribute('name', 'is_true_answer[' + i + ']');
  }
}

function settings_adjust_foredit() {
  var last_answer = document.getElementsByClassName('i-add');
  var is_true_checkbox = document.getElementsByClassName('is-true-foredit');

  for (var i = 0; i < last_answer.length; i++) {
    last_answer[i].classList.remove('last_answer');

    if (i == last_answer.length - 1) {
      last_answer[i].classList.add('last_answer');
    }

    is_true_checkbox[i].setAttribute('name', 'is_true_answer[' + i + ']');
  }
}

function add_answer() {
  var answer_element = $('.answer-box').first().clone(true);
  answer_element.find('.text-area').val("");
  answer_element.find('.is-true').prop('checked', false);
  answer_element.find('.fa-plus-circle').addClass('last_answer');
  $('#answers').append(answer_element);
  settings_adjust();
}

function remove_answer(element) {
  if (document.getElementsByClassName('answer-box').length > 2) {
    element.parentElement.parentElement.remove();
  } else {
    $("#answers").notify("Can't Have Less Than Two Answers");
  }

  settings_adjust();
}

function add_answer_foredit() {
  var answer_element = $('.answer-box_edit').first().clone(true);
  answer_element.find('.text-area').val("");
  answer_element.find('.is-true').prop('checked', false);
  answer_element.find('.fa-plus-circle').addClass('last_answer');
  $('#answers_edit').append(answer_element);
  settings_adjust_foredit();
}

function remove_answer_foredit(element) {
  if (document.getElementsByClassName('answer-box_edit').length > 2) {
    element.parentElement.parentElement.remove();
  } else {
    $("#answers_edit").notify("Can't Have Less Than Two Answers");
  }

  settings_adjust_foredit();
}

var tableName = '#questionsTbl';
$(tableName).DataTable({
  columnDefs: [{
    bSortable: false,
    targets: [1, 2]
  }]
});
$('.addQuestionModal').click(function () {
  $('#addQuestion').appendTo('body').modal('show');
});
var questions = {
  "delete": function _delete(id) {
    $.confirm({
      title: 'Confirm!',
      content: 'Are You Sure, Do you want to remove this question ? ',
      buttons: {
        Yes: {
          text: 'Yes',
          btnClass: 'btn-blue',
          action: function action() {
            $.ajax({
              url: '/admin/questions/' + id,
              type: 'POST',
              success: setTimeout(function () {
                window.location.reload();
              }, 1000)
            });
          }
        },
        No: {
          text: 'No',
          action: function action() {}
        }
      }
    });
  },
  edit: function edit(id) {
    $.ajax({
      url: '/questions/' + id,
      type: 'GET',
      success: function success(result) {
        document.getElementById('editQuestion').innerHTML = result;
        $('#editQuestion').appendTo('body').modal('show');
        settings_adjust_foredit();
      }
    });
  }
};
/******/ })()
;