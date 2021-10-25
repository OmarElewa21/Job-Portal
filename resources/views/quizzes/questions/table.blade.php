<table class="table table-responsive-sm table-striped table-bordered" id="questionsTbl">
    <thead>
        <tr>
            <th scope="col" class="col-4">{{ __('messages.quizzes.question_text') }}</th>
            <th scope="col" class="col-5">{{ __('messages.quizzes.question_answers') }}</th>
            <th scope="col" class="col-1">{{ __('messages.quizzes.answer_weight') }}</th>
            <th scope="col" class="col-1">{{ __('messages.quizzes.is_checkbox') }}</th>
            <th scope="col" class="col-1"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($questionsList as $question)
            <tr>
                <td class="regular-color">
                    <div>
                        {{ $question->question_text }}
                    </div>
                </td>

                <td class="regular-color">
                    @foreach ($question->question_answers as $answer)
                        <div class="pt-3">{{ $answer->answer_text }} </div>
                    @endforeach
                </td>

                <td class="regular-color">
                    @foreach ($question->question_answers as $answer)
                    <div class="pt-3">{{ $answer->answer_weight }} </div>
                    @endforeach
                </td>

                <td>
                    @if($question->checkbox)
                        <i class="fas fa-check-circle text-success check"></i>
                    @else
                        <i class="fas fa-times-circle text-danger check"></i>
                    @endif
                </td>

                <td>
                    <div class="d-flex">
                        <a class="pl-1 pr-1 m-auto editQuizModal" href="#" title="Edit" onclick="questions.edit('{{$question->id}}')">
                            <i class="fas fa-edit details"></i>
                        </a>
                        <a class="pl-2 m-auto {{ $disable_delete ? 'd-none' : '' }}" href="#" title="Delete" onclick="questions.delete('{{$question->id}}')">
                            <i class="fas fa-trash-alt text-danger details"></i>  
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>

<style>
    .check{
        font-size: 20px;
    }
    .is-correct{
        color: green;
    }
    .regular-color{
        color: black;
    }
    .details{
        font-size: medium;
    }
</style>