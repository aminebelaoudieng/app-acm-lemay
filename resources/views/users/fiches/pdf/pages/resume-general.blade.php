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
   <h1 class="upper">{{ __('pdf.resume_general_title') }}</h1>
    
    <br /><br />
    <h2 class="table-title no-padding full-width">{{ __('pdf.resume_general.suggested_listing_price') }}</h2>

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