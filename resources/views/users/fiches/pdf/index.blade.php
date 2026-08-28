@extends('layouts.pdf')

@section('content')

@php
    $pdfAccent = $user->color ?: '#FF0C17';
@endphp

<style>
    html,
    body {
        font-size: 12px;
        font-family: "lato";
    }
    .background-dots{
        height:1150px;
        width:125%;
        position: absolute;
        left: -120px;
        right: -120px;
        top: -140px;
        bottom: -100px;
        padding:80px;
        z-index:-1;
    }
    .background-dots img{
        height:1150px;
        width:125%;
    }
    * {
        vertical-align: top;
    }
 
    .page {
        padding:20px;
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
        background-color: {{ $user->color }};
        margin: 20px auto;
        clear: both;
    }     
    
    .title-with-style:before,
    .title-with-style:after{
        content: "+";
        display:inline;
        color: {{ $user->color }};;
    }
  
    .border-bottom{
        border-bottom:1px solid {{ $user->color }};
    }
    .bg-color {
        background-color: {{ $user->color }};
        color: white;
        padding: 5px 10px;
    }

    .txt-color {
        color:{{ $user->color }};
    }
    .txt-white {
        color: #fff;
    }
    .txt-grey{
        color:#ccc;
    }
    .txt-center {
        text-align:center;
    }
    .upper{
        text-transform:uppercase;
    }
    .line-color {
        background-color:{{ $user->color }};
    }
    h1.page-title{
        text-align: center;
        margin-bottom: 40px;
        font-size:27px;
        font-family: "lato";
        font-weight:normal;
        letter-spacing:5px;
    }
    .table-title {
        font-family: "lato-bold-italic";
        text-transform:uppercase;
        display: block;
        font-size: 15px;
        margin-bottom: 0px;
        padding-bottom:10px;
        border-bottom:1px solid {{ $user->color }};
    }
    .table-title.no-border{
        border-bottom:0px;
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
        padding-top: 20px;
        margin-bottom: 20px;
        font-size: 15px;
    }  
    .bg-grey td{
        border-bottom:1px solid #ccc!important;
        padding:5px 0px;
    }
    .bg-grey tr:last-child td{
        border-bottom:0px !important;
    }
    .bg-grey td.valeur{
        text-align:center;
    }
    .mt{
        margin-top:40px;
    }
    .tr-top {
        position: relative;
        z-index: 10;
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

<div class="modern-pdf-footer">
    <span>{{ $user->compagnie ?: $user->name }}</span>
    <span class="modern-pdf-footer-title">{{ __('pdf.market_analysis_title') }}</span>
</div>

@include('users.fiches.pdf.pages.front')
@include('users.fiches.pdf.pages.break')

@include('users.fiches.pdf.pages.resume-sujet')
@include('users.fiches.pdf.pages.break')

@include('users.fiches.pdf.pages.courtier')
@include('users.fiches.pdf.pages.break')

@php
$fiche=$ficheMaster;
@endphp


@include('users.fiches.pdf.pages-'.$ficheMaster->template_folder.'.sujet')
@include('users.fiches.pdf.pages.break')

@if($ficheMaster->fichesVendu()->exists())

@include('users.fiches.pdf.pages-'.$ficheMaster->template_folder.'.list-vendu')
@include('users.fiches.pdf.pages.break')

@php
$nb=1;
@endphp


@foreach($ficheMaster->fichesVendu()->get() as $fiche)
@include('users.fiches.pdf.pages-'.$ficheMaster->template_folder.'.vendu')
@include('users.fiches.pdf.pages.break')
@php
$nb++;
@endphp

@endforeach

@include('users.fiches.pdf.pages-'.$ficheMaster->template_folder.'.resume-vendu')

@include('users.fiches.pdf.pages.break')


@endif


@if(!$ficheMaster->ne_pas_afficher_les_vigueurs)
  @if($ficheMaster->fichesVigueur()->exists())
    @include('users.fiches.pdf.pages-'.$ficheMaster->template_folder.'.intro-vigueur')
    @include('users.fiches.pdf.pages.break')


@php
$nb=1;
@endphp

@foreach($ficheMaster->fichesVigueur()->get() as $fiche)
@include('users.fiches.pdf.pages-'.$ficheMaster->template_folder.'.vigueur')
@include('users.fiches.pdf.pages.break')
@php
$nb++;
@endphp
@endforeach

@include('users.fiches.pdf.pages-'.$ficheMaster->template_folder.'.list-vigueur')
@include('users.fiches.pdf.pages.break')

@include('users.fiches.pdf.pages-'.$ficheMaster->template_folder.'.resume-vigueur')
@include('users.fiches.pdf.pages.break')

@endif
@endif


@if(!$ficheMaster->fichesVigueur()->exists())
    @include('users.fiches.pdf.pages.resume-general')
    @include('users.fiches.pdf.pages.break')
@endif


@include('users.fiches.pdf.pages.note')
@include('users.fiches.pdf.pages.break')
@include('users.fiches.pdf.pages.intro-annexe')

@include('users.fiches.pdf.partials.modern-theme', ['pdfAccent' => $pdfAccent])

@endsection
