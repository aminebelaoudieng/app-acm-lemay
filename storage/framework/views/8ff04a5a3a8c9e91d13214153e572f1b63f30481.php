<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left text-right">
            <a class="btn btn-success" href="<?php echo e(route('fiches.annexe.create',$fiche->id)); ?>"><?php echo e(__('fiches_tabs.add')); ?></a>
        </div>
    </div>
</div>

<div class="pt-2">

    <?php $__currentLoopData = $annexes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $annexe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row no-gutters list-proprietes py-3 pl-3">
        <div class="col-10 d-flex align-items-center titre"><?php echo e($annexe->name); ?></div>
        <div class="col-2 d-flex align-items-center justify-content-center">
            <a class="btn btn-info" href="<?php echo e(route('fiches.annexe.edit',array($fiche->id,$annexe->id))); ?>"><?php echo e(__('fiches_tabs.edit')); ?></a>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/tabs/list-annexe.blade.php ENDPATH**/ ?>