<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success"><?php echo e(__('fiches_subtabs.save')); ?></button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 <?php $__errorArgs = ['comparable_vendu_date_vente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> is-required  ">
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.sale_date')); ?></strong>
            <?php echo Form::text('comparable_vendu_date_vente', (isset($fiche->comparable_vendu_date_vente))? $fiche->comparable_vendu_date_vente:'', array('class' => 'datepicker form-control', 'placeholder' => '(ex: 2024-03-15)')); ?>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 <?php $__errorArgs = ['comparable_vendu_delais_vente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> is-required">
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.sale_delay')); ?></strong>
            <?php echo Form::number('comparable_vendu_delais_vente', (isset($fiche->comparable_vendu_delais_vente))? $fiche->comparable_vendu_delais_vente:'', array('class' => 'form-control')); ?>

        </div>
    </div>

    <div class="field-evaluation-municipale col-xs-12 col-sm-12 col-md-12 <?php $__errorArgs = ['comparable_vendu_prix_evaluation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>  <?php if((isset($fiche) && ($fiche->type_copropriete!=" divise") && $ficheMaster->categorie!="condo") || (isset($fiche) && ($fiche->type_copropriete=="divise") && $ficheMaster->categorie=="condo") || (!isset($fiche) && $ficheMaster->categorie!="condo")): ?> is-required <?php else: ?> d-none <?php endif; ?>">
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.municipal_evaluation')); ?></strong>
            <?php echo Form::text('comparable_vendu_prix_evaluation', (isset($fiche->comparable_vendu_prix_evaluation))? $fiche->comparable_vendu_prix_evaluation:'', array('class' => 'money form-control')); ?>

        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 <?php $__errorArgs = ['comparable_vendu_prix_demande'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> is-required">
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.asked_price')); ?></strong>
            <?php echo Form::text('comparable_vendu_prix_demande', (isset($fiche->comparable_vendu_prix_demande))? $fiche->comparable_vendu_prix_demande:'', array('class' => 'money form-control')); ?>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 <?php $__errorArgs = ['comparable_vendu_prix_vente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> is-required">
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.sold_price')); ?></strong>
            <?php echo Form::text('comparable_vendu_prix_vente', (isset($fiche->comparable_vendu_prix_vente))? $fiche->comparable_vendu_prix_vente:'', array('class' => 'money form-control')); ?>

        </div>
    </div>
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/sub-tabs/prix-date-vendu.blade.php ENDPATH**/ ?>