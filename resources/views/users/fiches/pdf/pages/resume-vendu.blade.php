<style>
.courtier-page.resume h1 {
    line-height: 30px;
    font-family: "lato";
    font-size: 18px;
    letter-spacing: 5px;
}

.courtier-page .img img {
    width: 100px;
}

.courtier-page.resume .texte {
    font-size: 14px;
}

.courtier-page.resume .texte b {
    margin-bottom: 0px;
    display: block;
}

.courtier-page .resume-table {
    margin-top: 10x;
    width: 100%;
    font-size: 16px;
}

.courtier-page .resume-table .txt-color {
    font-size: 16.2px;
}

.courtier-page .resume-table .bg-grey {
    width: 100%;
    margin-top: 0px;
    margin-top: -20px;
    margin-bottom: -20px;
}

.courtier-page .resume-table .bg-grey td {
    height: 30px;
    padding-right: 0px;
    vertical-align: middle;
}

.courtier-page .resume-table td:first-child {
    padding-right: 0px;
}

.courtier-page .resume-table .prix-moyen {
    font-size: 50px !important;
    text-align: center;
    vertical-align: middle;
    padding-top: 40px;
    padding-bottom: 40px;
    width: 40%;
}
</style>
<div class="courtier-page resume">
    <h1 class="upper">{{ __('pdf.resume_vendu_title') }}</h1>
    <br />
    <div class="texte">
        <p>
            <b>{{ __('pdf.resume.ratio_sale_asked_title') }}</b>
            <br />
            {!! __('pdf.resume.ratio_sale_asked_text', ['value' => $ficheMaster->moyenneRatioVenteDemande]) !!}
        </p>
        <p>
            <b>{{ __('pdf.resume.ratio_sale_eval_title') }}</b><br />
            {!! __('pdf.resume.ratio_sale_eval_text', ['value' => $ficheMaster->moyenneRatioVenteEvaluation]) !!}
        </p>
        <p>
            <b>{{ __('pdf.resume.price_sqft_living_title') }}</b><br />
            {!! __('pdf.resume.price_sqft_living_text', ['value' => $ficheMaster->moyenneRatioPrixHabitableVendu]) !!}
        </p>
        <p>
            <b>{{ __('pdf.resume.price_sqft_land_title') }}</b><br />
            {!! __('pdf.resume.price_sqft_land_text', ['value' => $ficheMaster->moyenneRatioPrixTerrainVendu]) !!}
        </p>
        <p>
            <b>{{ __('pdf.resume.avg_sale_delay_title') }}</b><br />
            {!! __('pdf.resume.avg_sale_delay_text', ['value' => $ficheMaster->moyenneJoursVente]) !!}
        </p>
        <p>
            <b>{{ __('pdf.resume.avg_price_title') }}</b><br />
            {!! __('pdf.resume.avg_price_text', ['value' => money($ficheMaster->moyennePrixVente)]) !!}
        </p>
    </div>
    <br /><br /><br />
    <p class="table-title full-width">{{ __('pdf.resume.table_title') }}</p>
    <table class="resume-table" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <table class="bg-grey" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>{{ __('pdf.resume.according_to_municipal') }}</td>
                        <td style="text-align:right;">{{ money($ficheMaster->prixSelonEvaluation) }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('pdf.resume.according_to_sqft_living') }}</td>
                        <td style="text-align:right;">{{ money($ficheMaster->prixSelonSuperficieHabitable) }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('pdf.resume.according_to_sqft_land') }}</td>
                        <td style="text-align:right;">{{ money($ficheMaster->prixSelonSuperficieTerrain) }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('pdf.resume.according_to_avg_price') }}</td>
                        <td style="text-align:right;">{{ money($ficheMaster->moyennePrixVente) }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>