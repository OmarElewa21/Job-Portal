<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('messages.quizzes.list_candidates') }}</h5>
        </div>

        {!! Form::open(['id'=>'load_candidates', 'route' => ['quiz.candidate.store', 'quiz_id' => $quiz_id]]) !!}
        <div class="card-body">
            <table class="table table-responsive-sm table-striped table-bordered" id="load-candidates-table">
                <thead>
                    <tr>
                        <th scope="col" class="col-4">{{ __('messages.quizzes.candidate_name') }}</th>
                        <th scope="col" class="col-4">{{ __('messages.quizzes.candidate_email') }}</th>
                        <th scope="col" class="col-2">{{ __('messages.quizzes.select_to_send') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($candidates as $candidate)
                        <tr>
                            <td> {{$candidate->first_name}} {{$candidate->last_name}} </td>
                            <td> {{$candidate->email}} </td>
                            <td>
                                <input type="checkbox" name='list[{{$candidate->id}}]' {{$candidate->checked == 1 ? 'checked' : ''}}>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right mb-3 mt-2 mr-2">
                {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary mr-1','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" id="btnCancel" class="btn btn-light"
                                    data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<style>
    .modal-dialog{
        max-width: 80%;
    }
</style>

