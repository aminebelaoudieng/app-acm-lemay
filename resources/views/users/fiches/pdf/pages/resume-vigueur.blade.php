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
     <h1 class="upper">{{ __('pdf.resume_vigueur_title') }}</h1>
  
    <br /> 
    <div class="texte">
        <p>
            <b>{{ __('pdf.resume_vigueur.avg_asked_price') }}</b>
            <br />
            {!! __('pdf.resume_vigueur.avg_asked_price_text', ['value' => money($ficheMaster->moyennePrixDemande)]) !!}
        </p>
        <p>
            <b>{{ __('pdf.resume_vigueur.avg_ratio_asked_eval') }}</b><br />
            {!! __('pdf.resume_vigueur.avg_ratio_asked_eval_text', ['value' => $ficheMaster->moyenneRatioDemandeEvaluation]) !!}
        </p>
        <p>
            <b>{{ __('pdf.resume_vigueur.avg_asked_habitable') }}</b><br />
            {!! __('pdf.resume_vigueur.avg_asked_habitable_text', ['value' => $ficheMaster->moyenneRatioPrixHabitableVigueur]) !!}
        </p>
        <p>
            <b>{{ __('pdf.resume_vigueur.avg_asked_land') }}</b><br />
            {!! __('pdf.resume_vigueur.avg_asked_land_text', ['value' => $ficheMaster->moyenneRatioPrixTerrainVigueur]) !!}
        </p>
        <p>
            <b>{{ __('pdf.resume_vigueur.avg_market_time') }}</b><br />
            {!! __('pdf.resume_vigueur.avg_market_time_text', ['value' => $ficheMaster->moyenneJoursVigueur]) !!}
        </p>

    </div>
    <br /><br /><br />
    @endif
    @if($ficheMaster->ne_pas_afficher_les_vigueurs)      
    <h2 class="table-title no-padding full-width">{{ __('pdf.resume_vigueur.suggested_listing_price_sold') }}</h2>
    @else  
    <h2 class="table-title no-padding full-width">{{ __('pdf.resume_vigueur.suggested_listing_price_active') }}</h2>
    @endif

   
    <br />
    <table class="resume-vigueur" cellpadding="0" cellspacing="0">
         <tr class="header line-color">
            <td class="txt-white upper">
                {{ __('pdf.resume_vigueur.motivated') }}
            </td>
            <td class="txt-white upper">
               {{ __('pdf.resume_vigueur.realistic') }}
            </td>
            <td class="txt-white upper">
                {{ __('pdf.resume_vigueur.optimistic') }}
            </td>
        </tr>
        <tr class="description">
            <td>
                {!! __('pdf.resume_vigueur.motivated_desc') !!}
            </td>
            <td>
                {!! __('pdf.resume_vigueur.realistic_desc') !!}
            </td>
            <td>
                {!! __('pdf.resume_vigueur.optimistic_desc') !!}
            </td>
        </tr>
        <tr class="prices">
            <td>
                @if($ficheMaster->prix_offensif)
               {{ money($ficheMaster->prix_offensif)  }}
               @else
               <br/>
               @endif
            </td>
            <td>
                @if($ficheMaster->prix_realiste)
               {{ money($ficheMaster->prix_realiste)  }}
               @else
               <br/>
               @endif
            </td>
            <td>
                @if($ficheMaster->prix_optimiste)
               {{ money($ficheMaster->prix_optimiste) }}
               @else
               <br/>
               @endif
            </td>
        </tr>
    </table>
</div>