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
   <h1 class="upper"><?php echo e(__('pdf.resume_general_title')); ?></h1>
    
    <br /><br />
    <h2 class="table-title no-padding full-width"><?php echo e(__('pdf.resume_general.suggested_listing_price')); ?></h2>

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
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/pdf/pages/resume-general.blade.php ENDPATH**/ ?>