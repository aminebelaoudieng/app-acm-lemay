<?php $__env->startPush('footer-scripts'); ?>
<script type="text/javascript">
    var gmap_key = "<?php echo e(env('GMAP_KEY')); ?>";
    var map_lat = null;
    var map_lng = null;
    var map_zoom = null;
    var street_lat = null;
    var street_lng = null;
    var street_heading = null;
    var street_pitch = null;
    var street_zoom = null;
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GMAP_KEY')); ?>&libraries=places&language=fr"></script>
<script src="<?php echo e(asset('js/google-autocomplete.js')); ?>"></script>

<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
<div class="row mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="d-flex">
            <a class="btn btn-primary mr-3" href="<?php echo e(route('fiches.edit',$ficheMaster->id).'#vendu'); ?>"><?php echo e(__('profile.back')); ?></a>
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
        <a class="nav-link " href="<?php echo e(route('fiches.edit',$ficheMaster->id)); ?>#vigueur"><?php echo e(__('fiches_form.current_properties')); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" id="vendu-tab" href="<?php echo e(route('fiches.edit',$ficheMaster->id)); ?>#vendu"><?php echo e(__('fiches_form.sold_properties')); ?></a>
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
        <?php echo Form::model($ficheMaster, ['method' => 'POST', 'files' => true, 'route' => ['fiches.vendu.store',$ficheMaster->id],'class'=>'row']); ?>


        <div class="col-xs-12 col-sm-12 col-md-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-adresse-tab" data-toggle="pill" href="#v-pills-adresse" role="tab" aria-controls="v-pills-adresse" aria-selected="false"><?php echo e(__('fiches_subtabs.address')); ?></a>
                <a class="nav-link" id="v-pills-prixdate-tab" data-toggle="pill" href="#v-pills-prixdate" role="tab" aria-controls="v-pills-prixdate" aria-selected="false"><?php echo e(__('fiches_subtabs.price_and_date')); ?></a>
                <a class="nav-link" id="v-pills-caracteristiques-tab" data-toggle="pill" href="#v-pills-caracteristiques" role="tab" aria-controls="v-pills-caracteristiques" aria-selected="false"><?php echo e(__('fiches_subtabs.characteristics')); ?></a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10">
            <div class="tab-content" id="v-pills-tabContent">
                <?php echo $__env->make('share.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <h2><?php echo e(__('fiches_form.new_sold_property')); ?></h2>
                <div class="tab-pane fade show active" id="v-pills-adresse" role="tabpanel" aria-labelledby="v-pills-adresse-tab">
                    <?php echo $__env->make('users.fiches.sub-tabs.adresse',['fiche'=>null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="v-pills-prixdate" role="tabpanel" aria-labelledby="v-pills-prixdate-tab">
                    <?php echo $__env->make('users.fiches.sub-tabs.prix-date-vendu',['fiche'=>null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="v-pills-caracteristiques" role="tabpanel" aria-labelledby="v-pills-caracteristiques-tab">
                    <?php echo $__env->make('users.fiches.sub-tabs.caracteristiques',['fiche'=>null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>


</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/vendu/create.blade.php ENDPATH**/ ?>