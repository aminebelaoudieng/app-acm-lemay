<div class="list-page">
    <h1 class="txt-center upper page-title">{{ __('pdf.list_vigueur_title') }}</h1>
    <h2 class="txt-center upper page-sub-title vigueur">{{ __('pdf.list_vigueur_subtitle') }}</h2>
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
            <td class="main-label">{{ __('pdf.vigueur.municipal_assessment') }}</td>
            <td class="info-fiche">{{ money($ficheMaster->evaluationTotale) }}</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ money($fiche->comparable_vigueur_prix_evaluation) }}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.vigueur.property_type') }}</td>
            <td class="info-fiche">{{ translateData('datas.type_propriete', $ficheMaster->caracteristique_type_propriete) }}</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ translateData('datas.type_propriete', $fiche->caracteristique_type_propriete) }}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.vigueur.building_type') }}</td>
            <td class="info-fiche">{{ translateData('datas.type_batiment', $ficheMaster->caracteristique_type_batiment) }}</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ translateData('datas.type_batiment', $fiche->caracteristique_type_batiment) }}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.vigueur.construction_year') }}</td>
            <td class="info-fiche">{{ $ficheMaster->caracteristique_annee_construction}}</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->caracteristique_annee_construction}}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.vigueur.living_area') }}</td>
            <td class="info-fiche">{{ $ficheMaster->caracteristique_superficie_habitable}}</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->caracteristique_superficie_habitable}}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.vigueur.num_bedrooms') }}</td>
            <td class="info-fiche">{{ $ficheMaster->caracteristique_nombre_chambre}}</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->caracteristique_nombre_chambre}}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.vigueur.days_on_market') }}</td>
            <td class="info-fiche">-</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->jourSurLeMarche}} {{ __('pdf.vigueur.days') }}</td>
            @endforeach
        </tr>
        <tr>
            <td class="main-label">{{ __('pdf.vigueur.ratio_asked_sqft') }}*</td>
            <td class="info-fiche">-</td>
            @foreach($ficheMaster->fichesVigueur()->limit(4)->get() as $fiche)
            <td class="info-fiche">{{ $fiche->ratioPiedCarreHabitableVigueur}} $ /pi²</td>
            @endforeach
        </tr>
    </table>
    <sup class="txt-center" style="margin-top:-20px;">* Le taux au pieds carrés est déterminé en fonction de la superficie hors-sol de la propriété comparable</sup>
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
                <p class="table-title" style="font-size:12px;">{{ __('pdf.likely_price_sqft') }}</p>
                <p class="probablite">{!! __('pdf.price_probability', ['min' => money($ficheMaster->moyenneRatioPrixHabitableVigueur*0.95), 'max' => money($ficheMaster->moyenneRatioPrixHabitableVigueur*1.05)]) !!}</p>

                @else
                <p class="table-title" style="font-size:12px;">{{ __('pdf.likely_price_sale') }}</p>
                <p class="probablite">{!! __('pdf.price_probability', ['min' => money($ficheMaster->moyennePrixDemande*0.95), 'max' => money($ficheMaster->moyennePrixDemande*1.05)]) !!}</p>

                @endif
            </td>
        </tr>
    </table>
</div>