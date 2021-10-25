<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"
                id="QuestionAddHeader">{{ __('messages.quizzes.new_question') }}</h5>
            <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
        </div>
        {!! Form::open(['id'=>'editForm', 'route' => ['question.update', 'id' => $question->id], 'method' => 'PUT']) !!}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="option-box w-100 d-flex justify-content-between">
                        <div class="options">
                            <input type="checkbox" name="is_checkbox" class="ml-4 mr-1">
                            <label class="option-label regular-color"> Can accept multiple answers </label> <br>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 mt-3">
                        {!! Form::label('name', __('messages.quizzes.question_text').':', ['class' => 'regular-color']) !!}<span class="text-danger">*</span><br>
                        <textarea id= 'question_text' name='question_text' class="text-area ml-2" rows="1" required>{{$question->question_text}}</textarea><br>
                    </div>

                    <div class="form-group col-sm-12" id="answers_edit">
                        <div class="answer-labels w-100 d-flex justify-content-between">
                            <label></label>
                            <label class="regular-color">Answers</label>
                            <label class="regular-color mr-1">Points</label>
                        </div>
                        
                        @foreach($question->answers as $index=>$answer)

                        <div class="d-flex answer-box_edit d-flex justify-content-between align-items-center">
                            <div class="answer-subbox d-flex justify-content-around align-items-center">
                                <i class="fas fa-minus-circle answer-fas text-danger" onclick="remove_answer_foredit(this)"></i>
                                <textarea name="answer_text[]" class="text-area mb-1" rows="1" required> {{$answer->answer_text}} </textarea>
                                <i class="fas fa-plus-circle i-add answer-fas text-success" onclick="add_answer_foredit()"></i>
                            </div>
                            <input type="number" class="answer_weight-foredit" name="answer_weight[{{$index}}]" size="3" value="{{$answer->answer_weight}}" required>
                        </div>
                        @endforeach

                    </div>

                    <div class="text-right">
                        {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary mr-1','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                        <button type="button" id="btnCancel" class="btn btn-light"
                                data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                    </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<style>
    .text-right{
        position: relative;
        left: 80%;
    }
    @media screen and (max-width: 480px) {
        .text-right{
            position: relative;
            left: 60%;
        } 
    }

    .modal-dialog{
        max-width: 700px;
    }

    .regular-color {
        color: black;
    }
    .option-label {
        font-size: small;
    }
    
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number] {
    -moz-appearance: textfield;
    }

    .text-area{
        width: 90%;
    }

    .answer-subbox {
        width: 90%;
    }

    .answer-fas {
        font-size: large;
    }

    .answer-fas:hover {
        cursor: pointer;
    }

    .fa-plus-circle{
        visibility: hidden;
    }

    .last_answer{
        visibility: visible;
    }
</style>
