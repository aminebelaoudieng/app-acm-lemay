<style>
    .courtier-page.resume h1 {
        font-family: "opensans-light";
        font-size: 27px;
    }

    .courtier-page .img img {
        width: 100px;
    }

    .courtier-page.resume .texte {
        font-size: 13px;
    }

    .courtier-page .resume-table {
        margin-top: 10px;
        width: 100%;
        font-size: 16px;
    }

    .courtier-page .resume-table .txt-color {
        font-size: 16.2px;
    }

    .courtier-page .resume-table td:first-child {
        padding-top: 10px;
        padding-right: 40px;
        border-right: 1px solid black;
    }

    .courtier-page .resume-table .prix-moyen {
        font-size: 40px !important;
        margin-top: 10px;
        padding: 40px;
        font-family: "opensans-light";
    }
</style>
<div class="courtier-page resume">
    <h1>{{ __('pdf.resume_vendu.title') }}</h1>
    <div class="line"></div>
    <br /> <br />
    <div class="texte">
        <p>
            <b>{{ __('pdf.resume_vendu.avg_ratio_sale_asked') }}</b>
            <br />
            {{ __('pdf.resume_vendu.avg_ratio_sale_asked_text') }} <span class="txt-color">{{ $ficheMaster->moyenneRatioVenteDemande }}%</span> {{ __('pdf.resume_vendu.of_asked_price') }}
        </p>
        <p>
            <b>{{ __('pdf.resume_vendu.avg_ratio_sale_eval') }}</b><br />
            {{ __('pdf.resume_vendu.avg_ratio_sale_eval_text') }} <span class="txt-color">{{ $ficheMaster->moyenneRatioVenteEvaluation }}%</span> {{ __('pdf.resume_vendu.of_municipal_eval') }}
        </p>
        <p>
            <b>{{ __('pdf.resume_vendu.avg_sale_habitable') }}</b><br />
            {{ __('pdf.resume_vendu.avg_sale_habitable_text') }} <span class="txt-color">{{ $ficheMaster->moyenneRatioPrixHabitableVendu }}$ / {{ __('pdf.resume_vendu.habitable_sqft') }}</span>
        </p>
        <p>
            <b>{{ __('pdf.resume_vendu.avg_sale_land') }}</b><br />
            {{ __('pdf.resume_vendu.avg_sale_land_text') }} <span class="txt-color">{{ $ficheMaster->moyenneRatioPrixTerrainVendu }}$ / {{ __('pdf.resume_vendu.land_sqft') }}</span>
        </p>
        <p>
            <b>{{ __('pdf.resume_vendu.avg_sale_delay') }}</b><br />
            {{ __('pdf.resume_vendu.avg_sale_delay_text') }} <span class="txt-color">{{ $ficheMaster->moyenneJoursVente }} {{ __('pdf.resume_vendu.days') }}</span>
        </p>
        <p>
            <b>{{ __('pdf.resume_vendu.avg_sale_price') }}</b><br />
            {{ __('pdf.resume_vendu.avg_sale_price_text') }} <span class="txt-color">{{ money($ficheMaster->moyennePrixVente) }}</span>
        </p>
    </div>
    <br /><br /><br />
    <h2 class="table-title bg-color full-width">{{ __('pdf.resume_vendu.averages_and_value_calcs') }}</h2>
    <table class="resume-table">
        <tr>
            <td>
                <table>
                    <tr>
                        <td>{{ __('pdf.resume_vendu.by_municipal_eval') }}</td>
                        <td> <span class="txt-color">{{ money($ficheMaster->prixSelonEvaluation) }}</span></td>
                    </tr>
                    <tr>
                        <td>{{ __('pdf.resume_vendu.by_habitable_sqft') }}</td>
                        <td> <span class="txt-color">{{ money($ficheMaster->prixSelonSuperficieHabitable) }}</span></td>
                    </tr>
                    <tr>
                        <td>{{ __('pdf.resume_vendu.by_land_sqft') }}</td>
                        <td> <span class="txt-color">{{ money($ficheMaster->prixSelonSuperficieTerrain) }}</span></td>
                    </tr>
                    <tr>
                        <td>{{ __('pdf.resume_vendu.by_avg_sale_price') }}</td>
                        <td> <span class="txt-color">{{ money($ficheMaster->moyennePrixVente) }}</span></td>
                    </tr>
                </table>
            </td>
            <td class="prix-moyen">
                <span class="txt-color"> {{ $ficheMaster->prixVenteSelonMoyenne }}</span>
            </td>
        </tr>
    </table>
</div>