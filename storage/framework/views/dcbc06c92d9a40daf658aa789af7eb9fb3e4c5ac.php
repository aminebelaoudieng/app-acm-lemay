<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success"><?php echo e(__('fiches_subtabs.save')); ?></button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong><?php echo __('fiches_subtabs.use_avg_price'); ?></strong><br /> <label for="use_moyenne_prix_pi2"><?php echo e(__('fiches_subtabs.yes')); ?></label>
            <?php echo Form::checkbox('use_moyenne_prix_pi2', 1 , $fiche->use_moyenne_prix_pi2); ?>

        </div>
    </div>

</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/sub-tabs/configs.blade.php ENDPATH**/ ?>