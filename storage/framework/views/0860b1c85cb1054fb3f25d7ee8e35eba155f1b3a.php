<?php $__env->startPush('footer-scripts'); ?>
<script type="text/javascript">
    var gmap_key = "<?php echo e(env('GMAP_KEY')); ?>";
    /* beautify preserve:start */
    var map_lat = <?php echo e($fiche->map_lat); ?>;
    var map_lng = <?php echo e($fiche->map_lng); ?>;
    var map_zoom = <?php echo e($fiche->map_zoom); ?>;
    var street_lat = <?php echo e($fiche->street_lat); ?>;
    var street_lng = <?php echo e($fiche->street_lng); ?>;
    var street_heading = <?php echo e($fiche->street_heading); ?>;
    var street_pitch = <?php echo e($fiche->street_pitch); ?>;
    var street_zoom = <?php echo e($fiche->street_zoom); ?>;
    /* beautify preserve:end */
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GMAP_KEY')); ?>&libraries=places&language=fr"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="d-flex">
            <a class="btn btn-primary mr-3" href="<?php echo e(route('fiches.edit',$ficheMaster->id).'#vigueur'); ?>"><?php echo e(__('profile.back')); ?></a>
            <h2 class="mb-0"><?php echo e($ficheMaster->adresse); ?></h2>
        </div>
    </div>
</div>

<?php echo $__env->make('share.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link" id="home-tab" href="<?php echo e(route('fiches.edit',$ficheMaster->id)); ?>"><?php echo e(__('fiches_form.main_subject')); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="<?php echo e(route('fiches.edit',$ficheMaster->id)); ?>#vigueur"><?php echo e(__('fiches_form.current_properties')); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link " id="vendu-tab" href="<?php echo e(route('fiches.edit',$ficheMaster->id)); ?>#vendu"><?php echo e(__('fiches_form.sold_properties')); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="annexe-tab" href="<?php echo e(route('fiches.edit',$ficheMaster->id)); ?>#annexe"><?php echo e(__('fiches_form.annexes')); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-danger" id="delete-tab" href="<?php echo e(route('fiches.edit',$ficheMaster->id)); ?>#delete"><?php echo e(__('fiches_form.delete')); ?></a>
    </li>
</ul>
<div class="tab-content p-5" id="mainContent">

    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
        <?php echo Form::model($fiche, ['method' => 'PATCH', 'files' => true, 'route' => ['fiches.vigueur.update',$ficheMaster->id, $fiche->id]]); ?>

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-adresse-tab" data-toggle="pill" href="#v-pills-adresse" role="tab" aria-controls="v-pills-adresse" aria-selected="false">Adresse</a>
                    <a class="nav-link" id="v-pills-prixdate-tab" data-toggle="pill" href="#v-pills-prixdate" role="tab" aria-controls="v-pills-prixdate" aria-selected="false">Prix et date</a>
                    <a class="nav-link" id="v-pills-caracteristiques-tab" data-toggle="pill" href="#v-pills-caracteristiques" role="tab" aria-controls="v-pills-caracteristiques" aria-selected="false">Caractéristiques</a>
                    <a class="nav-link text-danger" id="v-pills-delete-tab" data-toggle="pill" href="#v-pills-delete" role="tab" aria-controls="v-pills-delete" aria-selected="false">Supprimer</a>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <?php echo $__env->make('share.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <h2>Modifier une propriété en vigueur</h2>
                    <div class="tab-pane fade show active" id="v-pills-adresse" role="tabpanel" aria-labelledby="v-pills-adresse-tab">
                        <?php echo $__env->make('users.fiches.sub-tabs.adresse',['fiche'=>$fiche], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane fade" id="v-pills-prixdate" role="tabpanel" aria-labelledby="v-pills-prixdate-tab">
                        <?php echo $__env->make('users.fiches.sub-tabs.prix-date-vigueur',['fiche'=>$fiche], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane fade" id="v-pills-caracteristiques" role="tabpanel" aria-labelledby="v-pills-caracteristiques-tab">
                        <?php echo $__env->make('users.fiches.sub-tabs.caracteristiques',['fiche'=>$fiche], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php echo Form::close(); ?>

                    <div class="tab-pane fade" id="v-pills-delete" role="tabpanel" aria-labelledby="v-pills-delete-tab">
                        <?php echo $__env->make('users.fiches.vigueur.delete',['fiche'=>$fiche], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>


</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/vigueur/edit.blade.php ENDPATH**/ ?>