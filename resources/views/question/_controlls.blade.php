<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="row">
            <a id="prev-question-btn" type="button" class="btn btn-default">zurück zur vorherigen Frage</a>
            <a id="next-question-btn" type="button" class="btn btn-primary">Weiter zur nächsten Frage</a>
            <form action="{{url('/question/success')}}" method="post" id="submit-form" style="display: inline-block;">
                {!! csrf_field() !!}
                <div id="hidden-inputs-container" style="display: none;">

                </div>
                <input type="submit" value="Finish Quiz" class="btn btn-primary" style="display: none;" id="submit-btn">
            </form>
        </div>
    </div>
</div>
