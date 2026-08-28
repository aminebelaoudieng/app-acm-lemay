<style>
.sub-sujet-page {
    position: relative;
}

.sub-sujet-page h1 {
    line-height: 28px;
    font-family: "lato";
    font-size: 19px;
    letter-spacing: 5px;

}

.sub-sujet-page h1 span.index {
    text-align: center;
    margin-right: 30px;
    height: 32px;
    width: 30px;
    line-height: 30px;
    display: inline-block;
    font-weight: normal;
    padding-left: 4px;
}

.sub-sujet-page .line {
    margin-top: 10px;
}

.sub-sujet-page table td.left {
    width: 40% !important;
}

.sub-sujet-page table td.right {
    width: 60% !important;
}

.sub-sujet-page table img {
    max-width: 300px;
}

.sub-sujet-page .valeur {
    text-align: center;
    width: 18%;

}

.sub-sujet-page .label {
    width: 46% !important;
}

.sub-sujet-page .thead {
    font-size: 11px;
    text-transform: uppercase;
}

.sub-sujet-page .bg-grey {
    padding-right: 0px;
    padding-bottom: 30px;
}

.sub-sujet-page .adresse p {
    margin-top: 0px;
    padding-left: 0px;
    max-width: 90%;
    font-family: "lato-bold-italic";
    text-transform: uppercase;
    font-size: 16px;
    height: 42px;
    overflow: hidden;
}

.sub-sujet-page .details-vente {
    margin-top: 2px;
    padding-top: 0px;
    font-size: 14px;

    border-top:1px solid {
            {
            $user->color
        }
    }

    ;
}

.sub-sujet-page .details-vente td {
    text-align: center;
}


.sub-sujet-page .details-vente .label {
    text-align: left !important;
    width: 146px !important;
}

.sub-sujet-page .details-vente tr td,
.sub-sujet-page .details-vente tr {
    padding: 0px !important;
    font-size: 12.5px;
    height: 32px;
    vertical-align: middle;
}

.sub-sujet-page .ratios {
    margin-top: -20px;
    width: 100%;
}

.sub-sujet-page .ratios table tr td {
    border: 1px solid black;
    width: 33%;
    vertical-align: middle;
}

.sub-sujet-page .ratios table td {
    padding: 5px 0px 5px 0px;
    text-align: center;
    font-size: 13px;
    font-weight: normal;
}

.sub-sujet-page .ratios table td .txt-color {
    font-size: 20px;
    font-weight: bold;
    line-height: 24px;
}


.sub-sujet-page .geolocalisation .img.map img {
    width: 698px;
}

.sub-sujet-page .geolocalisation .table-title {
    margin-top: 0px;
    text-align: left;
    border-bottom: 1px solid black;
}

.sub-sujet-page .geolocalisation .img.map {
    max-width: 750px;
    height: 190px;
    overflow: hidden;
}

.sub-sujet-page .geolocalisation .img.map img {
    max-width: 440px;
    margin-top: -80px;
    margin-left: 150px;
    position: absolute;
}

.sub-sujet-page .geolocalisation {
    margin-top: 20px;
}

.sub-sujet-page .geolocalisation,
.sub-sujet-page .geolocalisation tr td {
    border: 0px !important;
}

.sub-sujet-page .sujet.valeur {
    border-left: 1px solid #ccc;
}

.sub-sujet-page .caracteristiques table tr td,
.sub-sujet-page .caracteristiques table tr {
    padding: 0px !important;
    font-size: 12.5px;
    height: 32px;
    vertical-align: middle;
}

.sub-sujet-page .caracteristiques .header {
    font-size: 12px;
    font-family: "lato-bold-italic";
    text-transform: none;
}

.sub-sujet-page .first {
    margin-top: 30px !important;
}

.sub-sujet-page .table-title {
    margin-top: 0px;
}
</style>
<div class="sub-sujet-page sujet-page">
    <h1 class="upper"><span class="index line-color txt-white">{{ $nb }} </span>{{ __('pdf.detailed_analysis_sold') }}</h1>

    <table class="details" cellpadding="0" cellspacing="0">
        <tr>
            <td class="left">
                <table class="first" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="adresse">
                            <p>{{ $fiche->numero_civic}}{{ ($fiche->appartement)?" #".$fiche->appartement:""}} {{ $fiche->rue}}, {{ $fiche->ville}}, {{ $fiche->province}}, Canada, {{ $fiche->code_postal}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ $fiche->streetviewPDF }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="details-vente bg-grey" cellpadding="0" cellspacing="0">
                                @if($fiche->type_copropriete=="divise")
                                <tr>
                                    <td class="label">{{ __('pdf.municipal_evaluation') }}</td>
                                    <td>{{ money($fiche->comparable_vendu_prix_evaluation) }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="label">{{ __('pdf.requested_price') }}</td>
                                    <td>{{ money($fiche->comparable_vendu_prix_demande) }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.sold_price') }}</td>
                                    <td>{{ money($fiche->comparable_vendu_prix_vente)  }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.sale_listing') }}</td>
                                    <td>{{ ($fiche->comparable_vendu_date_vente)  }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.sale_delay') }}</td>
                                    <td>{{ $fiche->comparable_vendu_delais_vente  }} jours</td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                </table>
            </td>
            <td class="right">
                <table class="first caracteristiques" cellpadding="0" cellspacing="0">
                    <tr class="tr-top">
                        <td>
                            <p class="table-title center">
                                {{ __('pdf.characteristics') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="bg-grey" cellpadding="0" cellspacing="0">
                                <tr class="thead bg-color">
                                    <td class="label"></td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur header">Comparable</td>
                                                <td class="valeur sujet header">Sujet</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.condo_type') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ Config::get('datas.type_copropriete')[$fiche->type_copropriete]['name']}}</td>
                                                <td class="valeur sujet">{{ Config::get('datas.type_copropriete')[$ficheMaster->type_copropriete]['name']}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="label">{{ __('pdf.year_built') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_annee_construction}}</td>
                                                <td class="valeur sujet">{{ $ficheMaster->caracteristique_annee_construction}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="label">{{ __('pdf.living_area') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">@if( $fiche->caracteristique_superficie_habitable) {{ $fiche->caracteristique_superficie_habitable}} @else - @endif</td>
                                                <td class="valeur sujet">@if( $ficheMaster->caracteristique_superficie_habitable) {{ $ficheMaster->caracteristique_superficie_habitable}} @else - @endif</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                @if($fiche->caracteristique_stationnement>0 || $ficheMaster->caracteristique_stationnement>0)
                                <tr>
                                    <td class="label">{{ __('pdf.parking') }}</td>

                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">
                                                    @if($fiche->caracteristique_stationnement>0)
                                                      {{ $fiche->caracteristique_stationnement }}
                                                    @else
                                                    -
                                                    @endif
                                                </td>
                                                <td class="valeur sujet">
                                                    @if($ficheMaster->caracteristique_stationnement>0)
                                                      {{ $ficheMaster->caracteristique_stationnement }}
                                                    @else
                                                    -
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endif


                                @if($fiche->caracteristique_garage>0 || $ficheMaster->caracteristique_garage>0)
                                <tr>
                                    <td class="label">{{ __('pdf.garage') }}</td>

                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">
                                                    @if($fiche->caracteristique_garage>0)
                                                      {{ $fiche->caracteristique_garage }}
                                                    @else
                                                    -
                                                    @endif
                                                </td>
                                                <td class="valeur sujet">
                                                    @if($ficheMaster->caracteristique_garage>0)
                                                      {{ $ficheMaster->caracteristique_garage }}
                                                    @else
                                                    -
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endif


                                <tr>
                                    <td class="label">{{ __('pdf.room_count') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_nombre_piece}}</td>
                                                <td class="valeur sujet">{{ $ficheMaster->caracteristique_nombre_piece}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.bedroom_count') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_nombre_chambre}}</td>
                                                <td class="valeur sujet">{{ $ficheMaster->caracteristique_nombre_chambre}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="label">{{ __('pdf.powder_room_count') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_nombre_salle_eau ? $fiche->caracteristique_nombre_salle_eau : "Non"}}</td>
                                                <td class="valeur sujet">{{ $ficheMaster->caracteristique_nombre_salle_eau ?  $ficheMaster->caracteristique_nombre_salle_eau : "Non"}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="label">{{ ($ficheMaster->caracteristique_type_propriete=="condo")?__('pdf.floor'):__('pdf.floors') }}: </td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_etage }}</td>
                                                <td class="valeur sujet">{{ $ficheMaster->caracteristique_etage }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="label">{{ __('pdf.view') }} </td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">
                                                    @if($fiche->type_vue)
                                                    {{ __('datas.type_vue.' . $fiche->type_vue) }}
                                                    @else
                                                    {{ __('pdf.no_view') }}
                                                    @endif
                                                </td>
                                                <td class="valeur sujet">
                                                    @if($ficheMaster->type_vue)
                                                    {{ __('datas.type_vue.' . $ficheMaster->type_vue) }}
                                                    @else
                                                    {{ __('pdf.no_view') }}
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table class="ratios" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <p class="table-title no-border">
                    {{ __('pdf.sold_price_ratios') }}
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            {{ __('pdf.sold_vs_requested_price') }}
                        </td>
                        @if(($fiche->type_copropriete=="divise" && $ficheMaster->categorie=="condo") || $ficheMaster->categorie!="condo")
                        <td class="middle">
                            {{ __('pdf.sold_vs_municipal_evaluation') }}
                        </td>
                        @endif
                        <td>
                            {{ __('pdf.vendu.ratio_sale_sqft') }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="txt-color">{{ $fiche->ratioVenteVsDemande}} %</span>
                        </td>
                        @if(($fiche->type_copropriete=="divise" && $ficheMaster->categorie=="condo") || $ficheMaster->categorie!="condo")
                        <td class="middle">
                            <span class="txt-color">{{ $fiche->ratioVenteVsEvaluation }} %</span>
                        </td>
                        @endif
                        <td>
                            <span class="txt-color">{{ $fiche->ratioPiedCarreHabitableVendu }}$</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table class="" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <table class="geolocalisation full-width" cellpadding="0" cellspacing="0">
                    <tr class="tr-top">
                        <td>
                <p class="table-title no-border">
                    {{ __('pdf.geolocation') }}
                </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="img map">
                                <img class="map" src="{{ $fiche->mapPDF }}">
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>