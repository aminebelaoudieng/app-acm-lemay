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
    
    <?php if(!$ficheMaster->ne_pas_afficher_les_vigueurs): ?>      
     <h1 class="upper"><?php echo e(__('pdf.resume_active_highlights_title')); ?></h1>
  
    <br /> 
    <div class="texte">
        <p>
            <b><?php echo e(__('pdf.avg_requested_price')); ?></b>
            <br />
            <?php echo __('pdf.avg_requested_price_text', ['value' => '<span class="txt-color">' . money($ficheMaster->moyennePrixDemande) . '</span>']); ?>

        </p>
        <p>
            <b><?php echo e(__('pdf.avg_ratio_requested_vs_evaluation')); ?></b><br />
            <?php echo __('pdf.avg_ratio_requested_vs_evaluation_text', ['ratio' => '<span class="txt-color">' . $ficheMaster->moyenneRatioDemandeEvaluation . '%</span>']); ?>

        </p>
        <p>
            <b><?php echo e(__('pdf.avg_requested_per_sqft_living')); ?></b><br />
            <?php echo __('pdf.avg_requested_per_sqft_living_text', ['value' => '<span class="txt-color">' . $ficheMaster->moyenneRatioPrixHabitableVigueur . '$</span>']); ?>

        </p>
        <p>
            <b><?php echo e(__('pdf.avg_requested_per_sqft_land')); ?></b><br />
            <?php echo __('pdf.avg_requested_per_sqft_land_text', ['value' => '<span class="txt-color">' . $ficheMaster->moyenneRatioPrixTerrainVigueur . '$</span>']); ?>

        </p>
        <p>
            <b><?php echo e(__('pdf.avg_market_delay')); ?></b><br />
            <?php echo __('pdf.avg_market_delay_text', ['value' => '<span class="txt-color">' . $ficheMaster->moyenneJoursVigueur . '</span>']); ?>

        </p>

    </div>
    <br /><br /><br />
    <?php endif; ?>
    <?php if($ficheMaster->ne_pas_afficher_les_vigueurs): ?>      
    <h2 class="table-title no-padding full-width"><?php echo e($ficheMaster->ne_pas_afficher_les_vigueurs ? __('pdf.suggested_listing_price_sold') : __('pdf.suggested_listing_price_active')); ?></h2>
    <?php else: ?>  
    <h2 class="table-title no-padding full-width">Prix d’inscription suggéré selon les comparables en vigueur</h2>
    <?php endif; ?>

   
    <br />
    <table class="resume-vigueur" cellpadding="0" cellspacing="0">
         <tr class="header line-color">
            <td class="txt-white upper">
                <?php echo e(__('pdf.motivated')); ?>

            </td>
            <td class="txt-white upper">
               <?php echo e(__('pdf.realistic')); ?>

            </td>
            <td class="txt-white upper">
                <?php echo e(__('pdf.optimistic')); ?>

            </td>
        </tr>
        <tr class="description">
            <td>
                <?php echo __('pdf.motivated_desc'); ?>

            </td>
            <td>
                <?php echo __('pdf.realistic_desc'); ?>

            </td>
            <td>
                <?php echo __('pdf.optimistic_desc'); ?>

            </td>
        </tr>
        <tr class="prices">
            <td>
                <?php if($ficheMaster->prix_offensif): ?>
               <span class="txt-color"><?php echo e(money($ficheMaster->prix_offensif)); ?></span>
               <?php else: ?>
               <br/>
               <?php endif; ?>
            </td>
            <td>
                <?php if($ficheMaster->prix_realiste): ?>
               <span class="txt-color"><?php echo e(money($ficheMaster->prix_realiste)); ?></span>
               <?php else: ?>
               <br/>
               <?php endif; ?>
            </td>
            <td>
                <?php if($ficheMaster->prix_optimiste): ?>
               <span class="txt-color"><?php echo e(money($ficheMaster->prix_optimiste)); ?></span>
               <?php else: ?>
               <br/>
               <?php endif; ?>
            </td>
        </tr>
    </table>
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/pdf/pages-unifamiliale/resume-vigueur.blade.php ENDPATH**/ ?>