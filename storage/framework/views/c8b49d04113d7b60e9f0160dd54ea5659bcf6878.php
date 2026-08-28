<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left text-right">
            <a class="btn btn-success" href="<?php echo e(route('fiches.vendu.create',$fiche->id)); ?>"><?php echo e(__('fiches_tabs.add')); ?></a>
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
            <a class="btn btn-info" href="<?php echo e(route('fiches.vendu.edit',array($fiche->id,$subfiche->id))); ?>"><?php echo e(__('fiches_tabs.edit')); ?></a>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/tabs/list-vendu.blade.php ENDPATH**/ ?>