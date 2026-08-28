<div class="row">
    <?php echo Form::model($fiche, ['method' => 'PATCH', 'files' => true, 'route' => ['fiches.updateAffichageVigueur', $fiche->id],'class'=>'col-xs-6 col-sm-6 col-md-6']); ?>


    <div class="form-group">
        <strong><?php echo e(__('fiches_tabs.hide_current_properties')); ?></strong>
        <?php echo Form::checkbox('ne_pas_afficher_les_vigueurs', 1 , $fiche->ne_pas_afficher_les_vigueurs); ?>

        <button type="submit" class="btn-sm btn-success pull-rght ml-3"><?php echo e(__('fiches_tabs.save')); ?></button>
    </div>

    <?php echo Form::close(); ?>

    <div class="col-lg-6 margin-tb">
        <div class="pull-left text-right">
            <a class="btn btn-success" href="<?php echo e(route('fiches.vigueur.create',$fiche->id)); ?>"><?php echo e(__('fiches_tabs.add')); ?></a>
        </div>
    </div>
</div>

<div class="pt-2">


    <?php $__currentLoopData = $fiches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subfiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row no-gutters list-proprietes">
        <div class="col-2">
            <img id="imgStreet" class="googleImg" style="max-width:150px" src="<?php echo e((isset($subfiche->streetView))? $subfiche->streetView:''); ?>">
        </div>
        <div class="col-8 d-flex align-items-center titre"><?php echo e($subfiche->adresse); ?></div>
        <div class="col-2 d-flex align-items-center justify-content-center">
            <a class="btn btn-info" href="<?php echo e(route('fiches.vigueur.edit',array($fiche->id,$subfiche->id))); ?>"><?php echo e(__('fiches_tabs.edit')); ?></a>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/tabs/list-vigueur.blade.php ENDPATH**/ ?>