<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Modifier New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('users.index')); ?>"> Retour</a>
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
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>


<?php echo Form::model($user, [ 'files' => true,'method' => 'PATCH','route' => ['users.update', $user->id]]); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Prénom et nom:</strong>
            <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            <?php echo Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')); ?>

        </div>
    </div>

    <?php echo $__env->make('profile.plugins.photo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Téléphone:</strong>
            <?php echo Form::text('telephone', null, array('placeholder' => 'Téléphone','class' => 'form-control')); ?>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Adresse:</strong>
            <?php echo Form::text('adresse', null, array('placeholder' => 'Adresse','class' => 'form-control')); ?>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ville:</strong>
            <?php echo Form::text('ville', null, array('placeholder' => 'Ville','class' => 'form-control')); ?>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Province:</strong>
            <?php echo Form::text('province', null, array('placeholder' => 'province','class' => 'form-control')); ?>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Code Postal:</strong>
            <?php echo Form::text('code_postal', null, array('placeholder' => 'Code Postal','class' => 'form-control')); ?>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Site web:</strong>
            <?php echo Form::text('siteweb', null, array('placeholder' => 'Site web','class' => 'form-control')); ?>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Poste:</strong>
            <?php echo Form::text('poste', null, array('placeholder' => 'Poste','class' => 'form-control')); ?>

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Compagnie:</strong>
            <?php echo Form::text('compagnie', null, array('placeholder' => 'Compagnie','class' => 'form-control')); ?>

        </div>
    </div>
    <?php echo $__env->make('profile.plugins.image_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('profile.plugins.logo_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('profile.plugins.logo_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Couleur:</strong>
            <?php echo Form::text('color', null, array('placeholder' => 'Couleur','class' => 'form-control','id' => 'color-picker')); ?>


        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Design sans plus:</strong>
            <?php echo Form::checkbox('design_sans_plus', 1 , $user->design_sans_plus ); ?>

        </div>
    </div>

    <!-- 
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Logo:</strong>
            <?php echo Form::text('logo', null, array('placeholder' => 'logo','class' => 'form-control')); ?>

        </div>
    </div> -->

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Slogan:</strong>
            <?php echo Form::text('slogan', null, array('placeholder' => 'slogan','class' => 'form-control')); ?>

        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            <?php echo Form::password('password', array('placeholder' => 'Password','class' => 'form-control')); ?>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            <?php echo Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')); ?>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Compte administrateur:</strong>
            <?php echo Form::checkbox('is_admin', 1 , $user->is_admin ); ?>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
<?php echo Form::close(); ?>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/admin/users/edit.blade.php ENDPATH**/ ?>