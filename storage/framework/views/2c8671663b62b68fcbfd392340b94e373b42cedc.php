<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <h1><?php echo e(__('fiches_delete.warning_title')); ?></h1>
            <p><?php echo e(__('fiches_delete.warning_text')); ?></p>
            <p><b><?php echo e(__('fiches_delete.irreversible')); ?></b></p>
            <?php echo Form::open(['method' => 'DELETE','route' => ['fiches.vendu.delete',$ficheMaster->id, $fiche->id],'style'=>'display:inline']); ?>

            <?php echo Form::submit(__('fiches_delete.confirm_button'), ['class' => 'btn btn-danger']); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/vendu/delete.blade.php ENDPATH**/ ?>