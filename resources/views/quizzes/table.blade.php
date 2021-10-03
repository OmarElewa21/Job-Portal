<table class="table table-responsive-sm table-striped table-bordered" id="quizzesTbl">
    <thead>
    <tr>
        <th scope="col" class="col-2">{{ __('messages.quizzes.quiz_name') }}</th>
        <th scope="col" class="col-5">{{ __('messages.quizzes.quiz_description') }}</th>
        <th scope="col" class="col-2">{{ __('messages.quizzes.quiz_created_by') }}</th>
        <th scope="col" class="col-1"></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($ListOfQuizzes as $Quiz)
        <tr>
        <td class="regular-color">{{ $Quiz->quiz_name }}</td>
        <td class="regular-color">{{ $Quiz->quiz_description }}</td>
        <td class="regular-color">{{ $Quiz->email }}</td>
        <td class="d-flex">
            <div class="d-flex">
                <a class="pr-2 m-auto" href="{{ route('quizzes.show', $Quiz->id) }}" title="View">
                    <i class="fas fa-sign-in-alt text-info details"></i>
                </a>
                <a class="pl-1 pr-1 m-auto editQuizModal" href="#" title="Edit" onclick="quizzes.edit('{{$Quiz->id}}')">
                    <i class="fas fa-edit details"></i>
                </a>
                <a class="pl-2 m-auto" href="#" title="Delete" onclick="quizzes.delete('{{$Quiz->id}}')">
                    <i class="fas fa-trash-alt text-danger details"></i>  
                </a>
            </div>
        </td>
        </tr>
        @endforeach

    </tbody>
</table>
<style>
    .details{
        font-size: medium;
    }
    .regular-color{
        color: black;
    }
</style>