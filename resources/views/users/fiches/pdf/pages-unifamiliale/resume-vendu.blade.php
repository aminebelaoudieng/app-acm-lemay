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
    <h1 class="upper">{{ __('pdf.resume_sold_highlights_title') }}</h1>
    <br />
    <div class="texte">
        <p>
            <b>{{ __('pdf.avg_sold_vs_requested_ratio') }}</b>
            <br />
            {!! __('pdf.avg_sold_vs_requested_text', ['value' => '<span class="txt-color">' . $ficheMaster->moyenneRatioVenteDemande . '%</span>']) !!}
        </p>
        <p>
            <b>{{ __('pdf.avg_sold_vs_municipal_ratio') }}</b><br />
            {!! __('pdf.avg_sold_vs_municipal_text', ['value' => '<span class="txt-color">' . $ficheMaster->moyenneRatioVenteEvaluation . '%</span>']) !!}
        </p>
        <p>
            <b>{{ __('pdf.avg_price_per_sqft_living') }}</b><br />
            {!! __('pdf.avg_price_per_sqft_living_text', ['value' => '<span class="txt-color">' . $ficheMaster->moyenneRatioPrixHabitableVendu . '$</span>']) !!}
        </p>
        <p>
            <b>{{ __('pdf.avg_price_per_sqft_land') }}</b><br />
            {!! __('pdf.avg_price_per_sqft_land_text', ['value' => '<span class="txt-color">' . $ficheMaster->moyenneRatioPrixTerrainVendu . '$ </span>']) !!}
        </p>
        <p>
            <b>{{ __('pdf.avg_sale_delay') }}</b><br />
            {!! __('pdf.avg_sale_delay_text', ['value' => '<span class="txt-color">' . $ficheMaster->moyenneJoursVente . '</span>']) !!}
        </p>
        <p>
            <b>{{ __('pdf.avg_price') }}</b><br />
            {!! __('pdf.avg_price_text', ['value' => '<span class="txt-color">' . money($ficheMaster->moyennePrixVente) . '</span>']) !!}
        </p>
    </div>
    <br /><br /><br />
    <p class="table-title full-width">{{ __('pdf.averages_and_value_calculations') }}</p>
    <table class="resume-table" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <table class="bg-grey" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>{{ __('pdf.based_on_municipal_evaluation') }}:</td>
                        <td style="text-align:right;">{{ money($ficheMaster->prixSelonEvaluation) }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('pdf.based_on_price_per_sqft_living') }}:</td>
                        <td style="text-align:right;">{{ money($ficheMaster->prixSelonSuperficieHabitable) }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('pdf.based_on_price_per_sqft_land') }}:</td>
                        <td style="text-align:right;">{{ money($ficheMaster->prixSelonSuperficieTerrain) }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('pdf.based_on_avg_sale_price') }}:</td>
                        <td style="text-align:right;">{{ money($ficheMaster->moyennePrixVente) }}</td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
</div>