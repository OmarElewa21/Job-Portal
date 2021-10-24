<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> {{$quiz_name}} | {{config('app.name')}} </title>
    <link rel="shortcut icon" href="{{ getSettingValue('favicon') }}" type="image/x-icon">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
</head>

<body>
    <div class="container-fluid">
        <header class="d-flex justify-content-between align-items-center border-bottom p-3 mb-5">
            <div class="ml-5">
                <a href="{{ route('quizzes.pending') }}" class="d-flex align-items-center back">
                    <i class="fas fa-arrow-left mr-2 d-flex align-items-end"></i>
                    <span class="font-weight-bold">Back</span>
                </a>
            </div>
            <div class="mr-5 d-flex">
                <h4 class="font-weight-bold">Quiz# </h4> <span class="h4 ml-2">{{$quiz_name}}</span>
            </div>
            <div></div>
        </header>
    
        <main class="container">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
            <div class="mb-4">
                <div class="mr-5 d-flex">
                    <h3 class="font-weight-bold">Quiz# </h3> <span class="h3 ml-2">{{$quiz_name}}</span>
                </div>
                <div class="d-flex">
                    <p class="font-weight-bold mr-1"> Total points: </p> <span>{{$total_points}}</span>
                </div>
            </div>
    
            {{ Form::open(['id' => 'take-quiz', 'route' => ['take-quiz.store', 'total_points' => $total_points, 'quiz_id' => $quiz_id]])}}
            <section class="w-100">
                    
                @foreach($questions as $index=>$question)
    
                    <div class="w-100 d-flex justify-content-between mb-5">
                        <div>
                            <div class="mb-3">
                                <span class="font-weight-bold mr-1">{{$index+1}}.</span> <span style="{{ $question->is_optional == 1 ? "color:green;" : '' }}">{{$question->question_text}} {{ $question->is_optional == 1 ? "(Bonus+)" : "" }}<span>
                            </div>
        
                            <div>
                                <ul>
                                    @foreach ($question->question_answers as $answer)
                                    <div class="d-flex">
                                        <input name="{{$question->is_one_choice_answer == 1 ? 'question[' . $question->id .']' : 'question_multi_answers[' . $answer->id . ']'}}" value="{{$answer->id}}" type="{{ $question->is_one_choice_answer == 1 ? 'radio' : 'checkbox'}}" class="mb-1" style="font-size:large; line-height: 1.4; padding:20px;">
                                        <li class="ml-3 mb-2"> {{ $answer->answer_text }} </li>
                                    </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <aside>
                            <p style="background-color:#FCFFA6;"> <span> {{$question->is_optional == 1 ? "+" : ""}} </span> {{ round($question->question_weight) }} <span> points </span></p>
                        </aside>
                    </div>
                @endforeach
                <div class="text-center mb-5">
                    <input class="submit p-1 pr-5 pl-5" type="submit" value="Send my answers">
                </div>
            </section>
            {{ Form::close() }}
        </main>
    </div>

    <style>
        .back {
            font-size: large;
        }
        .back:hover{
            text-decoration: none;
        }
        ul {
            list-style-type: none;
        }
        .width-100 {
            width: 100%;
        }
        .submit {
            background-color:#0062FA;
            color:white
        }
        .submit:hover {
            background-color: #003FFE;
        }
    </style>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(".alert").delay(3000).slideUp(300);
        });
    </script>
</body>


