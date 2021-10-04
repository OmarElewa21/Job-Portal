@extends('layouts.app')
@section('title')
    {{ __('messages.quizzes.quiz_question_title') }}
@endsection
@push('css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $quiz_name }}</h1>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-primary form-btn addQuestionModal back-btn-right">{{ __('messages.quizzes.question_add') }}
                    <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('quizzes.questions.table')
                </div>
            </div>
        </div>
        @include('quizzes.questions.add_modal')
    </section>
@endsection

@push('scripts')
    <script>
        let quizStoreUrl = "{{ route('quizzes.store') }}";
    </script>
    <script src="{{asset('assets/js/jquery-confirm.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/notify.min.js')}}"></script>
    <script src="{{mix('assets/js/quizzes/questions.js')}}"></script>
@endpush
