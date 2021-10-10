@extends('candidate.layouts.app')
@section('title')
    {{ __('messages.quizzes_title') }}
@endsection
@stack('page-css')
@push('css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
    <section class="section profile">
        <div class="section-header">
            <h1>{{ __('messages.quizzes_title') }}</h1>
        </div>

        <div class="section-body">
            <div class="card">
                @include('layouts.errors')
                <div class="card-body py-0 mt-2">
                    @include('candidate.quiz_take.taken')
                </div>
            </div>
        </div>
    </section>
@endsection

