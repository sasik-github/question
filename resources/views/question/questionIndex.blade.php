@extends('layouts.app')

@section('slider_image')
slide-2.jpg
@endsection


@section('content')


    <div class="page-header">
        <h1>Frage <span id="question-current-number">1</span> von <span id="question-count">XX</span></h1>
        <div class="progress">
            <div id="progress-bar" class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                <span class="sr-only" id="progress-bar-label">10% Complete</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            <div class="col-sm-offset-2 col-sm-10">
                <h2>Wie hoch darf ich mit meinem Quadrocopter fliegen?</h2>
            </div>

            <form class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="radio">
                            <h3><input id="option1" type="radio" name="optionsRadios" value="option1" checked><label for="option1">10 m</label></h3>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="radio">
                            <h3><input id="option2" type="radio" name="optionsRadios" value="option2" checked><label for="option2">50 m</label></h3>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="radio">
                            <h3><input id="option3" type="radio" name="optionsRadios" value="option3" checked><label for="option3">100 m</label></h3>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a id="prev-question-btn" type="submit" class="btn btn-default">zurück zur vorherigen Frage</a>
                        <a id="next-question-btn" type="submit" class="btn btn-primary">Weiter zur nächsten Frage</a>
                    </div>
                </div>
            </form>

        </div>
        <div class="col-md-1"></div>
    </div>

    <script src="/js/questions.js"></script>
@endsection