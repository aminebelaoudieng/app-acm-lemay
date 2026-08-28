<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success"><?php echo e(__('fiches_subtabs.save')); ?></button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.intro')); ?></strong>
            <?php echo Form::textarea('intro', (isset($fiche->intro))? $fiche->intro:__('fiches_subtabs.intro_default'), array('class' => 'form-control')); ?>

        </div>
    </div>
</div>

<?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/sub-tabs/intro.blade.php ENDPATH**/ ?>