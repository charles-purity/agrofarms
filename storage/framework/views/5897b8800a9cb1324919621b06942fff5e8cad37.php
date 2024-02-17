<?php $__env->startSection('title',__($page_title)); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div
                    class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0"><?php echo app('translator')->get('Create New Ticket'); ?></h3>
                </div>
            </div>

            <div class="col-xl-12 col-md-12 col-12">
                <div class="search-bar my-search-bar p-0">
                    <form action="<?php echo e(route('user.ticket.store')); ?>" method="post"
                          enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row g-3">
                            <div class="inbox_right_side bg-white rounded">
                                <div class="d-flex justify-content-center">
                                    <div id="tab1">
                                        <div class="col-xl-12">
                                            <div class="form">
                                                <input class="form-control" name="purchase_package_id" type="hidden" value=""/>
                                                <div class="basic-form ticket-basic-form">
                                                    <div class="row g-3">
                                                        <div class="input-box col-md-12">
                                                            <label><?php echo app('translator')->get('Subject'); ?></label>
                                                            <input class="form-control" type="text" name="subject"
                                                                   value="<?php echo e(old('subject')); ?>" placeholder="<?php echo app('translator')->get('Enter Subject'); ?>">
                                                            <?php $__errorArgs = ['subject'];
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

                                                        <div class="input-box col-md-12">
                                                            <label><?php echo app('translator')->get('Message'); ?></label>
                                                            <textarea class="form-control ticket-box" name="message" rows="5"
                                                                      id="textarea1"
                                                                      placeholder="<?php echo app('translator')->get('Enter Message'); ?>"><?php echo e(old('message')); ?></textarea>
                                                            <?php $__errorArgs = ['message'];
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

                                                        <div class="input-box col-md-12">
                                                            <input type="file" name="attachments[]"
                                                                   class="form-control"
                                                                   multiple
                                                                   placeholder="<?php echo app('translator')->get('Upload File'); ?>">

                                                            <?php $__errorArgs = ['attachments'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e(trans($message)); ?></span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 justify-content-strat d-flex mt-4 mb-4">
                                            <button type="submit" class="btn-custom ticket-btn">
                                                <i class="fal fa-check-circle" aria-hidden="true"></i><?php echo app('translator')->get('Submit'); ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/themes/darkpurple/user/support/create.blade.php ENDPATH**/ ?>