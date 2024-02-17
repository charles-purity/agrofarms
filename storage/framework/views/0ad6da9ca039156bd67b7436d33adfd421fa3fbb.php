<?php $__env->startSection('title',$page_title); ?>

<?php $__env->startSection('content'); ?>
    <!-- email_verification_start -->
    <section class="login-section">
        <div class="container h-100">
            <div class="row h-100 justify-content-center">
                <div class="col-lg-6">
                    <div class="form-wrapper d-flex align-items-center h-100">
                        <form action="<?php echo e(route('user.mailVerify')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row g-4">
                                <div class="col-12">
                                    <h4><?php echo app('translator')->get('Enter Your Verification Code'); ?></h4>
                                </div>
                                <div class="input-box col-12">
                                    <input type="text"
                                           name="code"
                                           class="form-control"
                                           value="<?php echo e(old('code')); ?>"
                                           placeholder="<?php echo app('translator')->get('Enter Your Email Verification Code'); ?>"
                                           autocomplete="off" />
                                    <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger mt-1"><?php echo e(trans($message)); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php $__errorArgs = ['error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger mt-1"><?php echo e(trans($message)); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="input-box col-12">
                                    <button class="btn-custom" type="submit"><?php echo app('translator')->get('Submit'); ?></button>
                                </div>
                            </div>
                            <div class="bottom">
                                <?php echo app('translator')->get("Didn't get Code? Click to"); ?>

                                <a href="<?php echo e(route('user.resendCode')); ?>?type=email"><?php echo app('translator')->get('Resend code'); ?></a>
                                <?php $__errorArgs = ['resend'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger mt-1"><?php echo e(trans($message)); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- email_verification_end -->
<?php $__env->stopSection(); ?>




<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/auth/verification/email.blade.php ENDPATH**/ ?>