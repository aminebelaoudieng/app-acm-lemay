<style>
    .resume-vigueur {width:100%;}
    .resume-vigueur td{ width:33%;border:1px solid black;text-align:center;}
    .resume-vigueur .header td{
        padding:10px;
        font-family:"lato-bold";
        font-size:14px;
    }
    .resume-vigueur .description td{
        padding:20px 50px;
        font-size:13px;
    }
    .resume-vigueur .prices td{
        background-color:#ccc;
        font-size:25px;
        padding:10px;
    }
</style>
<div class="courtier-page resume">
    
    @if(!$ficheMaster->ne_pas_afficher_les_vigueurs)      
     <h1 class="upper">{{ __('pdf.resume_vigueur.title') }}</h1>
  
    <br /> 
    <div class="texte">
        <p>
            <b>{{ __('pdf.avg_requested_price') }}</b>
            <br />
            {!! __('pdf.avg_requested_price_text', ['value' => '<span class="txt-color">' . money($ficheMaster->moyennePrixDemande) . '</span>']) !!}
        </p>
        <p>
            <b>{{ __('pdf.avg_ratio_requested_vs_evaluation') }}</b><br />
            {!! __('pdf.avg_ratio_requested_vs_evaluation_text', ['ratio' => '<span class="txt-color">' . $ficheMaster->moyenneRatioDemandeEvaluation . '%</span>']) !!}
        </p>
        <p>
            <b>{{ __('pdf.avg_requested_per_sqft_living') }}</b><br />
            {!! __('pdf.avg_requested_per_sqft_living_text', ['value' => '<span class="txt-color">' . $ficheMaster->moyenneRatioPrixHabitableVigueur . '$</span>']) !!}
        </p>
        <p>
            <b>{{ __('pdf.avg_requested_per_sqft_land') }}</b><br />
            {!! __('pdf.avg_requested_per_sqft_land_text', ['value' => '<span class="txt-color">' . $ficheMaster->moyenneRatioPrixTerrainVigueur . '$</span>']) !!}
        </p>
        <p>
            <b>{{ __('pdf.avg_market_delay') }}</b><br />
            {!! __('pdf.avg_days_on_market_text', ['value' => '<span class="txt-color">' . $ficheMaster->moyenneJoursVigueur . '</span>']) !!}
        </p>
        <p>
            <b>{{ __('pdf.avg_returns') }}</b><br />
             {!! __('pdf.avg_returns_details', [
                'mrb' => '<span class="txt-color">' . $ficheMaster->moyenneMRBVigueur . '</span>',
                'mrn' => '<span class="txt-color">' . $ficheMaster->moyenneMRNVigueur . '</span>',
                'cap' => '<span class="txt-color">' . $ficheMaster->moyenneCAPVigueur . '%</span>',
                'rbe' => '<span class="txt-color">' . $ficheMaster->moyenneRBEVigueur . '</span>'
            ]) !!}

        </p>

    </div>
    <br /><br /><br />
    @endif
    @if($ficheMaster->ne_pas_afficher_les_vigueurs)      
    <h2 class="table-title no-padding full-width">{{ $ficheMaster->ne_pas_afficher_les_vigueurs ? __('pdf.suggested_listing_price_sold') : __('pdf.suggested_listing_price_active') }}</h2>
    @else  
    <h2 class="table-title no-padding full-width">Prix d’inscription suggéré selon les comparables en vigueur</h2>
    @endif

   
    <br />
    <table class="resume-vigueur" cellpadding="0" cellspacing="0">
         <tr class="header line-color">
            <td class="txt-white upper">
                {{ __('pdf.motivated') }}
            </td>
            <td class="txt-white upper">
               {{ __('pdf.realistic') }}
            </td>
            <td class="txt-white upper">
                {{ __('pdf.optimistic') }}
            </td>
        </tr>
        <tr class="description">
            <td>
                {!!__('pdf.motivated_desc') !!}
            </td>
            <td>
                {!! __('pdf.realistic_desc') !!}
            </td>
            <td>
                {!! __('pdf.optimistic_desc') !!}
            </td>
        </tr>
        <tr class="prices">
            <td>
                @if($ficheMaster->prix_offensif)
               <span class="txt-color">{{ money($ficheMaster->prix_offensif)  }}</span>
               @else
               <br/>
               @endif
            </td>
            <td>
                @if($ficheMaster->prix_realiste)
               <span class="txt-color">{{ money($ficheMaster->prix_realiste)  }}</span>
               @else
               <br/>
               @endif
            </td>
            <td>
                @if($ficheMaster->prix_optimiste)
               <span class="txt-color">{{ money($ficheMaster->prix_optimiste) }}</span>
               @else
               <br/>
               @endif
            </td>
        </tr>
    </table>
</div>