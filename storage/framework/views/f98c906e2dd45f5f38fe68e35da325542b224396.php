<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success"><?php echo e(__('fiches_subtabs.save')); ?></button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <b><?php echo e(__('fiches_subtabs.averages_and_value_calculations')); ?></b>
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.by_land_sqft_price')); ?></strong>
            (<?php echo e(__('fiches_subtabs.will_override_auto_calc')); ?>)
            <?php echo Form::text('prix_au_pied_carre_terrain', (isset($fiche->prix_au_pied_carre_terrain))? $fiche->prix_au_pied_carre_terrain:'', array('class' => 'money form-control')); ?>

        </div>
    </div>

</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/sub-tabs/fait-saillant.blade.php ENDPATH**/ ?>