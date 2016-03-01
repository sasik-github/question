@extends('layouts.app')

@section('slider_image')
slide-2.jpg
@endsection


@section('content')


    @include('question._progressBar')

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <div class="col-sm-offset-2 col-sm-10">
                <h2 id="question-text">Wie hoch darf ich mit meinem Quadrocopter fliegen?</h2>
            </div>

            @include('question._answersContainer')

            @include('question._controlls')

        </div>
        <div class="col-md-1"></div>
    </div>

    <script src="/js/questions.js"></script>
@endsection
