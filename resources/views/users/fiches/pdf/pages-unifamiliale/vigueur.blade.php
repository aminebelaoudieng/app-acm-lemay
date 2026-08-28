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
    <h1 class="upper"><span class="index line-color txt-white">{{ $nb }} </span>{{ __('pdf.vigueur.title') }}</h1>

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
                                    <td class="label">{{ __('pdf.vigueur.asked_price') }}</td>
                                    <td>{{ money($fiche->comparable_vigueur_prix_demande) }}</td>
                                </tr>

                                <tr>
                                    <td class="label">{{ __('pdf.vigueur.sale_date') }}</td>
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
                                {{ __('pdf.vigueur.characteristics') }}
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
                                    <td class="label">{{ __('pdf.vigueur.property_type') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.building_type') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.construction_year') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.land_area') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.living_area') }}</td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">@if( $fiche->caracteristique_superficie_habitable) {{ $fiche->caracteristique_superficie_habitable}} @else - @endif</td>
                                                <td class="valeur sujet">@if( $ficheMaster->caracteristique_superficie_habitable) {{ $ficheMaster->caracteristique_superficie_habitable}} @else - @endif</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.vigueur.num_rooms') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.num_bedrooms') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.num_bathrooms') }}</td>
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
                                    <td class="label">{{ __('pdf.vigueur.num_powder_rooms') }}</td>
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
                                    <td class="label">{{ ($ficheMaster->caracteristique_type_propriete=="condo")?__('pdf.vigueur.floor'):__('pdf.vigueur.floors') }}: </td>
                                    <td>
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td class="valeur">{{ $fiche->caracteristique_etage }}</td>
                                                <td class="valeur sujet">{{ $ficheMaster->caracteristique_etage }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                
                                @if($fiche->caracteristique_stationnement>0 || $ficheMaster->caracteristique_stationnement>0)
                                <tr>
                                    <td class="label">{{ __('pdf.vigueur.parking') }}</td>

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
                                    <td class="label">{{ __('pdf.vigueur.garage') }}</td>

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
                    {{ __('pdf.vigueur.asked_price_ratios') }}
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            {{ __('pdf.vigueur.days_on_market') }}
                        </td>
                        <td class="middle">
                            {{ __('pdf.vigueur.ratio_asked_eval') }}
                        </td>
                        <td>
                            {{ __('pdf.vigueur.ratio_asked_sqft') }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="txt-color">{{ $fiche->jourSurLeMarche}} {{ __('pdf.vigueur.days') }}</span>
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
    <table class="" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <table class="geolocalisation full-width" cellpadding="0" cellspacing="0">
                    <tr class="tr-top">
                        <td>
                            <p class="table-title no-border">
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