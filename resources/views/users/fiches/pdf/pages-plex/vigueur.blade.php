<style>
.sub-sujet-page.vigueur .details-vente .label {
    display: inline-block;
    width: 140px !important;
}

.sub-sujet-page.vigueur .ratios table td {
    font-size: 12px;
}

.sub-sujet-page.fix-vigueur .details-vente {
    margin-top: 9px !important;
}
</style>
<div class="sub-sujet-page  fix-vigueur sujet-page">
    <h1 class="upper"><span class="index line-color txt-white">{{ $nb }} </span>{{ __('pdf.detailed_analysis_active') }}</h1>

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
                                <tr>
                                    <td class="label">{{ __('pdf.requested_price') }}</td>
                                    <td>{{ money($fiche->comparable_vigueur_prix_demande) }}</td>
                                </tr>

                                <tr>
                                    <td class="label">{{ __('pdf.sale_listing_date') }}</td>
                                    <td>{{ ($fiche->comparable_vigueur_date_vente)  }}</td>
                                </tr>

                            </table>

                        </td>
                    </tr>
                    <tr class="tr-top ">
                        <td>
                            <p class="table-title no-border">
                                {{ __('pdf.geolocation') }}
                            </p>
                        </td>
                    </tr>
                    <tr class="geolocalisation">
                        <td>
                            <div class="img map map-sided">
                                <img class="map" src="{{ $fiche->mapPDF }}">
                            </div>
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
                                    <td class="label">{{ __('pdf.property_type') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ __('datas.type_propriete.' . $fiche->caracteristique_type_propriete) }}</td>
                                                <td class="valeur sujet">{{ __('datas.type_propriete.' . $ficheMaster->caracteristique_type_propriete) }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.building_type') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ __('datas.type_batiment.' . $fiche->caracteristique_type_batiment) }}</td>
                                                <td class="valeur sujet">{{ __('datas.type_batiment.' . $ficheMaster->caracteristique_type_batiment) }}</td>
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
                                    <td class="label">{{ __('pdf.land_area_sqft') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">@if( $fiche->caracteristique_superficie_terrain) {{ $fiche->caracteristique_superficie_terrain}} @else - @endif</td>
                                                <td class="valeur sujet">@if( $ficheMaster->caracteristique_superficie_terrain) {{ $ficheMaster->caracteristique_superficie_terrain}} @else - @endif</td>
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


                                @if($ficheMaster->categorie=="commercial" || $ficheMaster->categorie=="mixte")
                                @if($fiche->unites_commercial || $ficheMaster->unites_commercial)
                                <tr>
                                    <td class="label">{{ __('pdf.commercial_unit') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->unites_commercial }}</td>
                                                <td class="valeur sujet"> {{ $ficheMaster->unites_commercial}} </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endif
                                @endif
                                @if($ficheMaster->categorie=="residentiel" || $ficheMaster->categorie=="mixte" || $ficheMaster->categorie=="residentiel")
                                @if($fiche->unites_residentiel_studio || $ficheMaster->unites_residentiel_studio)
                                <tr>
                                    <td class="label">{{ __('pdf.studio_count') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->unites_residentiel_studio }}</td>
                                                <td class="valeur sujet"> {{ $ficheMaster->unites_residentiel_studio}} </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endif

                                @if($fiche->unites_residentiel_1 || $ficheMaster->unites_residentiel_1)
                                <tr>
                                    <td class="label">{{ __('pdf.one_half_count') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->unites_residentiel_1 }}</td>
                                                <td class="valeur sujet"> {{ $ficheMaster->unites_residentiel_1}} </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endif

                                @if($fiche->unites_residentiel_2 || $ficheMaster->unites_residentiel_2)
                                <tr>
                                    <td class="label">{{ __('pdf.two_half_count') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->unites_residentiel_2 }}</td>
                                                <td class="valeur sujet"> {{ $ficheMaster->unites_residentiel_2}} </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endif


                                @if($fiche->unites_residentiel_3 || $ficheMaster->unites_residentiel_3)
                                <tr>
                                    <td class="label">{{ __('pdf.three_half_count') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->unites_residentiel_3 }}</td>
                                                <td class="valeur sujet"> {{ $ficheMaster->unites_residentiel_3}} </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endif

                                @if($fiche->unites_residentiel_4 || $ficheMaster->unites_residentiel_4)
                                <tr>
                                    <td class="label">{{ __('pdf.four_half_count') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->unites_residentiel_4 }}</td>
                                                <td class="valeur sujet"> {{ $ficheMaster->unites_residentiel_4}} </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endif

                                @if($fiche->unites_residentiel_5 || $ficheMaster->unites_residentiel_5)
                                <tr>
                                    <td class="label">{{ __('pdf.five_half_count') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->unites_residentiel_5 }}</td>
                                                <td class="valeur sujet"> {{ $ficheMaster->unites_residentiel_5}} </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endif


                                @if($fiche->unites_residentiel_6 || $ficheMaster->unites_residentiel_6)
                                <tr>
                                    <td class="label">{{ __('pdf.six_half_count') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->unites_residentiel_6 }}</td>
                                                <td class="valeur sujet"> {{ $ficheMaster->unites_residentiel_6}} </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endif

                                @if($fiche->unites_residentiel_7 || $ficheMaster->unites_residentiel_7)
                                <tr>
                                    <td class="label">{{ __('pdf.seven_half_count') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->unites_residentiel_7 }}</td>
                                                <td class="valeur sujet"> {{ $ficheMaster->unites_residentiel_7}} </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endif

                                @if($fiche->unites_residentiel_8 || $ficheMaster->unites_residentiel_8)
                                <tr>
                                    <td class="label">{{ __('pdf.eight_half_count') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->unites_residentiel_8 }}</td>
                                                <td class="valeur sujet"> {{ $ficheMaster->unites_residentiel_8}} </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endif
                                @endif

                                <tr>
                                    <td class="label">{{ __('pdf.floor_count') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_etage }}</td>
                                                <td class="valeur sujet">{{ $ficheMaster->caracteristique_etage }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>







                            </table>

                        </td>
                    </tr>

                    <tr class="tr-top">
                        <td>
                            <p class="table-title center">
                                {{ __('pdf.returns') }}
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
                                    <td class="label">{{ __('pdf.gross_income') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ money($fiche->rendement_revenus_brut) }}</td>
                                                <td class="valeur sujet">{{ money($ficheMaster->rendement_revenus_brut) }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.expenses') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ money($fiche->rendement_depense) }}</td>
                                                <td class="valeur sujet">{{ money($ficheMaster->rendement_depense) }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="label">{{ __('pdf.net_income') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ money(($fiche->rendement_revenus_brut-$fiche->rendement_depense))}}</td>
                                                <td class="valeur sujet">{{ money(($ficheMaster->rendement_revenus_brut-$ficheMaster->rendement_depense)) }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="label">{{ __('pdf.mrb') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ (($fiche->MRB))}}</td>
                                                <td class="valeur sujet">-</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>


                                <tr>
                                    <td class="label">MRN:</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ (($fiche->MRN))}}</td>
                                                <td class="valeur sujet">-</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>



                                <tr>
                                    <td class="label">Cap Rate:</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ (($fiche->CAP))}}%</td>
                                                <td class="valeur sujet">-</td>
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
                    {{ __('pdf.requested_price_ratios') }}
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            {{ __('pdf.days_on_market') }}
                        </td>
                        <td class="middle">
                            {{ __('pdf.requested_vs_municipal_evaluation') }}
                        </td>
                        <td>
                            {{ __('pdf.requested_vs_sqft') }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="txt-color">{{ $fiche->jourSurLeMarche}} jours</span>
                        </td>
                        <td class="middle">
                            <span class="txt-color">{{ $fiche->ratioVenteVsEvaluation }} %</span>
                        </td>
                        <td>
                            <span class="txt-color">{{ $fiche->ratioPiedCarreHabitableVigueur }} $</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</div>