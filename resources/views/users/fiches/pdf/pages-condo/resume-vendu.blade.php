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
            <b>{{ __('pdf.avg_sold_vs_requested_ratio') }}</b>
            <br />
            {{ __('pdf.avg_ratio_sale_vs_asked_text', ['ratio' => $ficheMaster->moyenneRatioVenteDemande]) }}
        </p>
        @if(($ficheMaster->type_copropriete=="divise" && $ficheMaster->categorie=="condo") || $ficheMaster->categorie!="condo")
        <p>
            <b>{{ __('pdf.avg_ratio_sale_vs_evaluation') }}</b><br />
            {{ __('pdf.avg_ratio_sale_vs_evaluation_text', ['ratio' => $ficheMaster->moyenneRatioVenteEvaluation]) }}
        </p>
        @endif
        <p>
            <b>{{ __('pdf.avg_price_per_sqft_living') }}</b><br />
            {{ __('pdf.avg_price_per_sqft_text', ['price' => $ficheMaster->moyenneRatioPrixHabitableVendu]) }}
        </p>
        <p>
            <b>{{ __('pdf.avg_sale_delay') }}</b><br />
            {{ __('pdf.avg_sale_delay_text', ['value' => $ficheMaster->moyenneJoursVente]) }}
        </p>
        <p>
            <b>{{ __('pdf.avg_price_label') }}</b><br />
            {{ __('pdf.avg_price_text', ['value' => money($ficheMaster->moyennePrixVente)]) }}
        </p>
    </div>
    <br /><br /><br />
    <p class="table-title full-width">{{ __('pdf.averages_and_value_calculations') }}</p>
    <table class="resume-table" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <table class="bg-grey" cellpadding="0" cellspacing="0">

                    <tr>
                        <td>{{ __('pdf.by_price_per_sqft') }}</td>
                        <td style="text-align:right;">{{ money($ficheMaster->prixSelonSuperficieHabitable) }}</td>
                    </tr>
                    @if($ficheMaster->type_copropriete!="indivise")
                    <tr>
                        <td>{{ __('pdf.by_municipal_evaluation') }}</td>
                        <td style="text-align:right;">{{ money($ficheMaster->moyennePrixVenteSelonEvaluationMunicipale) }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td>{{ __('pdf.by_avg_sale_price') }}</td>
                        <td style="text-align:right;">{{ money($ficheMaster->moyennePrixVente) }}</td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
</div>