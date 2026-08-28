<style>
    .sub-sujet-page.vigueur .details-vente .label {
        display: inline-block;
        width: 140px !important;
    }

    .sub-sujet-page.vigueur .ratios table td {
        font-size: 12px;
    }
</style>
<div class="sub-sujet-page vigueur sujet-page">
    <h1>{{ __('pdf.vigueur.title') }}</h1>
    <h2>{{ __('pdf.vigueur.subtitle') }}</h2>
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
                                <span class="label">{{ __('pdf.vigueur.asked_price') }}</span><span class="txt-color"> {{ money($fiche->comparable_vigueur_prix_demande)   }}</span> <br />
                                <span class="label">{{ __('pdf.vigueur.sale_date') }}</span> {{ $fiche->comparable_vigueur_date_vente    }}<br />
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
                                {{ __('pdf.vigueur.characteristics') }}
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
                                    <td class="label">{{ __('pdf.vigueur.property_type') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.building_type') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.construction_year') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.land_area') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.living_area') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.garage') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.parking') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.num_rooms') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.num_bedrooms') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.num_bathrooms') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.num_floors') }}</td>
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
                    {{ __('pdf.vigueur.stats') }}
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td>
                            {{ __('pdf.vigueur.days_on_market') }}
                            <br>
                            <span class="txt-color"> {{ $fiche->jourSurLeMarche }} {{ __('pdf.vigueur.days') }}</span>
                        </td>
                        <td class="middle">
                            {{ __('pdf.vigueur.ratio_asked_eval') }}
                            <br>
                            <span class="txt-color"> {{ $fiche->ratioVenteVsEvaluation }} %</span>
                        </td>
                        <td>
                            {{ __('pdf.vigueur.ratio_asked_sqft') }}
                            <br>
                            <span class="txt-color"> {{ $fiche->ratioPiedCarreHabitableVigueur }} %</span>
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
                                {{ __('pdf.vigueur.geolocation') }}
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