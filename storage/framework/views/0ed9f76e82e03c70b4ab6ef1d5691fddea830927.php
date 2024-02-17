<?php $__env->startSection('title',__($page_title)); ?>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div
                    class="d-flex justify-content-between align-items-center mb-3"
                >
                    <h3 class="mb-0"><?php echo app('translator')->get('Balance Transfer'); ?></h3>
                </div>

                <div class="search-bar">
                    <form action="" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row g-3">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="input-box">
                                    <label for="email" class="darkblue-text-bold"><?php echo app('translator')->get('Receiver Email Address'); ?></label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo app('translator')->get('Receiver Email Address'); ?>"
                                    />
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="error text-danger"><?php echo app('translator')->get($message); ?> </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="input-box">
                                    <label for="email" class="darkblue-text-bold"><?php echo app('translator')->get('Amount'); ?></label>
                                    <input
                                        type="text"
                                        id="amount"
                                        class="form-control"
                                        name="amount" value="<?php echo e(old('amount')); ?>" placeholder="<?php echo app('translator')->get('Enter Amount'); ?>"  onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"
                                    />
                                    <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="error text-danger"><?php echo app('translator')->get($message); ?> </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="input-box col-lg-6 col-md-6 col-sm-12">
                                <label for="" class="darkblue-text-bold"
                                ><?php echo app('translator')->get('Select Wallet'); ?></label
                                >
                                <select name="wallet_type" id="wallet_type" class="form-control">
                                    <option value="" selected disabled class="text-white"><?php echo e(trans('Select Wallet')); ?></option>
                                    <option value="balance" class="text-white"><?php echo e(trans('Main balance')); ?></option>
                                    <option value="interest_balance" class="text-white"><?php echo e(trans('Interest Balance')); ?></option>
                                </select>
                                <?php $__errorArgs = ['wallet_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="error text-danger"><?php echo app('translator')->get($message); ?> </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="input-box">
                                    <label for="email" class="darkblue-text-bold"><?php echo app('translator')->get('Enter Password'); ?></label>
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control"
                                        name="password" value="<?php echo e(old('password')); ?>" placeholder="<?php echo app('translator')->get('Your Password'); ?>"
                                    />
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="error text-danger"><?php echo app('translator')->get($message); ?> </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-12">
                                <button class="btn-custom" type="submit"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        'use strict'
        $(".js-example-basic-single").select2({
            width: '100%',
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/user/money-transfer.blade.php ENDPATH**/ ?>