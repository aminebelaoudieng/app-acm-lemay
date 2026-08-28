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
                                @if($fiche->type_copropriete=="divise")
                                <tr>
                                    <td class="label">{{ __('pdf.municipal_evaluation') }}</td>
                                    <td>{{ money($fiche->comparable_vigueur_prix_evaluation) }}</td>
                                </tr>
                                @endif
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
                                                <td class="valeur sujet header">{{ __('pdf.subject') }}</td>
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
                                    <td class="label">{{ __('pdf.bathroom_count') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_nombre_salle_de_bain}}</td>
                                                <td class="valeur sujet">{{ $ficheMaster->caracteristique_nombre_salle_de_bain}}</td>
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
                        @if($fiche->type_copropriete=="divise")
                        <td class="middle">
                            {{ __('pdf.requested_vs_municipal_evaluation') }}
                        </td>
                        @endif
                        <td>
                            {{ __('pdf.requested_vs_sqft') }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="txt-color">{{ $fiche->jourSurLeMarche}} jours</span>
                        </td>
                        @if($fiche->type_copropriete=="divise")
                        <td class="middle">
                            <span class="txt-color">{{ $fiche->ratioVenteVsEvaluation }} %</span>
                        </td>
                        @endif
                        <td>
                            <span class="txt-color">{{ $fiche->ratioPiedCarreHabitableVigueur }} $</span>
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