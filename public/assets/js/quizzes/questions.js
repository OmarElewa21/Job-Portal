/* 
* Helper Functions
*/
function settings_adjust(){
    let last_answer = document.getElementsByClassName('fa-plus-circle');
    let answer_weight = document.getElementsByClassName('answer_weight');

    for(let i=0; i<last_answer.length; i++){
        last_answer[i].classList.remove('last_answer');
        if(i == last_answer.length - 1){
            last_answer[i].classList.add('last_answer');
        }
        answer_weight[i].setAttribute('name', 'answer_weight[' + i + ']')
    }
}

function settings_adjust_foredit(){
    let last_answer = document.getElementsByClassName('i-add');
    let answer_weight = document.getElementsByClassName('answer_weight-foredit');

    for(let i=0; i<last_answer.length; i++){
        last_answer[i].classList.remove('last_answer');
        if(i == last_answer.length - 1){
            last_answer[i].classList.add('last_answer');
        }
        answer_weight[i].setAttribute('name', 'answer_weight[' + i + ']')
    }
}

function add_answer(){
    let answer_element = $('.answer-box').first().clone(true);
    answer_element.find('.text-area').val("");
    answer_element.find('.answer_weight').val("");
    answer_element.find('.fa-plus-circle').addClass('last_answer')
    $('#answers').append(answer_element);
    settings_adjust()
}

function remove_answer(element){
    if(document.getElementsByClassName('answer-box').length > 2){
        element.parentElement.parentElement.remove();
    }
    else{
        $("#answers").notify("Can't Have Less Than Two Answers");
    }
    settings_adjust()
}

function add_answer_foredit(){
    let answer_element = $('.answer-box_edit').first().clone(true);
    answer_element.find('.text-area').val("");
    answer_element.find('.answer_weight-foredit').val("");
    answer_element.find('.fa-plus-circle').addClass('last_answer')
    $('#answers_edit').append(answer_element);
    settings_adjust_foredit()
}

function remove_answer_foredit(element){
    if(document.getElementsByClassName('answer-box_edit').length > 2){
        element.parentElement.parentElement.remove();
    }
    else{
        $("#answers_edit").notify("Can't Have Less Than Two Answers");
    }
    settings_adjust_foredit()
}


let tableName = '#questionsTbl';

$(tableName).DataTable({
    columnDefs: [
        {bSortable: false, targets: [1,2,3,4]} 
    ],
});

$('.addQuestionModal').click(function () {
    $('#addQuestion').appendTo('body').modal('show');
});

let questions = {
    delete : function(id){
        $.confirm({
            title: 'Confirm!',
            content: 'Are You Sure, Do you want to remove this question ? ',
            buttons: {
                Yes: {
                    text: 'Yes',
                    btnClass: 'btn-blue',
                    action: function(){
                        $.ajax({
                            url: '/admin/questions/' + id,
                            type: 'POST',
                            success: setTimeout(function() {
                                window.location.reload();
                            }, 1000)
                        });
                    }
                },
                No: {
                    text: 'No',
                    action: function(){
                    }
                }
            }
        });
    },

    edit: function(id){
        $.ajax({
            url: '/questions/' + id,
            type: 'GET',
            success: function(result) {
                document.getElementById('editQuestion').innerHTML = result;
                $('#editQuestion').appendTo('body').modal('show');
                settings_adjust_foredit();
            }
        })
    }
}
