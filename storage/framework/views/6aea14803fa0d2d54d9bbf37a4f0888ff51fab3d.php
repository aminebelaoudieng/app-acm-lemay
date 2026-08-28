<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong><?php echo e(__('profile.image_header')); ?></strong>
        <p class="mt-3 d-inline-block"><?php echo e(__('profile.image_header_size')); ?></p>
        
        <!-- Input file personnalisé -->
        <div class="custom-file-wrapper">
            <input type="file" id="image_header" name="image_header" class="custom-file-input" accept="image/*" style="display: none;">
            <button type="button" class="btn btn-outline-secondary btn-file" onclick="document.getElementById('image_header').click();">
                <i class="fas fa-upload mr-2"></i><?php echo e(__('profile.choose_file')); ?>

            </button>
            <span class="file-name ml-3" id="image_header_filename"><?php echo e(__('profile.no_file_selected')); ?></span>
        </div>
        
        <script>
            document.getElementById('image_header').addEventListener('change', function(e) {
                const fileName = e.target.files[0] ? e.target.files[0].name : '<?php echo e(__("profile.no_file_selected")); ?>';
                document.getElementById('image_header_filename').textContent = fileName;
            });
        </script>
        <?php if(isset($user) && $user->image_header): ?>
        <img src="<?php echo e((isset($user->image_header))? asset('uploads/users/images/header/'.$user->image_header):''); ?>" width="200" />
        <a href="#" class="delete-img-btn" id="image_header"><?php echo e(__('profile.delete_image')); ?></a>
        <?php echo Form::hidden('image_header_old', (isset($user->image_header))? $user->image_header:'', array('id'=>'image_header_old','class' => 'form-control')); ?>

        <?php endif; ?>
    </div>
</div><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/profile/plugins/image_header.blade.php ENDPATH**/ ?>