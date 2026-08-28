<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Gestion des utilisateurs</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-success" href="<?php echo e(route('users.create')); ?>"> Ajouter</a>
    </div>
  </div>
</div>


<?php if($message = Session::get('success')): ?>
<div class="alert alert-success">
  <p><?php echo e($message); ?></p>
</div>
<?php endif; ?>


<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Admin</th>
    <th width="280px">Action</th>
  </tr>
  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
    <td><?php echo e(++$i); ?></td>
    <td><?php echo e($user->name); ?></td>
    <td><?php echo e($user->email); ?></td>
    <td><?php echo e($user->is_admin); ?></td>
    <td>
      <a class="btn btn-primary" href="<?php echo e(route('users.edit',$user->id)); ?>">Modifier</a>
      <?php if(Auth::user()->id != $user->id): ?>
      <a class="btn btn-danger" href="<?php echo e(route('users.show',$user->id)); ?>">Supprimer</a>
      <?php endif; ?>
    </td>
  </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>


<?php echo $data->render(); ?>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/admin/users/index.blade.php ENDPATH**/ ?>