

<?php $__env->startPush('footer-scripts'); ?>
<script type="text/javascript">
    var userColor = "<?php echo e($user->color); ?>";
</script>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-tb mb-5">
        <div class="pull-left">

            <a class="btn btn-outline-secondary" href="<?php echo e(route('user.dashboard')); ?>"><?php echo e(__('profile.back')); ?></a>
        </div>
    </div>
</div>

<?php if($message = Session::get('success')): ?>
<div class="alert alert-success">
    <p><?php echo e($message); ?></p>
</div>
<?php endif; ?>

<?php if(count($errors) > 0): ?>
<div class="alert alert-danger">
    <strong><?php echo e(__('profile.whoops')); ?></strong> <?php echo e(__('profile.problems_input')); ?><br><br>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<?php echo Form::model($user, ['files' => true, 'method' => 'PATCH','route' => ['profile.update', $user->id]]); ?>

<div class="row">
    <?php if(!$user->is_admin): ?> <div class="col-md-6 col-12 no-gutters"> <?php endif; ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><?php echo e(__('profile.email')); ?></strong>
                <?php echo Form::text('email', null, array('placeholder' => __('profile.email_placeholder'),'class' => 'form-control')); ?>

            </div>
        </div>

        <?php if(!$user->is_admin): ?>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><?php echo e(__('profile.telephone')); ?></strong>
                <?php echo Form::text('telephone', null, array('placeholder' => __('profile.telephone_placeholder'),'class' => 'tel form-control')); ?>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><?php echo e(__('profile.adresse')); ?></strong>
                <?php echo Form::text('adresse', null, array('placeholder' => __('profile.adresse_placeholder'),'class' => 'form-control')); ?>

            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><?php echo e(__('profile.ville')); ?></strong>
                <?php echo Form::text('ville', (isset($user->ville))? $user->ville:'', array('placeholder' => __('profile.ville_placeholder'),'class' => 'form-control','id'=>'locality')); ?>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><?php echo e(__('profile.province')); ?></strong>
                <?php echo Form::text('province', (isset($user->province))? $user->province:'', array('placeholder' => __('profile.province_placeholder'),'class' => 'form-control','id'=>'administrative_area_level_1')); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><?php echo e(__('profile.code_postal')); ?></strong>
                <?php echo Form::text('code_postal', (isset($user->code_postal))? $user->code_postal:'', array('placeholder' => __('profile.code_postal_placeholder'),'class' => 'form-control','id'=>'postal_code')); ?>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><?php echo e(__('profile.siteweb')); ?></strong>
                <?php echo Form::text('siteweb', null, array('placeholder' => __('profile.siteweb_placeholder'),'class' => 'form-control')); ?>

            </div>
        </div>
        <?php if(app()->getLocale() == 'fr'): ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><?php echo e(__('profile.poste')); ?></strong>
                <?php echo Form::text('poste', null, array('placeholder' => __('profile.poste_placeholder'),'class' => 'form-control')); ?>

            </div>
        </div>
        <?php else: ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><?php echo e(__('profile.poste')); ?></strong>
                <?php echo Form::text('poste_en', null, array('placeholder' => __('profile.poste_placeholder'),'class' => 'form-control')); ?>

            </div>
        </div>
        <?php endif; ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><?php echo e(__('profile.compagnie')); ?></strong>
                <?php echo Form::text('compagnie', null, array('placeholder' => __('profile.compagnie_placeholder'),'class' => 'form-control')); ?>

            </div>
        </div>
        <?php echo $__env->make('profile.plugins.image_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('profile.plugins.logo_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('profile.plugins.logo_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><?php echo e(__('profile.color')); ?></strong>
                <?php echo Form::text('color', null, array('placeholder' => __('profile.color_placeholder'),'class' => 'form-control','id' => 'color-picker')); ?>


            </div>
        </div>

        <?php if(app()->getLocale() == 'fr'): ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><?php echo e(__('profile.slogan')); ?></strong>
                <?php echo Form::text('slogan', null, array('placeholder' => __('profile.slogan_placeholder'),'class' => 'form-control')); ?>

            </div>
        </div>
        <?php else: ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><?php echo e(__('profile.slogan')); ?></strong>
                <?php echo Form::text('slogan_en', null, array('placeholder' => __('profile.slogan_placeholder'),'class' => 'form-control')); ?>

            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-md-6 col-12 mt-4 no-gutters">
        <?php echo $__env->make('profile.plugins.photo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php endif; ?>

    <?php if(!$user->is_admin): ?>
</div> <?php endif; ?>
<div class="col-xs-12 col-sm-12 col-md-12 mt-4">
    <div class="form-group">
        <p><?php echo e(__('profile.password_info')); ?></p>
        <strong><?php echo e(__('profile.current_password')); ?></strong>
        <?php echo Form::password('current_password', array('placeholder' => __('profile.current_password_placeholder'),'class' => 'form-control')); ?>

    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong><?php echo e(__('profile.new_password')); ?></strong>
        <?php echo Form::password('password', array('placeholder' => __('profile.new_password_placeholder'),'class' => 'form-control')); ?>

    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong><?php echo e(__('profile.confirm_password')); ?></strong>
        <?php echo Form::password('confirm-password', array('placeholder' => __('profile.confirm_password_placeholder'),'class' => 'form-control')); ?>

    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-success"><?php echo e(__('profile.save')); ?></button>
</div>
</>
<?php echo Form::close(); ?>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/profile/index.blade.php ENDPATH**/ ?>