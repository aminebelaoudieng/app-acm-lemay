<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success"><?php echo e(__('fiches_subtabs.save')); ?></button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong><?php echo e(__('fiches_subtabs.category')); ?></strong>
            <?php echo Form::select('categorie',Arr::pluck(Config::get('datas.categories'), 'name', 'key'), null , ['class' => 'form-control']); ?>

        </div>
    </div>



</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/sub-tabs/categorie.blade.php ENDPATH**/ ?>