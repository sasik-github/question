@extends('layouts.app')

@section('slider_image')
slide-3.jpg
@endsection


@section('content')
    <div class="page-header">
        <h1>Glückwunsch! Du hast alle Fragen richtig beantwortet.</h1>
        <p class="lead">Lade Dir jetzt Dein persönliches Revell Control Zertifikat als PDF runter.</p>
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            @yield('result')
        </div>
        <div class="col-md-1"></div>
    </div>
@endsection