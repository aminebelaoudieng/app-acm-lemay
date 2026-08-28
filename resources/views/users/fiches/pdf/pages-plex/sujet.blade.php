<style>
    .sujet-page h1 {
        font-size: 26px;
    }

    .sujet-page .line {
        width: 100%;
        height: 1px;
        margin: auto;
        margin: 20px auto;
        clear: both;
    }

    .sujet-page table {
        width: 100%;
    }

    .sujet-page table td.left,
    .sujet-page table td.right {
        width: 50%;
    }

    .sujet-page .caracteristiques tr td,
    .sujet-page .caracteristiques tr {
        font-size: 11.5px;
        height: 25px;
        padding: 0px !important;
        padding-top: 3px !important;
    }

    .sujet-page table td.left {
        padding-right: 20px;
    }

    .sujet-page table td.right {
        padding-left: 20px;
    }

    h1,
    h2 {
        margin-top: 0px !important;
        margin-bottom: 0px !important;
    }

    .sujet-page table img {
        max-width: 350px;
    }

    .sujet-page table.first {
        margin-top: 60px;
    }

    .sujet-page .right table.first {
        margin-top: 44px;
    }

    .sujet-page table.first.no-margin-top {
        margin-top: 10px;
    }

    .sujet-page .left .table-title {
        margin-bottom: -4px;
    }

    .sujet-page .adresse p {
        font-size: 18px;
        padding: 0px;
        line-height: 14px;
        margin-bottom: 25px;
        font-weight: bold;
    }

    .sujet-page .label {
        width: 55% !important;
    }


    .sujet-page .adresse .line {
        max-width: 40%;
    }

    .sujet-page .rendement-title {
        margin-top: 22px;
        position: relative;
        z-index: 2;
    }

    .sujet-page .geo-title {
        margin-top: 45px;
        position: relative;
        z-index: 2;
    }

    .sujet-page .geolocalisation {
        margin-top: 10px;
    }

    .sujet-page .geolocalisation .img.map {
        max-width: 345px;
        height: 220px;
        overflow: hidden;
        border: 2px solid black;
        z-index: 1;
        margin-top: 10px;
    }

    .sujet-page .geolocalisation .img.map img {
        max-width: 340px;
        margin-top: -20px;
        transform: scale(1.75);
    }

    .sujet-page .bg-grey.no-padding-top {
        padding-top: 0px;
    }
</style>
<div class="sujet-page subject-overview-page">
    <h1 class="txt-center upper page-title">{{ __('pdf.subject_description') }}</h1>
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
                        <td>
                            <p class="table-title rendement-title">
                                {{ __('pdf.returns') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="bg-grey no-padding-top caracteristiques" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="label">{{ __('pdf.gross_income') }}</td>
                                    <td class="valeur">{{ money($fiche->rendement_revenus_brut) }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.expenses') }}</td>
                                    <td class="valeur">{{ money($fiche->rendement_depense) }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.net_income') }}</td>
                                    <td class="valeur">{{ money(($fiche->rendement_revenus_brut-$fiche->rendement_depense)) }}</td>
                                </tr>

                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="table-title geo-title">
                                {{ __('pdf.geolocation') }}
                            </p>
                        </td>
                    </tr>
                    <tr class="geolocalisation">
                        <td class="">
                            <div class="img map">
                                <img class="mapPDF" src="{{ $fiche->mapPDF }}">
                            </div>
                        </td>
                    </tr>
                </table>

            </td>
            <td class="right">
                <table class="first">
                    <tr>
                        <td class="adresse border-bottom">
                            <p class="upper">{{ $fiche->numero_civic }} {{ $fiche->rue }}{{ ($fiche->appartement)?" #".$fiche->appartement:"" }}, {{ $fiche->ville }}, {{ $fiche->province }}, Canada, {{ $fiche->code_postal }}</p>
                        </td>
                    </tr>
                    <tr class="tr-top">
                        <td>
                            <p class="table-title center mt">
                                {{ __('pdf.municipal_evaluation') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="bg-grey caracteristiques" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="label">{{ __('pdf.role_year') }}</td>
                                    <td class="valeur">{{ $fiche->annee_role}}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.land_evaluation') }}</td>
                                    <td class="valeur">{{ money($fiche->evaluation_terrain) }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.building_evaluation') }}</td>
                                    <td class="valeur">{{ money($fiche->evaluation_batiment) }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.total_evaluation') }}</td>
                                    <td class="valeur">{{ money($fiche->evaluationTotale) }}</td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr class="tr-top">
                        <td>
                            <p class="table-title center">
                                {{ __('pdf.characteristics') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="bg-grey caracteristiques" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="label">{{ __('pdf.property_type') }}</td>
                                    <td class="valeur">{{ __('datas.type_propriete.' . $fiche->caracteristique_type_propriete) }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.building_type') }}</td>
                                    <td class="valeur">{{ __('datas.type_batiment.' . $fiche->caracteristique_type_batiment) }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.year_built') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_annee_construction }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.land_area_sqft') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_superficie_terrain }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.living_area') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_superficie_habitable }}</td>
                                </tr>


                                @if($fiche->caracteristique_stationnement>0)
                                <tr>
                                    <td class="label">{{ __('pdf.parking') }}</td>
                                    <td class="valeur">
                                        {{ $fiche->caracteristique_stationnement  }}
                                    </td>
                                </tr>
                                @endif

                                @if($fiche->caracteristique_garage>0)
                                <tr>
                                    <td class="label">{{ __('pdf.garage') }}</td>
                                    <td class="valeur">
                                        {{ $fiche->caracteristique_garage  }}
                                    </td>
                                </tr>
                                @endif

                                @if($fiche->categorie=="commercial" || $fiche->categorie=="mixte")
                                <tr>
                                    <td class="label">{{ __('pdf.commercial_unit') }}</td>
                                    <td class="valeur">{{ $fiche->unites_commercial  }}</td>
                                </tr>
                                @endif

                                @if($fiche->categorie=="residentiel" || $fiche->categorie=="mixte" || $fiche->categorie=="residentiel")
                                @if($fiche->unites_residentiel_studio)
                                <tr>
                                    <td class="label">{{ __('pdf.studio_count') }}</td>
                                    <td class="valeur">{{ $fiche->unites_residentiel_studio  }}</td>
                                </tr>
                                @endif

                                @if($fiche->unites_residentiel_1)
                                <tr>
                                    <td class="label">{{ __('pdf.one_half_count') }}</td>
                                    <td class="valeur">{{ $fiche->unites_residentiel_1  }}</td>
                                </tr>
                                @endif

                                @if($fiche->unites_residentiel_2)
                                <tr>
                                    <td class="label">{{ __('pdf.two_half_count') }}</td>
                                    <td class="valeur">{{ $fiche->unites_residentiel_2 }}</td>
                                </tr>
                                @endif

                                @if($fiche->unites_residentiel_3)
                                <tr>
                                    <td class="label">{{ __('pdf.three_half_count') }}</td>
                                    <td class="valeur">{{ $fiche->unites_residentiel_3 }}</td>
                                </tr>
                                @endif

                                @if($fiche->unites_residentiel_4)
                                <tr>
                                    <td class="label">{{ __('pdf.four_half_count') }}</td>
                                    <td class="valeur">{{ $fiche->unites_residentiel_4 }}</td>
                                </tr>
                                @endif

                                @if($fiche->unites_residentiel_5)
                                <tr>
                                    <td class="label">{{ __('pdf.five_half_count') }}</td>
                                    <td class="valeur">{{ $fiche->unites_residentiel_5 }}</td>
                                </tr>
                                @endif

                                @if($fiche->unites_residentiel_6)
                                <tr>
                                    <td class="label">{{ __('pdf.six_half_count') }}</td>
                                    <td class="valeur">{{ $fiche->unites_residentiel_6 }}</td>
                                </tr>
                                @endif

                                @if($fiche->unites_residentiel_7)
                                <tr>
                                    <td class="label">{{ __('pdf.seven_half_count') }}</td>
                                    <td class="valeur">{{ $fiche->unites_residentiel_7 }}</td>
                                </tr>
                                @endif


                                @if($fiche->unites_residentiel_8)
                                <tr>
                                    <td class="label">{{ __('pdf.eight_half_count') }}</td>
                                    <td class="valeur">{{ $fiche->unites_residentiel_8 }}</td>
                                </tr>
                                @endif
                                @endif
                                <tr>
                                    <td class="label">{{ __('pdf.floor_count') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_etage }}</td>
                                </tr>

                                @if($fiche->type_finition)
                                <tr>
                                    <td class="label">{{ __('pdf.interior_finish_quality') }}</td>
                                    <td class="valeur">{{ __('datas.type_finition.' . $fiche->type_finition) }}</td>
                                </tr>
                                @endif

                            </table>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
