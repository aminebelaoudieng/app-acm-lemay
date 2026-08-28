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

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Initialiser la gestion des onglets avec les données de session
    if (typeof initTabManagement === 'function') {
        initTabManagement({
            activeTab: <?php echo json_encode(session('active_tab'), 15, 512) ?>,
            activeSubTab: <?php echo json_encode(session('active_sub_tab'), 15, 512) ?>
        });
    }
});
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GMAP_KEY')); ?>&libraries=places&language=fr"></script>
<script src="<?php echo e(asset('js/google-autocomplete.js')); ?>"></script>


<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="d-flex">
            <a class="btn btn-primary mr-3" href="<?php echo e(route('fiches.index')); ?>"><?php echo e(__('fiches_form.my_fiches')); ?></a>
            <h2 class="mb-0"><?php echo e($fiche->adresse); ?></h2>
        </div>
    </div>
</div>


<?php echo $__env->make('share.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true"><?php echo e(__('fiches_form.main_subject')); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="vigueur-tab" data-toggle="tab" href="#vigueur" role="tab" aria-controls="vigueur" aria-selected="false"><?php echo e(__('fiches_form.current_properties')); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="vendu-tab" data-toggle="tab" href="#vendu" role="tab" aria-controls="vendu" aria-selected="false"><?php echo e(__('fiches_form.sold_properties')); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="annexe-tab" data-toggle="tab" href="#annexe" role="tab" aria-controls="annexe" aria-selected="false"><?php echo e(__('fiches_form.annexes')); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-danger" id="delete-tab" data-toggle="tab" href="#delete" role="tab" aria-controls="delete" aria-selected="false"><?php echo e(__('fiches_form.delete')); ?></a>
    </li>
    <li class="nav-item ml-auto">
        <a class="nav-link " id="download-tab" target="_blank" href="<?php echo e(route('fiches.download',$fiche->id)); ?>"><?php echo e(__('fiches_form.download')); ?></a>
    </li>
</ul>
<div class="tab-content p-5" id="mainContent">
    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
        <?php echo Form::model($fiche, ['method' => 'PATCH', 'files' => true, 'route' => ['fiches.update', $fiche->id], 'class'=>'row', 'data-form-type' => 'master-form']); ?>



        <div class="col-xs-12 col-sm-12 col-md-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-adresse-tab" data-toggle="pill" href="#v-pills-adresse" role="tab" aria-controls="v-pills-adresse" aria-selected="false"><?php echo e(__('fiches_form.address')); ?></a>
                <!--                 <a class="nav-link" id="v-pills-categorie-tab" data-toggle="pill" href="#v-pills-categorie" role="tab" aria-controls="v-pills-categorie" aria-selected="false">Catégorie</a>
 -->
                <a class="nav-link " id="v-pills-info-tab" data-toggle="pill" href="#v-pills-info" role="tab" aria-controls="v-pills-info" aria-selected="true"><?php echo e(__('fiches_form.dates_purpose')); ?></a>
                <a class="nav-link" id="v-pills-caracteristiques-tab" data-toggle="pill" href="#v-pills-caracteristiques" role="tab" aria-controls="v-pills-caracteristiques" aria-selected="false"><?php echo e(__('fiches_form.features')); ?></a>
                <a class="nav-link" id="v-pills-evaluations-tab" data-toggle="pill" href="#v-pills-evaluations" role="tab" aria-controls="v-pills-evaluations" aria-selected="false"><?php echo e(__('fiches_form.evaluations')); ?></a>
                <a class="nav-link" id="v-pills-prixsuggerer-tab" data-toggle="pill" href="#v-pills-prixsuggerer" role="tab" aria-controls="v-pills-prixsuggerer" aria-selected="false"><?php echo e(__('fiches_form.suggested_price')); ?></a>
                <a class="nav-link" id="v-pills-moyenne-tab" data-toggle="pill" href="#v-pills-moyenne" role="tab" aria-controls="v-pills-moyenne" aria-selected="false"><?php echo e(__('fiches_form.average_sold_price')); ?></a>
                <a class="nav-link" id="v-pills-faitsaillant-tab" data-toggle="pill" href="#v-pills-faitsaillant" role="tab" aria-controls="v-pills-faitsaillant" aria-selected="false"><?php echo e(__('fiches_form.highlights')); ?></a>

                <a class="nav-link" id="v-pills-intro-tab" data-toggle="pill" href="#v-pills-intro" role="tab" aria-controls="v-pills-intro" aria-selected="false"><?php echo e(__('fiches_form.introduction')); ?></a>
                <a class="nav-link" id="v-pills-note-tab" data-toggle="pill" href="#v-pills-note" role="tab" aria-controls="v-pills-note" aria-selected="false"><?php echo e(__('fiches_form.notes')); ?></a>
                <a class="nav-link" id="v-pills-configs-tab" data-toggle="pill" href="#v-pills-configs" role="tab" aria-controls="v-pills-configs" aria-selected="false"><?php echo e(__('fiches_form.additional_settings')); ?></a>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-10">
            <?php echo $__env->make('share.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-adresse" role="tabpanel" aria-labelledby="v-pills-adresse-tab">
                    <?php echo $__env->make('users.fiches.sub-tabs.adresse',['fiche'=>$fiche], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <!-- 
                <div class="tab-pane fade" id="v-pills-categorie" role="tabpanel" aria-labelledby="v-pills-categorie-tab">
                    <?php echo $__env->make('users.fiches.sub-tabs.categorie',['fiche'=>$fiche], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div> -->
                <div class="tab-pane fade" id="v-pills-info" role="tabpanel" aria-labelledby="v-pills-info-tab">
                    <?php echo $__env->make('users.fiches.sub-tabs.info-master',['fiche'=>$fiche], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="v-pills-evaluations" role="tabpanel" aria-labelledby="v-pills-evaluations-tab">
                    <?php echo $__env->make('users.fiches.sub-tabs.evaluations',['fiche'=>$fiche], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="v-pills-caracteristiques" role="tabpanel" aria-labelledby="v-pills-caracteristiques-tab">
                    <?php echo $__env->make('users.fiches.sub-tabs.caracteristiques',['fiche'=>$fiche], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="v-pills-prixsuggerer" role="tabpanel" aria-labelledby="v-pills-prixsuggerer-tab">
                    <?php echo $__env->make('users.fiches.sub-tabs.prix-suggerer',['fiche'=>$fiche], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="v-pills-moyenne" role="tabpanel" aria-labelledby="v-pills-moyenne-tab">
                    <?php echo $__env->make('users.fiches.sub-tabs.prix-moyenne',['fiche'=>$fiche], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="v-pills-faitsaillant" role="tabpanel" aria-labelledby="v-pills-faitsaillant-tab">
                    <?php echo $__env->make('users.fiches.sub-tabs.fait-saillant',['fiche'=>$fiche], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="v-pills-configs" role="tabpanel" aria-labelledby="v-pills-configs-tab">
                    <?php echo $__env->make('users.fiches.sub-tabs.configs',['fiche'=>$fiche], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>



                <div class="tab-pane fade" id="v-pills-intro" role="tabpanel" aria-labelledby="v-pills-intro-tab">
                    <?php echo $__env->make('users.fiches.sub-tabs.intro',['fiche'=>$fiche], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="v-pills-note" role="tabpanel" aria-labelledby="v-pills-note-tab">
                    <?php echo $__env->make('users.fiches.sub-tabs.note',['fiche'=>$fiche], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
    <div class="tab-pane fade" id="vigueur" role="tabpanel" aria-labelledby="vigueur-tab">
        <?php echo $__env->make('users.fiches.tabs.list-vigueur',['fiches'=>$fichesVigueur], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="tab-pane fade" id="vendu" role="tabpanel" aria-labelledby="vendu-tab">
        <?php echo $__env->make('users.fiches.tabs.list-vendu',['fiches'=>$fichesVendu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="tab-pane fade" id="annexe" role="tabpanel" aria-labelledby="annexe-tab">
        <?php echo $__env->make('users.fiches.tabs.list-annexe',['annexes'=>$annexes], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="tab-pane fade" id="delete" role="tabpanel" aria-labelledby="delete-tab">
        <?php echo $__env->make('users.fiches.tabs.delete',['fiche'=>$fiche], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/edit.blade.php ENDPATH**/ ?>