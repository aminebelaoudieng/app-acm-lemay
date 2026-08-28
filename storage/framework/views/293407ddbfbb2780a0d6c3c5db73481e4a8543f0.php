<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success"><?php echo e(__('fiches_subtabs.save')); ?></button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> is-required">
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.analysis_date')); ?></strong>
            <?php echo Form::text('date', (isset($fiche->date))? $fiche->date:'', array('class' => 'datepicker form-control', 'placeholder' => '(ex: 2024-03-15)')); ?>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 <?php $__errorArgs = ['but'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> is-required">
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.analysis_goal')); ?></strong>
            <?php echo Form::text('but', (isset($fiche->but))? $fiche->but:'', array('class' => 'form-control')); ?>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 <?php $__errorArgs = ['periode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> is-required">
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.analysis_period')); ?></strong>
            <?php echo Form::number('periode', (isset($fiche->periode))? $fiche->periode:'', array('class' => 'form-control')); ?>

        </div>
    </div>
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/sub-tabs/info-master.blade.php ENDPATH**/ ?>