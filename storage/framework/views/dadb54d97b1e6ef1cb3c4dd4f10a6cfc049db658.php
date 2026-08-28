<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success"><?php echo e(__('fiches_subtabs.save')); ?></button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.role_year')); ?></strong>
            <?php
            $annees=[];
            for($i=date('Y');$i>=1800;$i--){
            $annees[$i]=$i;
            }
            ?>
            <?php echo Form::select('annee_role', $annees, (isset($fiche->annee_role))? $fiche->annee_role:'', array('class' => 'form-control')); ?>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 <?php $__errorArgs = ['evaluation_terrain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> is-required">
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.land_evaluation')); ?></strong>
            <?php echo Form::text('evaluation_terrain', null, array('class' => 'money form-control')); ?>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 <?php $__errorArgs = ['evaluation_batiment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> is-required">
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.building_evaluation')); ?></strong>
            <?php echo Form::text('evaluation_batiment', null, array('class' => 'money form-control')); ?>

        </div>
    </div>
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/sub-tabs/evaluations.blade.php ENDPATH**/ ?>