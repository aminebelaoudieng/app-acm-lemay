<style>
    .front-page {
        margin-top: 250px;
    }

    .front-page h1 {
        font-size: 30px;
        display: flex;
        justify-content: center;
        text-align: center;
        margin-bottom: 10px;
        font-family: "opensans-light";
    }

    .front-page .line {
        width: 20%;
        height: 1px;
        margin: auto;
        margin: 30px auto 40px auto;
    }

    .front-page .center {
        text-align: center;
        margin-bottom: 30px;
    }

    .front-page .infos {
        width: 90%;
        margin: auto;

    }

    .front-page .infos span {
        width: 30%;
        display: inline-block;
    }

    .front-page .img img {
        width: 90%;
    }
</style>
<div class="front-page page">
    <h1>{{ __('pdf.front.title') }}</h1>
    <div class="line line-color"></div>
    <div class="clearfix"></div>
    <div class="img center">
        <img src="{{ $ficheMaster->streetviewPDF }}">
    </div>
    <div class="infos ">
        <p><span class="txt-color">{{ __('pdf.front.address') }}</span> {{ $ficheMaster->adresse }}</p>
        <p><span class="txt-color">{{ __('pdf.front.analysis_purpose') }}</span> {{ $ficheMaster->but }} </p>
        <p><span class="txt-color">{{ __('pdf.front.analysis_date') }}</span> {{ $ficheMaster->date }} </p>
        <p><span class="txt-color">{{ __('pdf.front.analysis_period') }}</span> {{ $ficheMaster->periodeMois }}</p>
    </div>
</div>