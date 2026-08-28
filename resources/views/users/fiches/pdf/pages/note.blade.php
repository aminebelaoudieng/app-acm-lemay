<style>

    .courtier-page .note .title {
        font-size:20px;
        margin-bottom: 50px;
        width:100%;
        display:block;
    }

    .courtier-page .note .text {
        line-height: 15px;
        margin-bottom: 20px;
        font-size:15px;
        text-align: justify;
    }

    .courtier-page .note {
        padding-top:0px;
    }
</style>

<div class="courtier-page page">
    <div class="note">
        <p class="title upper txt-center">{{ __('pdf.courtier_notes') }}</p>
        <div class="text">{!! (($ficheMaster->note)) !!}</div>
    </div>
</div>
