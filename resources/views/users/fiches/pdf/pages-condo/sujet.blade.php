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
    height: 360px;
    overflow: hidden;
    border: 2px solid black;
    z-index: 1;
    margin-top: 10px;
}

.sujet-page .geolocalisation .img.map img {
    max-width: 340px;
    transform: scale(1.75);
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
                    @if(($fiche->type_copropriete=="divise" && $fiche->categorie=="condo") || $fiche->categorie!="condo")
                    <tr class="tr-top">
                        <td>
                            <p class="table-title center mt">
                                {{ __('pdf.municipal_evaluation') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="bg-grey" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="label">{{ __('pdf.role_year') }}:</td>
                                    <td class="valeur">{{ $fiche->annee_role}}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.building_eval') }}:</td>
                                    <td class="valeur">{{ money($fiche->evaluation_batiment) }}</td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    @endif
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
                                <tr>
                                    <td class="label">{{ __('pdf.condo_type') }}:</td>
                                    <td class="valeur">{{ Config::get('datas.type_copropriete')[$fiche->type_copropriete]['name']}}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.construction_year') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_annee_construction }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.living_area') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_superficie_habitable }}</td>
                                </tr>


                                @if($fiche->caracteristique_stationnement>0)
                                <tr>
                                    <td class="label">{{ __('pdf.parking') }}</td>
                                    <td class="valeur">
                                        {{ $fiche->caracteristique_stationnement  }}</td>
                                </tr>
                                @endif

                                @if($fiche->caracteristique_garage>0)
                                <tr>
                                    <td class="label">{{ __('pdf.garage') }}</td>
                                    <td class="valeur">
                                        {{ $fiche->caracteristique_garage  }}</td>
                                </tr>
                                @endif
                                
                                <tr>
                                    <td class="label">{{ __('pdf.num_rooms') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_nombre_piece }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.num_bedrooms') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_nombre_chambre }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.num_bathrooms') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_nombre_salle_de_bain}}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.num_powder_rooms') }}</td>
                                    <td class="valeur">{{ $fiche->caracteristique_nombre_salle_eau ? $fiche->caracteristique_nombre_salle_eau : __('pdf.sujet.none') }}</td>
                                </tr>

                                <tr>
                                    <td class="label">{{ ($fiche->caracteristique_type_propriete=="condo")?__('pdf.floor'):__('pdf.floors')}}:</td>
                                    <td class="valeur">{{ $fiche->caracteristique_etage }}</td>
                                </tr>
                                <tr>
                                    <td class="label">{{ __('pdf.view') }}:</td>
                                    <td class="valeur">
                                        @if($fiche->type_vue)
                                        {{ __('datas.type_vue.' . $fiche->type_vue) }}
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
</div>
