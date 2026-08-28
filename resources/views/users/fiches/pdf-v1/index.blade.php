@extends('layouts.pdf')

@section('content')
<style>
    html,
    body {
        font-size: 12px;
        font-family: 'opensans', sans-serif;
    }

    * {
        vertical-align: top;
    }

    .page {
        max-width: 80%;
        margin: auto;
    }

    .page-break {
        page-break-after: always;
    }

    .clearfix {
        width: 100%;
        display: block;
        clear: both;
    }

    table {
        font-size: 90%;
    }

    .line {
        width: 100%;
        height: 1px;
        margin: auto;
        background-color: {{ (Config::get('datas.compagnies')[$user->compagnie]['color']) }};;
        margin: 20px auto;
        clear: both;
    }   
    
    .bg-color {
        background-color: {{ (Config::get('datas.compagnies')[$user->compagnie]['color']) }};
        color: white;
        padding: 5px 10px;
    }

    .txt-color {
        color: {{ (Config::get('datas.compagnies')[$user->compagnie]['color']) }};
    }

    .line-color {
        background-color: {{ (Config::get('datas.compagnies')[$user->compagnie]['color']) }};
    }

    .table-title {
        display: inline-block;
        font-size: 13px;
        padding: 10px 20px;
        margin-bottom: 0px;
        width: 150px;
        text-align: center;
    }

    .table-title.no-padding {
        padding-left: 0px;
    }

    .table-title.full-width {
        width: auto;
        font-family: "opensans-light";
        font-size: 16px;
    }

    .table-title.center {
        margin-bottom: -25px;
    }

    .bg-grey {
        background-color: #f2f1f1;
        padding: 10px;
        padding-top: 25px;
        margin-bottom: 20px;
        font-size: 12px;

    }

    .tr-top {
        position: relative;
        z-index: 10;
    }

    .valeur {
        font-weight: bold;
    }

    .label {
        width: 80% !important;
    }

    .section-intro {
        font-family: "opensans-light";
        font-size: 25px;
        padding: 20px;
        padding-bottom: 25px;
        margin-left: -50px;
        padding-left: 70px;
        width: 80%;
        margin-top: 400px !important;
    }
</style>

@include('users.fiches.pdf.pages.front')
@include('users.fiches.pdf.pages.break')

@include('users.fiches.pdf.pages.courtier')
@include('users.fiches.pdf.pages.break')

@php
$fiche=$ficheMaster;
@endphp

@include('users.fiches.pdf.pages.sujet')
@include('users.fiches.pdf.pages.break')

@php
$nb=1;
@endphp


@foreach($ficheMaster->fichesVendu()->get() as $fiche)
@include('users.fiches.pdf.pages.vendu')
@include('users.fiches.pdf.pages.break')
@php
$nb++;
@endphp

@endforeach

@include('users.fiches.pdf.pages.resume-vendu')

@include('users.fiches.pdf.pages.break')
@include('users.fiches.pdf.pages.intro-vigueur')
@include('users.fiches.pdf.pages.break')

@php
$nb=1;
@endphp

@foreach($ficheMaster->fichesVigueur()->get() as $fiche)
@include('users.fiches.pdf.pages.vigueur')
@include('users.fiches.pdf.pages.break')
@php
$nb++;
@endphp
@endforeach


@include('users.fiches.pdf.pages.resume-vigueur')
@include('users.fiches.pdf.pages.break')

@include('users.fiches.pdf.pages.intro-annexe')

@endsection