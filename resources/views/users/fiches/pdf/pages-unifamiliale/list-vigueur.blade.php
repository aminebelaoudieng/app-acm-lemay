<div class="list-page">
    <h1 class="txt-center upper page-title">{{ __('pdf.sales_price_analysis') }}</h1>
    <h2 class="txt-center upper page-sub-title vigueur">{{ __('pdf.for_selected_active_listings') }}</h2>
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

            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
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
            <td class="line-color txt-white">{{ __('pdf.address') }}</td>
            <td class="line-color txt-white info-fiche">{{ $ficheMaster->numero_civic}}{{ ($ficheMaster->appartement)?" #".$ficheMaster->appartement:""}}<br />{{ $ficheMaster->rue}}</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="line-color txt-white info-fiche">{{ $fiche->numero_civic}}{{ ($fiche->appartement)?" #".$fiche->appartement:""}}<br />{{ $fiche->rue}}</td>
            @endforeach
        </tr>

        <tr>
            <td class="main-label">{{ __('pdf.city') }}</td>
            <td class="info-fiche">{{ $ficheMaster->ville}}</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->ville}}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.municipal_evaluation') }}</td>
            <td class="info-fiche">{{ money($ficheMaster->evaluationTotale) }}</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ money($fiche->comparable_vigueur_prix_evaluation) }}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.property_type') }}</td>
            <td class="info-fiche">{{ __('datas.type_propriete.' . $ficheMaster->caracteristique_type_propriete) }}</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ __('datas.type_propriete.' . $fiche->caracteristique_type_propriete) }}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.building_type') }}</td>
            <td class="info-fiche">{{ __('datas.type_batiment.' . $ficheMaster->caracteristique_type_batiment) }}</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ __('datas.type_batiment.' . $fiche->caracteristique_type_batiment) }}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.year_built') }}</td>
            <td class="info-fiche">{{ $ficheMaster->caracteristique_annee_construction}}</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->caracteristique_annee_construction}}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.living_area') }}</td>
            <td class="info-fiche">{{ $ficheMaster->caracteristique_superficie_habitable}}</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->caracteristique_superficie_habitable}}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.bedroom_count') }}</td>
            <td class="info-fiche">{{ $ficheMaster->caracteristique_nombre_chambre}}</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->caracteristique_nombre_chambre}}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.vigueur.days_on_market') }}</td>
            <td class="info-fiche">-</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->jourSurLeMarche}} jours </td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.price_per_sqft_requested') }}*</td>
            <td class="info-fiche">-</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->ratioPiedCarreHabitableVigueur}} $ /pi²</td>
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
                                {{ money($ficheMaster->moyenneRatioPrixHabitableVigueur*0.95) }} <span class="prix-moyen">{{ money($ficheMaster->moyenneRatioPrixHabitableVigueur) }}</span>{{ money($ficheMaster->moyenneRatioPrixHabitableVigueur*1.05) }}
                                @else
                                {{ money($ficheMaster->moyennePrixDemande*0.95) }} <span class="prix-moyen">{{ money($ficheMaster->moyennePrixDemande) }}</span>{{ money($ficheMaster->moyennePrixDemande*1.05) }}
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
                <p class="table-title" style="font-size:12px;">{{ __('pdf.probable_listing_price_sale') }}</p>
                <p class="probablite">{{ __('pdf.probable_sale_price_7_of_10', ['min' => money($ficheMaster->moyenneRatioPrixHabitableVendu*0.95), 'max' => money($ficheMaster->moyenneRatioPrixHabitableVendu*1.05)]) }}</p>


                @endif
            </td>
        </tr>
    </table>
</div>