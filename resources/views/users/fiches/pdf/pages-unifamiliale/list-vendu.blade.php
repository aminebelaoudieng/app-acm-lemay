<style>
.list-page .img div {
    max-width: 100px;
    margin: auto;
}

.list-page .img img {
    max-width: 100px;
}

.list-page .img span {
    position: absolute;
    width: 20px;
    height: 20px;
    color: #fff;
    display: block;
    text-align: center;
    line-height: 20px;
    font-size: 12px;
}

.list-page .img span img {
    max-width: 90%;
    display: inline;
    margin-top: 5px;
}


.list-page table.bg-grey {
    width: 100%;
    max-width: 100%;
}

.list-page table.bg-grey tr td {
    text-align: center;

    line-height: 14px;
    vertical-align: middle;
    border: 2px solid #ccc;
}

.list-page table.bg-grey {
    border-bottom: 2px solid #ccc;
    font-size: 12px;
}

.list-page table.bg-grey tr td.no-border {
    border: 0px !important;
}

.list-page sup {
    width: 100%;
    display: block;
    margin-bottom: 30px;
}

.list-page .page-title {
    margin-top: -10px;
    margin-bottom: 0px !important;
}

.list-page .page-sub-title {
    letter-spacing: 4px;
    font-family: "lato";
    font-weight: "normal";
    padding-bottom: 5px;
}

.list-page .graph {
    width: 280px;
    margin-right: 40px;
}

.list-page .graph img {
    width: 100%;
}

.list-page .graph p {
    margin-top: 0px;
    margin-bottom: 0px;
}

.list-page .prix-moyen {
    margin-left: 40px;
    margin-right: 40px;
}

.list-page .graph .infos {
    border: 2px solid #ccc;
    padding: 3px 0px;
    ;
}

.list-page .probablite {
    font-size: 14px;
}

.list-page td.txt-white.main-label {
    width: 170px !important;
    padding: 30px 0px;
    font-size: 14px;
}

.list-page td.txt-white {
    font-family: "lato-bold";
    font-size: 13px;
}

.list-page td.info-fiche {
    font-size: 13px;
    padding: 5px 0px !important;
}
</style>
<div class="list-page">
    <h1 class="txt-center upper page-title">{{ __('pdf.sales_price_analysis') }}</h1>
    <h2 class="txt-center upper page-sub-title">{{ __('pdf.for_selected_comparables') }}</h2>
    <div class="clearfix"></div>
    <table class="bg-grey" cellpadding="0" cellspacing="0">
        <tr>
            <td class="first-col no-border main-label">&nbsp;</td>
            <td class="img no-border info-fiche">
                <div>
                    <span class="line-color"> <img src="{{  public_path('images/pdf/home.png') }}" /></span>
                    <img src="{{ $ficheMaster->streetviewPDF }}">
                </div>
            </td>
            @php
            $nb=1;
            @endphp

            @foreach($ficheMaster->fichesVendu()->limit(4)->get() as $fiche)
            <td class="img no-border info-fiche">
                <div>
                    <span class="line-color">{{ $nb }}</span><img src="{{ $fiche->streetviewPDF }}">
                </div>
            </td>
            @php
            $nb++;
            @endphp

            @endforeach
        </tr>

        <tr>
            <td class="line-color txt-white main-label">{{ __('pdf.address') }}</td>
            <td class="line-color txt-white info-fiche">{{ $ficheMaster->numero_civic}}{{ ($ficheMaster->appartement)?" #".$ficheMaster->appartement:""}}<br />{{ $ficheMaster->rue}}</td>
            @foreach($ficheMaster->fichesVendu()->limit(4)->get() as $fiche)
            <td class="line-color txt-white info-fiche">{{ $fiche->numero_civic}}{{ ($fiche->appartement)?" #".$fiche->appartement:""}}<br />{{ $fiche->rue}}</td>
            @endforeach
        </tr>

        <tr>
            <td class="main-label">{{ __('pdf.city') }}</td>
            <td class="info-fiche">{{ $ficheMaster->ville}}</td>
            @foreach($ficheMaster->fichesVendu()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->ville}}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.municipal_evaluation') }}</td>
            <td class="info-fiche">{{ money($ficheMaster->evaluationTotale) }}</td>
            @foreach($ficheMaster->fichesVendu()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ money($fiche->comparable_vendu_prix_evaluation) }}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.sold_price') }}</td>
            <td class="info-fiche">{{ money($ficheMaster->comparable_vendu_prix_vente) }}</td>
            @foreach($ficheMaster->fichesVendu()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ money($fiche->comparable_vendu_prix_vente) }}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.property_type') }}</td>
            <td class="info-fiche">{{ __('datas.type_propriete.' . $fiche->caracteristique_type_propriete) }}</td>
            @foreach($ficheMaster->fichesVendu()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ __('datas.type_propriete.' . $fiche->caracteristique_type_propriete) }}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.building_type') }}</td>
            <td class="info-fiche">{{ __('datas.type_batiment.' . $fiche->caracteristique_type_batiment) }}</td>
            @foreach($ficheMaster->fichesVendu()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ __('datas.type_batiment.' . $fiche->caracteristique_type_batiment) }}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.year_built') }}</td>
            <td class="info-fiche">{{ $ficheMaster->caracteristique_annee_construction}}</td>
            @foreach($ficheMaster->fichesVendu()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->caracteristique_annee_construction}}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.living_area') }}</td>
            <td class="info-fiche">{{ $ficheMaster->caracteristique_superficie_habitable}}</td>
            @foreach($ficheMaster->fichesVendu()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->caracteristique_superficie_habitable}} pi²</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.bedroom_count') }}</td>
            <td class="info-fiche">{{ $ficheMaster->caracteristique_nombre_chambre}}</td>
            @foreach($ficheMaster->fichesVendu()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->caracteristique_nombre_chambre}}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.sale_listing') }}</td>
            <td class="info-fiche">-</td>
            @foreach($ficheMaster->fichesVendu()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->comparable_vendu_date_vente}}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.sale_delay') }}</td>
            <td class="info-fiche">-</td>
            @foreach($ficheMaster->fichesVendu()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->comparable_vendu_delais_vente}} jours </td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.requested_price') }}</td>
            <td class="info-fiche">-</td>
            @foreach($ficheMaster->fichesVendu()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ money($fiche->comparable_vendu_prix_demande)}}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{!! __('pdf.price_per_sqft_sale') !!}*</td>
            <td class="info-fiche">-</td>
            @foreach($ficheMaster->fichesVendu()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->ratioPiedCarreHabitableVendu}} $ /pi²</td>
            @endforeach
        </tr>
    </table>
    <sup class="txt-center" style="margin-top:-20px;">{{ __('pdf.price_per_sqft_note') }}</sup>
    <table>
        <tr>
            <td>
                <table class="graph" cellpadding="0" cellspacing="0">
                    <tr>
                        <td><img src="{{  public_path('images/pdf/graph.png') }}" /></td>
                    </tr>
                    <tr>
                        <td class="infos">
                            <p class="txt-center">
                                @if($ficheMaster->use_moyenne_prix_pi2)
                                {{ money($ficheMaster->moyenneRatioPrixHabitableVendu*0.95) }} <span class="prix-moyen">{{ money($ficheMaster->moyenneRatioPrixHabitableVendu) }}</span>{{ money($ficheMaster->moyenneRatioPrixHabitableVendu*1.05) }}

                                @else
                                {{ money($ficheMaster->moyennePrixVente*0.95) }} <span class="prix-moyen">{{ money($ficheMaster->moyennePrixVente) }}</span>{{ money($ficheMaster->moyennePrixVente*1.05) }}
                                @endif
                            </p>
                            <p class="txt-center txt-grey">{{ __('pdf.central_tendency') }}</p>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <br /><br />
                @if($ficheMaster->use_moyenne_prix_pi2)
                <p class="table-title" style="font-size:12px;">{{ __('pdf.probable_listing_price_sqft') }}</p>
                <p class="probablite">{{ __('pdf.probable_sale_price_7_of_10', ['min' => money($ficheMaster->moyenneRatioPrixHabitableVendu*0.95), 'max' => money($ficheMaster->moyenneRatioPrixHabitableVendu*1.05)]) }}</p>

                @else
                <p class="table-title" style="font-size:12px;">{{ __('pdf.probable_listing_price_requested') }}</p>
                <p class="probablite">{{ __('pdf.probable_sale_price_7_of_10', ['min' => money($ficheMaster->moyenneRatioPrixHabitableVendu*0.95), 'max' => money($ficheMaster->moyenneRatioPrixHabitableVendu*1.05)]) }}</p>
                @endif
            </td>
        </tr>
    </table>
</div>