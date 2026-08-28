<style>
    .front-page h1 {
        font-size: 30px;
    }

    .front-page .infos {
        width: 100%;
        margin-top: 40px;
    }

    .front-page .infos td {
        border: 1px solid #000;
        text-align: center;
    }

    .front-page .infos .thead {
        background-color: #000;
        color: #fff;
        text-align: center;
    }

    .front-page .infos .thead td {
        padding: 8px 0px 10px 0px;
        font-size: 14px;
    }

    .front-page .infos .data td {
        padding: 8px 0px 10px 0px;
        font-size: 14px;
        font-family: "lato-bold";
    }

    .front-page .infos .data td {
        padding: 8px 0px 10px 0px;
        font-size: 14px;
        font-family: "lato-bold";
        width: 33%:
    }

    .front-page .infos .labels td {
        padding: 4px 0px 6px 0px;
        width: 33%:
    }

    .front-page .img img {
        margin-top: 40px;
        width: 100%;
        -webkit-box-shadow: 0px 10px 12px 1px rgba(0, 0, 0, 0.27);
        -moz-box-shadow: 0px 10px 12px 1px rgba(0, 0, 0, 0.27);
        box-shadow: 0px 10px 12px 1px rgba(0, 0, 0, 0.27);
    }
</style>

<div class="front-page page">
    <h1 class="{{ (!$user->design_sans_plus)?'title-with-style':'' }} page-title">{{ __('pdf.front.title') }}</h1>
    <div class="clearfix"></div>
    <div class="img center">
        <img src="{{ $ficheMaster->streetviewPDF }}">
    </div>
    <table class="infos" border="0" cellpadding="0" cellspacing="0">
        <tr class="thead">
            <td colspan="3">{{ $ficheMaster->numero_civic }} {{ $ficheMaster->rue }}{{ ($ficheMaster->appartement)?" #".$ficheMaster->appartement:"" }}, {{ $ficheMaster->ville }}, {{ $ficheMaster->province }}, Canada, {{ $ficheMaster->code_postal }}</td>
        </tr>
        <tr class="labels">
            <td class="txt-color">{{ __('pdf.front.analysis_purpose') }}</td>
            <td class="txt-color">{{ __('pdf.front.analysis_date') }}</td>
            <td class="txt-color">{{ __('pdf.front.analysis_period') }}</td>
        </tr>
        <tr class="data">
            <td>{{ $ficheMaster->but }}</td>
            <td>{{ $ficheMaster->dateFormat }}</td>
            <td>{{ $ficheMaster->periodeMois }}</td>
        </tr>
    </table>
</div>