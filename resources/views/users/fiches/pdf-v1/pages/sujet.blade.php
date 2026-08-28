<style>
    .sujet-page h1 {
        font-family: "opensans-light";
        font-size: 30px;
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

    .sujet-page table td.left {
        padding-right: 10px;
    }

    .sujet-page table td.right {
        padding-left: 10px;
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

    .sujet-page .left .table-title {
        margin-bottom: -4px;
    }

    .sujet-page .adresse p {
        font-size: 20px;
        padding: 0px 30px 10px 40px;
        line-height: 14px;
        margin-bottom: 25px;
        max-width: 70%;
    }

    .sujet-page .label {
        width: 70% !important;
    }

    .sujet-page .adresse .line {
        max-width: 40%;
    }
</style>
<div class="sujet-page">
    <h1>{{ __('pdf.sujet.title') }}</h1>
    <div class="line line-color"></div>
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

                            <div class="clearfix"></div>
                            <div class="line line-color"></div>
                            <div class="clearfix"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="bg-color table-title">
                                {{ __('pdf.sujet.geolocation') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ $fiche->mapPDF }}">
                        </td>
                    </tr>
                </table>

            </td>
            <td class="right">
                <table class="first">
                    <tr class="tr-top">
                        <td>
                            <p class="bg-color table-title center">
                                {{ __('pdf.sujet.municipal_eval') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="bg-grey">
                                <tr>
                                    <td class="label">{{ __('pdf.sujet.role_year') }}</td>
                                    <td class="valeur">{{ $fiche->annee_role}}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.sujet.land_eval') }}</td>
                                    <td class="valeur">{{ money($fiche->evaluation_terrain) }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.sujet.building_eval') }}</td>
                                    <td class="valeur">{{ money($fiche->evaluation_batiment) }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.sujet.total_eval') }}</td>
                                    <td class="valeur">{{ money($fiche->evaluationTotale) }}</td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr class="tr-top">
                        <td>
                            <p class="bg-color table-title center">
                                {{ __('pdf.sujet.characteristics') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="bg-grey">
                                <tr>
                                    <td class="label">{{ __('pdf.sujet.property_type') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_type_propriete}}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.sujet.building_type') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_type_batiment}}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.sujet.construction_year') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_annee_construction }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.sujet.land_area') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_superficie_terrain }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.sujet.living_area') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_superficie_habitable }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.sujet.garage') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_garage }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.sujet.parking') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_stationnement }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.sujet.num_rooms') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_nombre_piece }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.sujet.num_bedrooms') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_nombre_chambre }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.sujet.num_bathrooms') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_nombre_salle_de_bain}}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.sujet.num_floors') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_nombre_etage}}</td>
                                </tr>

                            </table>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>