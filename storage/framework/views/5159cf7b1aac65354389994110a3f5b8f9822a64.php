

<?php $__env->startSection('content'); ?>
<div class="login-container">
    <div class="login-wrapper">
        <!-- Sélecteur de langue -->
        <div class="language-selector">
            <form id="lang-form" action="" method="get">
                <select class="form-control form-control-sm" onchange="window.location.href='/lang/' + this.value;">
                    <option value="fr" <?php echo e(app()->getLocale() == 'fr' ? 'selected' : ''); ?>>Français</option>
                    <option value="en" <?php echo e(app()->getLocale() == 'en' ? 'selected' : ''); ?>>English</option>
                </select>
            </form>
        </div>
        
        <!-- Header avec logo et branding -->
        <div class="login-header">
            <div class="login-logo">
                <img src="<?php echo e(asset('images/optimo.png')); ?>" alt="Optimo Logo" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMzAiIGZpbGw9IiMzNDkwZGMiLz4KPHRleHQgeD0iMzAiIHk9IjM1IiBmb250LWZhbWlseT0iQXJpYWwiIGZvbnQtc2l6ZT0iMjAiIGZvbnQtd2VpZ2h0PSJib2xkIiBmaWxsPSJ3aGl0ZSIgdGV4dC1hbmNob3I9Im1pZGRsZSI+QUNNPC90ZXh0Pgo8L3N2Zz4K'">
            </div>
            <h1 class="brand-title"><?php echo e(__('login.comparable_sheets')); ?></h1>
            <p class="brand-subtitle">A.C.M. - <?php echo e(__('login.market_analysis')); ?></p>
        </div>

        <!-- Corps du formulaire -->
        <div class="login-body">
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="email" class="form-label"><?php echo e(__('login.email')); ?></label>
                    <input id="email" type="email" class="login-form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="<?php echo e(__('login.email_placeholder')); ?>">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label"><?php echo e(__('login.password')); ?></label>
                    <input id="password" type="password" class="login-form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="<?php echo e(__('login.password_placeholder')); ?>">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="remember">
                        <?php echo e(__('login.remember')); ?>

                    </label>
                </div>

                <button type="submit" class="login-btn">
                    <?php echo e(__('login.login')); ?>

                </button>

                <?php if(Route::has('password.request')): ?>
                <div class="forgot-password">
                    <a href="<?php echo e(route('password.request')); ?>">
                        <?php echo e(__('login.forgot')); ?>

                    </a>
                </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lemaycon/app.lemayconsulting.com/resources/views/auth/login.blade.php ENDPATH**/ ?>