<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success"><?php echo e(__('fiches_subtabs.save')); ?></button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.offensive_price')); ?></strong>
            <?php echo Form::text('prix_offensif', (isset($fiche->prix_offensif))? $fiche->prix_offensif:'', array('class' => 'money form-control')); ?>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.realistic_price')); ?></strong>
            <?php echo Form::text('prix_realiste', (isset($fiche->prix_realiste))? $fiche->prix_realiste:'', array('class' => 'money form-control')); ?>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.optimistic_price')); ?></strong>
            <?php echo Form::text('prix_optimiste', (isset($fiche->prix_optimiste))? $fiche->prix_optimiste:'', array('class' => 'money form-control')); ?>

        </div>
    </div>
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/sub-tabs/prix-suggerer.blade.php ENDPATH**/ ?>