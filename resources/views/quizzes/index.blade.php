@extends('layouts.app')
@section('title')
    {{ __('messages.quizzes.quizzes_title') }}
@endsection
@push('css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.quizzes.quizzes_title') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-primary form-btn addQuizModal back-btn-right">{{ __('messages.quizzes.quiz_add') }}
                    <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('quizzes.table')
                </div>
            </div>
        </div>
        @include('quizzes.add_modal')
        <div id="editQuiz" class="modal fade" role="dialog"></div>

        <div id='load_candidates' class="modal fade" role="dialog"></div>
    </section>
@endsection

@push('scripts')
    <script>
        let quizStoreUrl = "{{ route('quizzes.store') }}";
    </script>
    <script src="{{asset('assets/js/jquery-confirm.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{mix('assets/js/quizzes/quizzes.js')}}?<?= time() ?>"></script>
@endpush
