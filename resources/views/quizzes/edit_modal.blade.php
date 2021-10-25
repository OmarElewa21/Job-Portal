{{$quiz['name']}}

<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"
                id="QuizeditHeader">{{ __('messages.quizzes.edit_quiz') }}</h5>
            <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
        </div>
        {!! Form::open(['id'=>'editNewForm']) !!}
        <div class="modal-body">
            <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
            <div class="row">
                <div class="form-group col-sm-12">
                    {!! Form::label('category', __('messages.quizzes.category').':') !!}<span class="text-danger">*</span>
                    <div class="d-flex justify-content-around">
                        <select name="category" class="form-control col-sm-8" id='edit_category_name_select_input'>
                            @foreach ($categories as $category)
                                <option value="{{$category->name}}" {{ $category->name == $quiz['category_name'] ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        {!! Form::text('other', null, ['id'=>'edit_category_name_text_input','class' => 'form-control col-sm-8 d-none']) !!}
                        <button class="btn btn-primary btn-sm mb-1" type="button" onclick="editCategory(this)">Add New Category</button>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    {!! Form::label('name', __('messages.quizzes.name').':') !!}<span class="text-danger">*</span>
                    {!! Form::text('name', $quiz['name'], ['id'=>'edit_name','class' => 'form-control','required']) !!}
                </div>
                <div class="form-group col-sm-12">
                    {!! Form::label('Description', __('messages.quizzes.description').':') !!}
                    {!! Form::textarea('description', $quiz['description'], ['id'=>'edit_description', 'class' => 'description-box']) !!}
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['class' => 'btn btn-primary','id'=>'editbtnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<style>
    .text-right{
        position: relative;
        left: 70%;
    }
    @media screen and (max-width: 480px) {
        .text-right{
            position: relative;
            left: 60%;
        } 
    }
    .description-box {
        width: 100%;
        height: 70%;
    }
</style>