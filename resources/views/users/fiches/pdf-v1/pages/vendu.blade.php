<style>
    .sub-sujet-page {
        position: relative;
    }

    .sub-sujet-page h1 {
        line-height: 30px;
    }

    .sub-sujet-page .line {
        margin-top: 10px;
    }

    .sub-sujet-page h2 {
        font-size: 14px;
        font-weight: normal;
        line-height: 20px;
    }

    .sub-sujet-page .index {
        display: block;
        text-align: right;
        width: 100%;
        top: 22px;
        font-size: 30px;
        position: absolute;
        font-family: "opensans-light";
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

    .sub-sujet-page .bg-grey:after {
        content: "";
        display: block;
        width: 1px;
        height: 355px;
        background-color: #000;
        position: absolute;
        z-index: 10;
        margin-left: 75%;
        top: 30px;
    }

    .sub-sujet-page .adresse p {
        padding-left: 0px;
        margin-top: 5px;
        margin-bottom: -10px;
        max-width: 90%;
    }

    .sub-sujet-page .details-vente {
        padding-top: 0px;
        font-size: 12px;
    }

    .sub-sujet-page .details-vente .label {
        display: inline-block;
        width: 120px !important;
    }

    .sub-sujet-page .ratios {
        margin-top: -88px;
    }

    .sub-sujet-page .ratios table {
        padding-top: 10px;
    }

    .sub-sujet-page .ratios table td {
        padding: 5px 0px 0px 0px;
        text-align: center;
        font-size: 13px;
        font-weight: bold;
    }

    .sub-sujet-page .ratios table td .txt-color {
        font-size: 22px;
        font-weight: normal;
        line-height: 30px;
    }

    .sub-sujet-page .ratios .middle {
        width: 280px;
        border-left: 1px solid {{ (Config::get('datas.compagnies')[$user->compagnie]['color']) }};;
        border-right: 1px solid {{ (Config::get('datas.compagnies')[$user->compagnie]['color']) }};;
    }

    .sub-sujet-page .geolocalisation .img.map img {
        width: 698px;
    }

    .sub-sujet-page .geolocalisation .table-title {
        margin-top: 0px;
    }

    .sujet-page .geolocalisation .img.map {
        max-width: 700px;
        height: 200px;
        overflow: hidden;
    }

    .sujet-page .geolocalisation .img.map img {
        max-width: 700px;
        margin-top: -140px;
    }
</style>
<div class="sub-sujet-page sujet-page">
    <h1>{{ __('pdf.vendu.title') }}</h1>
    <h2>{{ __('pdf.vendu.subtitle') }}</h2>
    <div class="index">{{ $nb }} </div>
    <div class="line"></div>
    <div class="clearfix"></div>
    <table>
        <tr>
            <td class="left">
                <table class="first">
                    <tr>
                        <td>
                            <img src="{{ $fiche->streetviewPDF }}">
                        </td>
                    </tr>
                    <tr>
                        <td class="adresse">
                            <p>{{ $fiche->adresse }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="details-vente">
                                <span class="label">{{ __('pdf.vendu.sold_price') }}</span><span class="txt-color">{{ money($fiche->comparable_vendu_prix_vente)  }} </span><br />
                                <span class="label">{{ __('pdf.vendu.sale_date') }}</span>{{ $fiche->comparable_vendu_date_vente   }}<br />
                                <span class="label">{{ __('pdf.vendu.sale_delay') }}</span>{{ $fiche->comparable_vendu_delais_vente }} {{ __('pdf.vendu.days') }}
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
            <td class="right">
                <table class="first">
                    <tr class="tr-top">
                        <td>
                            <p class="bg-color table-title center">
                                {{ __('pdf.vendu.characteristics') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="bg-grey">
                                <tr class="thead">
                                    <td class="label"></td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td class="valeur">Comparable</td>
                                                <td class="valeur sujet">Sujet</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.vendu.property_type') }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_type_propriete}}</td>
                                                <td class="valeur">{{ $ficheMaster->caracteristique_type_propriete}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.vendu.building_type') }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_type_batiment}}</td>
                                                <td class="valeur">{{ $ficheMaster->caracteristique_type_batiment}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.vendu.construction_year') }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_annee_construction}}</td>
                                                <td class="valeur">{{ $ficheMaster->caracteristique_annee_construction}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.vendu.land_area') }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_superficie_terrain}}</td>
                                                <td class="valeur">{{ $ficheMaster->caracteristique_superficie_terrain}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.vendu.living_area') }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_superficie_habitable}}</td>
                                                <td class="valeur">{{ $ficheMaster->caracteristique_superficie_habitable}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.vendu.garage') }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_garage}}</td>
                                                <td class="valeur">{{ $ficheMaster->caracteristique_garage}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.vendu.parking') }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_stationnement}}</td>
                                                <td class="valeur">{{ $ficheMaster->caracteristique_stationnement}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.vendu.num_rooms') }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_nombre_piece}}</td>
                                                <td class="valeur">{{ $ficheMaster->caracteristique_nombre_piece}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.vendu.num_bedrooms') }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_nombre_chambre}}</td>
                                                <td class="valeur">{{ $ficheMaster->caracteristique_nombre_chambre}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.vendu.num_bathrooms') }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_nombre_salle_de_bain}}</td>
                                                <td class="valeur">{{ $ficheMaster->caracteristique_nombre_salle_de_bain}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.vendu.num_floors') }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_nombre_etage}}</td>
                                                <td class="valeur">{{ $ficheMaster->caracteristique_nombre_etage}}</td>
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
    <table class="ratios">
        <tr>
            <td>
                <p class="bg-color table-title">
                    {{ __('pdf.vendu.sale_price_ratios') }}
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            {{ __('pdf.vendu.ratio_sale_asked') }}
                            <br>
                            <span class="txt-color">{{ $fiche->ratioVenteVsDemande}} %</span>
                        </td>
                        <td class="middle">
                            {{ __('pdf.vendu.ratio_sale_eval') }}
                            <br>
                            <span class="txt-color">{{ $fiche->ratioVenteVsEvaluation }} %</span>
                        </td>
                        <td>
                            {{ __('pdf.vendu.ratio_sale_sqft') }}
                            <br>
                            <span class="txt-color">{{ $fiche->ratioPiedCarreHabitableVendu }}$</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="geolocalisation">
                    <tr class="tr-top">
                        <td>
                            <p class="bg-color table-title center">
                                {{ __('pdf.vendu.geolocation') }}
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