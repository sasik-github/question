@extends('question._questionSuccessLayout')

@section('result')
    <div class="alert alert-danger">Du has {{ $rightAnsweredCount}} von {{$totalCount}} Fragen richtig beantwortet.</div>
@endsection