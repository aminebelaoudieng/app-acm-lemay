<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Supprimer l'utilisateur</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('users.index')); ?>"> Retour</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom :</strong>
            <?php echo e($user->name); ?>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Courriel:</strong>
            <?php echo e($user->email); ?>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h4>Êtes vous sur de vouloir supprimer cet utilisateur ainsi que toutes ses fiches ? </h4>
            <h5>Cette action est irréversible.</h5>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 ">
        <?php if(Auth::user()->id != $user->id): ?>
        <?php echo Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']); ?>

        <?php echo Form::submit('Oui, supprimer', ['class' => 'btn btn-danger']); ?>

        <?php echo Form::close(); ?>

        <?php endif; ?>
    </div>



</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/admin/users/delete.blade.php ENDPATH**/ ?>