function addCategory(elem){
    if(!$('#category_name_select_input').hasClass('d-none')){
        $('#category_name_select_input').addClass('d-none');
        $('#category_name_text_input').removeClass('d-none');
        $('#category_name_text_input').attr('required', true);
        $('#category_name_text_input').attr('name', 'category');
        elem.textContent = "Select Category";
    }
    else{
        $('#category_name_text_input').addClass('d-none');
        $('#category_name_select_input').removeClass('d-none');
        $('#category_name_text_input').attr('required', false);
        $('#category_name_text_input').attr('name', 'other');
        elem.textContent = "Add New Category";
    }
}

function editCategory(elem){
    if(!$('#edit_category_name_select_input').hasClass('d-none')){
        $('#edit_category_name_select_input').addClass('d-none');
        $('#edit_category_name_text_input').removeClass('d-none');
        $('#edit_category_name_text_input').attr('required', true);
        $('#edit_category_name_text_input').attr('name', 'category');
        elem.textContent = "Select Category";
    }
    else{
        $('#edit_category_name_text_input').addClass('d-none');
        $('#edit_category_name_select_input').removeClass('d-none');
        $('#edit_category_name_text_input').attr('required', false);
        $('#edit_category_name_text_input').attr('name', 'other');
        elem.textContent = "Add New Category";
    }
}

$('#quizzesTbl').DataTable();

$('#load-candidates-table').DataTable({
    paging: false,
    searching: true
});

$('.addQuizModal').click(function () {
    $('#addQuiz').appendTo('body').modal('show');
});

let quizzes = {
    delete : function(id){
        $.confirm({
            title: 'Confirm!',
            content: 'Are You Sure, Do you want to remove this quiz ? ',
            buttons: {
                Yes: {
                    text: 'Yes',
                    btnClass: 'btn-blue',
                    action: function(){
                        $.ajax({
                            url: '/admin/quizzes/' + id,
                            type: 'DELETE',
                            success: setTimeout(function() {
                                window.location.reload();
                            }, 2000),
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

    edit : function(id){
        $.ajax({
            url: '/admin/quizzes/' + id + '/edit',
            type: 'GET',
            success: function(result) {
                document.getElementById('editQuiz').innerHTML = result;
                $('#editQuiz').appendTo('body').modal('show');
                $('#editbtnSave').click(function(){
                    $.ajax({
                        url: '/admin/quizzes/' + id,
                        type: 'PUT',
                        data: $('#editNewForm').serialize(),
                        success: setTimeout(function() {
                            window.location.reload();
                        }, 500)
                    })
                });
            }
        })
    },

    load_candidates : function($quiz_id){
        $.ajax({
            url: '/admin/users/candidates/' + $quiz_id,
            type: 'GET',
            success: function(result){
                document.getElementById('load_candidates').innerHTML = result;
                $('#load_candidates').appendTo('body').modal('show');
            }
        })
    }
}
