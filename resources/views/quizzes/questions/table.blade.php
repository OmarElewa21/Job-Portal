<table class="table table-responsive-sm table-striped table-bordered" id="questionsTbl">
    <thead>
    <tr>
        <th scope="col" class="col-4">{{ __('messages.quizzes.question_text') }}</th>
        <th scope="col" class="col-5">{{ __('messages.quizzes.question_answers') }}</th>
        <th scope="col" class="col-1">{{ __('messages.quizzes.answer_weight') }}</th>
        <th scope="col" class="col-1">{{ __('messages.quizzes.is_optional') }}</th>
        <th scope="col" class="col-1"></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($questionsList as $question)
        <tr>
        <td class="regular-color">{{ $question->question_text }}</td>
        <td>
            @if (!empty($question->question_answers))
                @foreach ($question->question_answers as $answer)
                    <div class="mt-2">
                        <span class="regular-color"> {{ $answer->answer_text }} <span>
                    <div>
                @endforeach
            @endif
        </td>
        <td class="regular-color">
            @if (!empty($question->question_answers))
                @foreach ($question->question_answers as $answer)
                    <div class="mt-2">
                        <span class="regular-color"> {{ $answer->answer_weight }} <span>
                    <div>
                @endforeach
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
                <a class="pl-1 pr-1 m-auto editQuizModal" href="#" title="Edit" onclick="questions.edit('{{$question->id}}')">
                    <i class="fas fa-edit details"></i>
                </a>
                <a class="pl-2 m-auto" href="#" title="Delete" onclick="questions.delete('{{$question->id}}')">
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