

<?php $__env->startSection('content'); ?>

<style>
    html,
    body {
        font-size: 12px;
        font-family: "lato";
    }
    .background-dots{
        height:1150px;
        width:125%;
        position: absolute;
        left: -120px;
        right: -120px;
        top: -140px;
        bottom: -100px;
        padding:80px;
        z-index:-1;
    }
    .background-dots img{
        height:1150px;
        width:125%;
    }
    * {
        vertical-align: top;
    }
 
    .page {
        padding:20px;
        margin: auto;
    }

    .page-break {
        page-break-after: always;
    }

    .clearfix {
        width: 100%;
        display: block;
        clear: both;
    }

    table {
        font-size: 90%;
    }

    .line {
        width: 100%;
        height: 1px;
        margin: auto;
        background-color: <?php echo e($user->color); ?>;
        margin: 20px auto;
        clear: both;
    }     
    
    .title-with-style:before,
    .title-with-style:after{
        content: "+";
        display:inline;
        color: <?php echo e($user->color); ?>;;
    }
  
    .border-bottom{
        border-bottom:1px solid <?php echo e($user->color); ?>;
    }
    .bg-color {
        background-color: <?php echo e($user->color); ?>;
        color: white;
        padding: 5px 10px;
    }

    .txt-color {
        color:<?php echo e($user->color); ?>;
    }
    .txt-white {
        color: #fff;
    }
    .txt-grey{
        color:#ccc;
    }
    .txt-center {
        text-align:center;
    }
    .upper{
        text-transform:uppercase;
    }
    .line-color {
        background-color:<?php echo e($user->color); ?>;
    }
    h1.page-title{
        text-align: center;
        margin-bottom: 40px;
        font-size:27px;
        font-family: "lato";
        font-weight:normal;
        letter-spacing:5px;
    }
    .table-title {
        font-family: "lato-bold-italic";
        text-transform:uppercase;
        display: block;
        font-size: 15px;
        margin-bottom: 0px;
        padding-bottom:10px;
        border-bottom:1px solid <?php echo e($user->color); ?>;
    }
    .table-title.no-border{
        border-bottom:0px;
    }
    .table-title.no-padding {
        padding-left: 0px;
    }

    .table-title.full-width {
        width: auto;
        font-family: "opensans-light";
        font-size: 16px;
    }

    .table-title.center {
        margin-bottom: -25px;
    }

    .bg-grey {
        padding-top: 20px;
        margin-bottom: 20px;
        font-size: 15px;
    }  
    .bg-grey td{
        border-bottom:1px solid #ccc!important;
        padding:5px 0px;
    }
    .bg-grey tr:last-child td{
        border-bottom:0px !important;
    }
    .bg-grey td.valeur{
        text-align:center;
    }
    .mt{
        margin-top:40px;
    }
    .tr-top {
        position: relative;
        z-index: 10;
    }

    .label {
        width: 80% !important;
    }

    .section-intro {
        font-family: "opensans-light";
        font-size: 25px;
        padding: 20px;
        padding-bottom: 25px;
        margin-left: -50px;
        padding-left: 70px;
        width: 80%;
        margin-top: 400px !important;
    }
 
</style>

<?php echo $__env->make('users.fiches.pdf.pages.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('users.fiches.pdf.pages.break', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('users.fiches.pdf.pages.resume-sujet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('users.fiches.pdf.pages.break', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('users.fiches.pdf.pages.courtier', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('users.fiches.pdf.pages.break', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php
$fiche=$ficheMaster;
?>


<?php echo $__env->make('users.fiches.pdf.pages-'.$ficheMaster->template_folder.'.sujet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('users.fiches.pdf.pages.break', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if($ficheMaster->fichesVendu()->exists()): ?>

<?php echo $__env->make('users.fiches.pdf.pages-'.$ficheMaster->template_folder.'.list-vendu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('users.fiches.pdf.pages.break', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php
$nb=1;
?>


<?php $__currentLoopData = $ficheMaster->fichesVendu()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo $__env->make('users.fiches.pdf.pages-'.$ficheMaster->template_folder.'.vendu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('users.fiches.pdf.pages.break', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
$nb++;
?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo $__env->make('users.fiches.pdf.pages-'.$ficheMaster->template_folder.'.resume-vendu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('users.fiches.pdf.pages.break', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php endif; ?>


<?php if(!$ficheMaster->ne_pas_afficher_les_vigueurs): ?>
  <?php if($ficheMaster->fichesVigueur()->exists()): ?>
    <?php echo $__env->make('users.fiches.pdf.pages-'.$ficheMaster->template_folder.'.intro-vigueur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('users.fiches.pdf.pages.break', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php
$nb=1;
?>

<?php $__currentLoopData = $ficheMaster->fichesVigueur()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiche): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo $__env->make('users.fiches.pdf.pages-'.$ficheMaster->template_folder.'.vigueur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('users.fiches.pdf.pages.break', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
$nb++;
?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo $__env->make('users.fiches.pdf.pages-'.$ficheMaster->template_folder.'.list-vigueur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('users.fiches.pdf.pages.break', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('users.fiches.pdf.pages-'.$ficheMaster->template_folder.'.resume-vigueur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('users.fiches.pdf.pages.break', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>
<?php endif; ?>


<?php if(!$ficheMaster->fichesVigueur()->exists()): ?>
    <?php echo $__env->make('users.fiches.pdf.pages.resume-general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('users.fiches.pdf.pages.break', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>


<?php echo $__env->make('users.fiches.pdf.pages.note', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('users.fiches.pdf.pages.break', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('users.fiches.pdf.pages.intro-annexe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/users/fiches/pdf/index.blade.php ENDPATH**/ ?>