@extends('layouts.app')

@section('slider_image')
slide-1.jpg
@endsection

@section('content')
    <div class="page-header">
        <h1>Willkommen beim Revell Control Online Bootcamp</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="well">
                <h2>So geht's:</h2>
                <p class="lead">Trage einfach deine Kontaktdaten in das Formular ein und beantworte die Fragen. Wenn Du alle Fragen richtig beantwortet hast, kannst Du dir Dein Revell Control Zertifikat als druckfähige PDF Datei downloaden.<br><br>Viel Spaß beim Online Bootcamp!</p>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

            @include('home._homeLoginForm')

        </div>
        <div class="col-md-1"></div>
    </div>
@endsection
