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
        background-color: {{ (Config::get('datas.compagnies')[$user->compagnie]['color']) }};
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

    .compagnie {
        margin: 300px auto;
    }

    .info {
        padding-top: 40px;
        padding-bottom: 20px;
        text-align: center;

    }

    .info.slogan {
        border-bottom: 1px solid white;
        text-transform: uppercase;
    }

    .info.logo {
        padding-top: 20px;
        padding-bottom: 40px;
    }

    .info.logo img {
        max-width: 100px;
    }
</style>
<table class="bg-color compagnie">
    <tr>
        <td class="info slogan">
            {{ $user->slogan }}
        </td>
    </tr>
    <tr>
        <td class="info adresse">
            <b>{{ $user->adresse }}</b>
            <br />
            {{ $user->email }}
            <br />
            {{ $user->telephone }}
            <br />
            {{ $user->siteweb }}
        </td>
    </tr>
    <tr>
        <td class="info logo">
            <img src="{{  public_path('images/compagnies/'.$user->compagnie.'.png') }}" />

        </td>
    </tr>
</table>

@endsection