<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Email'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="m-0 m-md-4 my-4 m-md-0 shadow">
        <form method="post" action="<?php echo e(route('admin.send-email',$user->id)); ?>">
            <?php echo csrf_field(); ?>
            <div class="col-sm-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-envelope-open"></i> <?php echo app('translator')->get('Send Email To'); ?> <?php echo app('translator')->get($user->name); ?></h4>
                        <div class="form-group">
                            <label><?php echo app('translator')->get('Subject'); ?></label>
                            <input type="text" name="subject" value="<?php echo e(old('subject')); ?>" placeholder="<?php echo app('translator')->get('Write Subject'); ?>" class="form-control" >
                            <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group ">
                            <label><?php echo app('translator')->get('Message'); ?></label>
                            <textarea class="form-control" name="message" id="summernote" rows="8" placeholder="<?php echo app('translator')->get('Say Something'); ?>"><?php echo e(old('message')); ?></textarea>
                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="submit-btn-wrapper mt-md-3 text-center text-md-left">
                            <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary btn-block"><span><?php echo app('translator')->get('Send Email'); ?></span> </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/summernote.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js-lib'); ?>
    <script src="<?php echo e(asset('assets/admin/js/summernote.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        "use strict";

        $(document).ready(function() {
            $('#summernote').summernote({
                minHeight:220,
                callbacks: {
                            onBlurCodeview: function() {
                                let codeviewHtml = $(this).siblings('div.note-editor').find('.note-codable').val();
                                $(this).val(codeviewHtml);
                            }
                        }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/admin/users/single-mail-form.blade.php ENDPATH**/ ?>