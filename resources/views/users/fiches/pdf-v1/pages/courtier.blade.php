<style>
    .courtier-page .img img {
        width: 100px;
    }

    .courtier-page .profile,
    .courtier-page .intro {
        clear: both;
        display: block;
        width: 100%;
    }

    .courtier-page .profile .img {
        float: left;
        width: 170px;
    }

    .courtier-page .profile .img img {
        width: 150px;
    }

    .courtier-page .profile .infos {
        float: left;
        padding-top: 40px;
        line-height: 6px;
    }

    .courtier-page .profile .infos .name {
        text-transform: uppercase;
        padding-top: 2px;
        line-height: 1.5px;
    }

    .courtier-page .profile .infos .details {
        font-family: "opensans-light";
        line-height: 1.5px;
        font-size: 12px;
    }

    .courtier-page .intro .title {
        text-align: center;
        padding-top: 30px;
    }

    .courtier-page .intro .text {
        line-height: 10px;
        margin-bottom: 20px;
    }

    .courtier-page .signature {
        font-family: "opensanscondensed-light";
        font-size: 15px;
        line-height: 2px;
    }
</style>
<div class="courtier-page page">
    <div class="profile">
        <div class="img">
            <img src="{{ (isset($user->photo))? public_path('uploads/users/'.$user->photo):'' }}" />
        </div>
        <div class="infos">
            <p class="txt-color">{{ __('pdf.courtier.prepared_by') }}</p>
            <p class="name">{{ $user->name }}</p>
            <p class="details">{{ $user->poste }}</p>
            <p class="details">{{ (Config::get('datas.compagnies')[$user->compagnie]['name'])  }}</p>
        </div>
    </div>

    <div class="intro">
        <h3 class="title">{{ __('pdf.courtier.title') }}</h3>
        <div class="text">{!! nl2br(stripcslashes($ficheMaster->intro)) !!}</div>
        <div class="signature">
            <p class="name">{{ $user->name }}</p>
            <p class="details">{{ $user->poste }}</p>
            <p class="details">{{ (Config::get('datas.compagnies')[$user->compagnie]['name']) }}</p>
        </div>
    </div>
</div>