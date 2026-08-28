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
        width: 200px;
    }

    .courtier-page .profile .img img {
        width: 150px;
        border-radius:460%;
        border:1px solid {{ $user->color }};
      
    }  
    

    .courtier-page .profile .infos {
        float: left;
        padding-top: 20px;
        line-height: 6px;
    }
    .courtier-page .profile .infos .preparedby {
        font-family:"lato-bold";
        letter-spacing:3px;
    }
    .courtier-page .profile .infos .name {
        font-family:"lato-bold";
        padding-top: 2px;
        padding-bottom: 8px;
        line-height: 1.5px;
        letter-spacing:2px;
    }

    .courtier-page .profile .infos .details {
        line-height: 1.5px;
        font-size: 12px;
    }

    .courtier-page .intro .title {
        padding-top:60px;
        font-size:16px;
        margin-bottom: 20px;
    }

    .courtier-page .intro .text {
        line-height: 15px;
        margin-bottom: 20px;
        font-size:15px;
        text-align: justify;
    }

    .courtier-page .signature {
        font-size:15px;
        line-height: 2px;
    }
    .courtier-page .intro {
        padding-top:140px;
    }
</style>


    <div class="courtier-page page">
        <div class="profile">
            <div class="img">
                <img src="{{ (isset($user->photo))? public_path('uploads/users/'.$user->photo):'' }}" />
            </div>
            <div class="infos">
                <p class="txt-color preparedby upper">{{ __('pdf.prepared_by') }}</p>
                <p class="name upper">{{ $user->name }}</p>
                <p class="details">{{ $user->poste }}</p>
                <p class="details">{{ $user->compagnie }}</p>
            </div>
        </div>

        <div class="intro">
            <p class="title upper">{{ __('pdf.market_analysis_title') }}</p>
            <div class="text">{!! $ficheMaster->intro ?: __('fiches_subtabs.intro_default') !!}</div>
            <div class="signature">
                <p class="name">{{ $user->name }}</p>
                <p class="details">{{ $user->poste }}</p>
                <p class="details">{{ $user->compagnie }}</p>
            </div>
        </div>
    </div>
    <div class="background-dots"><img src="{{ public_path('images/pdf/background-dots.png') }}" /></div>