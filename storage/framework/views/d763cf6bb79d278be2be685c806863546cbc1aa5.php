<?php $__env->startSection('title', trans($page_title)); ?>
<?php $__env->startSection('content'); ?>

    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">
            <form method="post" action="<?php echo e(route('admin.payout.settings.action')); ?>" class="form-row align-items-center " enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="form-group col-md-1 col-xl-1 col-12">
                    <label class="d-block"><?php echo app('translator')->get('Monday'); ?></label>
                    <input data-toggle="toggle" id="monday" data-onstyle="primary" data-offstyle="secondary" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="monday" <?php if($withdrawSettings->monday): ?> checked <?php endif; ?>>
                </div>

                <div class="form-group col-md-1 col-xl-1 col-12">
                    <label class="d-block"><?php echo app('translator')->get('Tuesday'); ?></label>
                    <input data-toggle="toggle" id="tuesday" data-onstyle="primary" data-offstyle="secondary" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="tuesday" <?php if($withdrawSettings->tuesday): ?> checked <?php endif; ?>>
                </div>

                <div class="form-group col-md-1 col-xl-1 col-12">
                    <label class="d-block"><?php echo app('translator')->get('Wednesday'); ?></label>
                    <input data-toggle="toggle" id="wednesday" data-onstyle="primary" data-offstyle="secondary" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="wednesday" <?php if($withdrawSettings->wednesday): ?> checked <?php endif; ?>>
                </div>

                <div class="form-group col-md-1 col-xl-1 col-12">
                    <label class="d-block"><?php echo app('translator')->get('Thursday'); ?></label>
                    <input data-toggle="toggle" id="thursday" data-onstyle="primary" data-offstyle="secondary" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="thursday" <?php if($withdrawSettings->thursday): ?> checked <?php endif; ?>>
                </div>

                <div class="form-group col-md-1 col-xl-1 col-12">
                    <label class="d-block"><?php echo app('translator')->get('Friday'); ?></label>
                    <input data-toggle="toggle" id="friday" data-onstyle="primary" data-offstyle="secondary" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="friday" <?php if($withdrawSettings->friday): ?> checked <?php endif; ?>>
                </div>

                <div class="form-group col-md-1 col-xl-1 col-12">
                    <label class="d-block"><?php echo app('translator')->get('Saturday'); ?></label>
                    <input data-toggle="toggle" id="saturday" data-onstyle="primary" data-offstyle="secondary" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="saturday" <?php if($withdrawSettings->saturday): ?> checked <?php endif; ?>>
                </div>

                <div class="form-group col-md-1 col-xl-1 col-12">
                    <label class="d-block"><?php echo app('translator')->get('Sunday'); ?></label>
                    <input data-toggle="toggle" id="sunday" data-onstyle="primary" data-offstyle="secondary" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="sunday" <?php if($withdrawSettings->sunday): ?> checked <?php endif; ?>>
                </div>

                <div class="form-group col-md-2 col-xl-2 col-12">
                    <button type="submit"
                            class="btn btn-primary btn-block  btn-rounded mx-2 mt-4">
                        <span><?php echo app('translator')->get('Save Changes'); ?></span></button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>
    <script>
        "use strict";
        $(document).ready(function () {
            $('select').select2({
                width: '100%'
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u304811494/domains/agromultichains.org/public_html/resources/views/admin/payout/settings.blade.php ENDPATH**/ ?>