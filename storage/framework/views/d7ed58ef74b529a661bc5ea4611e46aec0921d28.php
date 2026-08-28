

<?php $__env->startSection('content'); ?>
<div class="row align-items-center mb-3">
    <!-- Titre -->
    <div class="col-md-4">
        <h2><?php echo e(__('fiches.your_fiches')); ?></h2>
    </div>
    
    <!-- Barre de recherche -->
    <div class="col-md-4 text-center">
        <form action="<?php echo e(route('user.dashboard')); ?>" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="<?php echo e(__('fiches.search_placeholder')); ?>" value="<?php echo e(request('search')); ?>">
            <button type="submit" class="btn ms-2">
                <img src="<?php echo e(asset('images/search.svg')); ?>" alt="Rechercher" style="width: 30px; height: 30px;margin-top:-8px;">
            </button>
        </form>
    </div>
    
    <!-- Boutons align avec gap -->
    
    <div class="col-md-4 d-flex justify-content-end">
    <a class="btn btn-success" href="<?php echo e(route('user.dashboard')); ?>"><?php echo e(__('fiches.see_all')); ?></a>
    <div style="width: 10px;"></div>
    <a class="btn btn-success" href="<?php echo e(route('fiches.create')); ?>"><?php echo e(__('fiches.add')); ?></a>
</div>
    
</div>

<?php echo $__env->make('share.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__currentLoopData = $fiches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row no-gutters list-proprietes mb-2">
    <div class="col-2">
        <img id="imgStreet" class="googleImg" style="max-width:150px" src="<?php echo e($fiche->streetView ?? ''); ?>">
    </div>
    <div class="col-8 d-flex align-items-center titre"><?php echo e($fiche->adresse); ?></div>
    <div class="col-2 d-flex align-items-center justify-content-center">
        <a class="btn btn-info" href="<?php echo e(route('fiches.edit',$fiche->id)); ?>"><?php echo e(__('fiches.edit')); ?></a>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/index.blade.php ENDPATH**/ ?>