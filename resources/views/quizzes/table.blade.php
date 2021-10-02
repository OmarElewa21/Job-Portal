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
        <td>{{ $Quiz->quiz_name }}</td>
        <td>{{ $Quiz->quiz_description }}</td>
        <td>{{ $Quiz->email }}</td>
        <td class="d-flex">
            <a class="pr-2 m-auto" href="{{ route('quizzes.show', $Quiz->id) }}" title="View">
                <i class="fas fa-eye text-info"></i>
            </a>
            <a class="pl-1 pr-1 m-auto editQuizModal" href="#" title="Edit" onclick="quizzes.edit('{{$Quiz->id}}')">
                <i class="fas fa-edit"></i>
            </a>
            <a class="pl-2 m-auto" href="#" title="Delete" onclick="quizzes.delete('{{$Quiz->id}}')">
                <i class="fas fa-trash-alt text-danger"></i>  
            </a>
        </td>
        </tr>
        @endforeach

    </tbody>
</table>