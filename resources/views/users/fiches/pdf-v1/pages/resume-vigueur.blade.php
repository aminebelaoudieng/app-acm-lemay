<style>
    .full-width-table {
        width: 100%;
        margin-left: -50px;
        margin-right: -50px;
        padding: 20px 50px;
    }

    .full-width-table td {
        padding: 20px 20px;
        font-family: "opensans-light";
    }

    .full-width-table td b {
        text-align: center;
        width: 100%;
        display: block;
        font-family: "opensans";
        font-weight: bold;
        font-size: 15px;
    }

    .full-width-table .middle {
        border-left: 1px solid white;
        border-right: 1px solid white;
        padding-left: 50px !important;
        padding-right: 50px !important;
    }

    .full-width-table .price {
        font-size: 32px;
    }

    .full-width-table .description {
        height: 140px;
    }
</style>
<div class="courtier-page resume">
    <h2>{{ __('pdf.resume_vigueur.title') }}</h2>
    <div class="line"></div>
    <br /> <br />
    <div class="texte">
        <p>
            <b>{{ __('pdf.resume_vigueur.avg_asked_price') }}</b>
            <br />
            {{ __('pdf.resume_vigueur.avg_asked_price_text') }} <span class="txt-color">{{ money($ficheMaster->moyennePrixDemande) }}</span>
        </p>
        <p>
            <b>{{ __('pdf.resume_vigueur.avg_ratio_asked_eval') }}</b><br />
            {{ __('pdf.resume_vigueur.avg_ratio_asked_eval_text') }} <span class="txt-color">{{ $ficheMaster->moyenneRatioDemandeEvaluation }}%</span> {{ __('pdf.resume_vigueur.of_municipal_eval') }}
        </p>
        <p>
            <b>{{ __('pdf.resume_vigueur.avg_asked_habitable') }}</b><br />
            {{ __('pdf.resume_vigueur.avg_asked_habitable_text') }} <span class="txt-color">{{ $ficheMaster->moyenneRatioPrixHabitableVigueur }}$ / {{ __('pdf.resume_vigueur.habitable_sqft') }}</span>
        </p>
        <p>
            <b>{{ __('pdf.resume_vigueur.avg_asked_land') }}</b><br />
            {{ __('pdf.resume_vigueur.avg_asked_land_text') }} <span class="txt-color">{{ $ficheMaster->moyenneRatioPrixTerrainVigueur }}$ / {{ __('pdf.resume_vigueur.land_sqft') }}</span>
        </p>
        <p>
            <b>{{ __('pdf.resume_vigueur.avg_market_time') }}</b><br />
            {{ __('pdf.resume_vigueur.avg_market_time_text') }} <span class="txt-color"> {{ $ficheMaster->moyenneJoursVigueur }} {{ __('pdf.resume_vigueur.days') }}</span>
        </p>

    </div>
    <br /><br /><br />
    <h2 class="table-title no-padding full-width">{{ __('pdf.resume_vigueur.suggested_listing_price_active') }}</h2>
    <br /><br />
    <table class="bg-color full-width-table">
        <tr>
            <td>
                <div class="description">
                    <b>{{ __('pdf.resume_vigueur.motivated') }}</b><br>
                    {!! __('pdf.resume_vigueur.motivated_desc') !!}<br>
                </div>
                <span class="price">{{ money($ficheMaster->prix_offensif)  }}</span>
            </td>
            <td class="middle">
                <div class="description">
                    <b>{{ __('pdf.resume_vigueur.realistic') }}</b><br>
                    {{ __('pdf.resume_vigueur.realistic_desc') }}<br>
                </div>
                <span class="price">{{ money($ficheMaster->prix_realiste)  }}</span>
            </td>
            <td>
                <div class="description">
                    <b>{{ __('pdf.resume_vigueur.optimistic') }}</b><br>
                    {{ __('pdf.resume_vigueur.optimistic_desc') }}<br>
                </div>
                <span class="price">{{ money($ficheMaster->prix_optimiste) }}</span>
            </td>
        </tr>
    </table>
</div>