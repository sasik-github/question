@extends('question._questionSuccessLayout')

@section('result')
    <div class="alert alert-info">OK</div>
    <form>
        <div class="form-group">
            <a class="btn btn-lg btn-success center-block" href="{{ url('/question/download') }}">Download Revell Control Zertifikat</a>
        </div>
    </form>
@endsection