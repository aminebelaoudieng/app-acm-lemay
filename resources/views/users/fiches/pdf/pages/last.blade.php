@extends('layouts.pdf')

@section('content')
@php
    $pdfAccent = $user->color ?: '#FF0C17';
@endphp

<style>
    @font-face {
        font-family: "opensans-modern";
        font-style: normal;
        font-weight: normal;
        src: url({{ public_path('fonts/OpenSans.ttf') }}) format('truetype');
    }

    @font-face {
        font-family: "opensans-modern";
        font-style: normal;
        font-weight: bold;
        src: url({{ public_path('fonts/OpenSans_Bold.ttf') }}) format('truetype');
    }

    html,
    body {
        margin: 0;
        color: #111111;
        background-color: #f7f5f1;
        font-family: "opensans-modern", "opensans", sans-serif;
    }

    .closing-page {
        position: relative;
        height: 990px;
        padding: 44px 48px;
    }

    .closing-logo {
        max-width: 160px;
        max-height: 95px;
    }

    .closing-kicker {
        color: {{ $pdfAccent }};
        font-size: 8px;
        font-weight: bold;
        letter-spacing: 1.1px;
        margin-top: 210px;
        text-transform: uppercase;
    }

    .closing-title {
        max-width: 620px;
        margin: 12px 0 18px 0;
        color: #111111;
        font-size: 34px;
        font-weight: bold;
        letter-spacing: -1px;
        line-height: 1.12;
    }

    .closing-title.title-with-style:before,
    .closing-title.title-with-style:after {
        color: {{ $pdfAccent }};
        content: "+";
        display: inline;
    }

    .closing-rule {
        width: 58px;
        height: 5px;
        margin-bottom: 30px;
        background-color: {{ $pdfAccent }};
    }

    .closing-card {
        width: 100%;
        color: #ffffff;
        background-color: #111111;
        border-top: 5px solid {{ $pdfAccent }};
        border-radius: 12px;
    }

    .closing-card td {
        padding: 24px;
        vertical-align: middle;
    }

    .closing-card .closing-label {
        color: {{ $pdfAccent }};
        font-size: 7px;
        font-weight: bold;
        letter-spacing: .8px;
        text-transform: uppercase;
    }

    .closing-card .closing-company {
        color: #ffffff;
        font-size: 16px;
        font-weight: bold;
        line-height: 1.25;
    }

    .closing-card .closing-contact {
        color: #e6e1da;
        font-size: 10px;
        line-height: 1.55;
    }

    .closing-footer-logo {
        max-width: 125px;
        max-height: 75px;
    }

    .closing-footer {
        position: absolute;
        left: 48px;
        right: 48px;
        bottom: 34px;
        border-top: 1px solid #dedad3;
        color: #77716b;
        font-size: 8px;
        padding-top: 9px;
    }
</style>

<div class="closing-page">
    <img class="closing-logo" src="{{ $user->logoHeaderPath }}" />

    <div class="closing-kicker">{{ __('pdf.market_analysis_title') }}</div>
    <h1 class="closing-title {{ (!$user->design_sans_plus) ? 'title-with-style' : '' }}">{{ $user->slogan }}</h1>
    <div class="closing-rule"></div>

    <table class="closing-card" cellpadding="0" cellspacing="0">
        <tr>
            <td width="38%">
                <span class="closing-label">{{ __('pdf.prepared_by') }}</span><br />
                <span class="closing-company">{{ $user->name }}</span><br />
                <span class="closing-contact">
                    {{ $user->poste }}
                    @if($user->compagnie)
                        <br />{{ $user->compagnie }}
                    @endif
                </span>
            </td>
            <td width="42%" class="closing-contact">
                {{ $user->adresse }}<br />
                {{ $user->ville }} {{ $user->province }} {{ $user->code_postal }}<br /><br />
                {{ $user->telephone }}<br />
                {{ $user->email }}<br />
                {{ $user->siteweb }}
            </td>
            <td width="20%" align="right">
                <img class="closing-footer-logo" src="{{ $user->logoFooterPath }}" />
            </td>
        </tr>
    </table>

    <div class="closing-footer">
        {{ $user->compagnie ?: $user->name }}
    </div>
</div>
@endsection
