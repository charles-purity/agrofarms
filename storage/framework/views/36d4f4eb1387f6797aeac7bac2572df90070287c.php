<?php $__env->startSection('title',__('Reset Password')); ?>


<?php $__env->startSection('content'); ?>
<section class="login-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="login-box">
                    <?php if(session('status')): ?>
                      <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                          <?php echo e(trans(session('status'))); ?>

                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('password.update')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php $__errorArgs = ['token'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                                <?php echo e(trans($message)); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        <div class="row">
                            <input type="hidden" name="token" value="<?php echo e($token); ?>">
                            <input type="hidden" name="email" value="<?php echo e($email); ?>">

                            <div class="col-md-12">
                                <div class="box mb-4">
                                    <h4 class="golden-text"><?php echo app('translator')->get('New Password'); ?></h4>
                                    <div class="input-group">
                                        <div class="img">
                                            <img src="<?php echo e(asset($themeTrue.'img/icon/padlock.png')); ?>" alt="<?php echo app('translator')->get('password img'); ?>" />
                                        </div>
                                        <input
                                            type="password"
                                            name="password"
                                            class="form-control"
                                            placeholder="<?php echo app('translator')->get('New Password'); ?>"
                                        />
                                    </div>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger mt-1"><?php echo e(trans($message)); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="box mb-4">
                                    <h4 class="golden-text"><?php echo app('translator')->get('Confirm Password'); ?></h4>
                                    <div class="input-group">
                                        <div class="img">
                                            <img src="<?php echo e(asset($themeTrue.'img/icon/padlock.png')); ?>" alt="<?php echo app('translator')->get('password img'); ?>" />
                                        </div>
                                        <input
                                            type="password"
                                            name="password_confirmation"
                                            class="form-control"
                                            placeholder="<?php echo app('translator')->get('Confirm Password'); ?>"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button class="gold-btn-block" type="submit"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/auth/passwords/reset.blade.php ENDPATH**/ ?>