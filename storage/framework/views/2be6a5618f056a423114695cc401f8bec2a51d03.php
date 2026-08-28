<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-success">Sauvegarder</button>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Image entête</strong>
            <p>Vous pouvez ajouter une image qui sera affichée et centrée sur la page couverture.</p>
            <?php if($fiche->imageHeaderSrc): ?>
            <img class="image-header" src="<?php echo e($fiche->imageHeaderSrc); ?>" width="500" />
            <br/><br/>
            <?php endif; ?>
            <?php echo Form::file('image_header', array('class' => 'form-control','id'=>'image_header')); ?>

        </div>

    </div>
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/sub-tabs/img-header.blade.php ENDPATH**/ ?>