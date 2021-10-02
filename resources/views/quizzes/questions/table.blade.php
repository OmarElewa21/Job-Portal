<table class="table table-responsive-sm table-striped table-bordered" id="questionsTbl">
    <thead>
    <tr>
        <th scope="col" class="col-3">{{ __('messages.quizzes.question_text') }}</th>
        <th scope="col" class="col-5">{{ __('messages.quizzes.question_answers') }}</th>
        <th scope="col" class="col-1">{{ __('messages.quizzes.question_grade') }}</th>
        <th scope="col" class="col-1">{{ __('messages.quizzes.is_multiple_choice') }}</th>
        <th scope="col" class="col-1">{{ __('messages.quizzes.is_optional') }}</th>
        <th scope="col" class="col-1"></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($questionsList as $question)
        <tr>
        <td class="regular-color">{{ $question->question_text }}</td>
        <td>
            @if (!empty($question->ListOfAnswers))
                @foreach ($question->ListOfAnswers as $answer)
                    <span class="{{ $answer->is_true_answer == 1 ? 'is-correct' : 'regular-color'}}"> {{ $answer->answer_text }} <span></br></br>
                @endforeach
            @endif
        </td>
        <td class="regular-color">{{ $question->question_weight }} marks</td>
        <td>
            @if(!$question->is_one_choice_answer)
                <i class="fas fa-check-circle text-success check"></i>
            @else
                <i class="fas fa-times-circle text-danger check"></i>
            @endif
        </td>
        <td>
            @if($question->is_optional)
                <i class="fas fa-check-circle text-success check"></i>
            @else
                <i class="fas fa-times-circle text-danger check"></i>
            @endif
        </td>
        <td>
            <div class="d-flex">
                <a class="pr-2 m-auto" href="{{ route('quizzes.show', $question->id) }}" title="View More Details">
                    <i class="fas fa-eye text-info"></i>
                </a>
                <a class="pl-1 pr-1 m-auto editQuizModal" href="#" title="Edit" onclick="quizzes.edit('{{$question->id}}')">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="pl-2 m-auto" href="#" title="Delete" onclick="quizzes.delete('{{$question->id}}')">
                    <i class="fas fa-trash-alt text-danger"></i>  
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
</style>